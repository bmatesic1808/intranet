<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param array $input
     * @return User
     * @throws ValidationException
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'role' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'position' => $input['position'],
            ]), function (User $user) use ($input) {
                $this->createTeam($user);
                $this->assignRolesAndPermissionsToUser($user, $input['role']);
            });
        });
    }

    /**
     * Create a personal team for the user.
     *
     * @param User $user
     * @return void
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => 'Kala Presence Team',
            'personal_team' => true,
        ]));
    }

    private function assignRolesAndPermissionsToUser(User $user, string $role): void
    {
        $role = Role::where('name', $role)->first();
        $user->assignRole($role);

        // admin role has all permissions -> defined by Gate in AuthServiceProvider,
        // so we don't have assign any permissions to admin role
        if ($role->name !== Config::get('constants.roles.ADMIN_ROLE')) {
            $user->givePermissionTo($user->getPermissionsViaRoles());
        }
    }
}
