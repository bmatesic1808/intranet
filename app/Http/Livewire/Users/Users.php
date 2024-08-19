<?php

namespace App\Http\Livewire\Users;

use App\Models\AllowedAbsence;
use App\Models\Overtime;
use App\Models\OvertimeActivity;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Laravel\Jetstream\Contracts\AddsTeamMembers;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Livewire\Component;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    public $isModalVisible = false;
    public $isDestroyModalVisible = false;
    public $isEditModalVisible = false;
    public $isFreeDaysModalVisible = false;
    public $isOvertimeWorkModalVisible = false;
    public $userId;
    public $title;
    public $content;
    public $footer;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $userRole;
    public $position;
    public $searchTerm;
    public $freeDays;
    public $freeDaysYear;
    public $overtimeHours;
    public $overtimeHoursComment;
    public $overtimeHoursRemoval;
    public $overtimeHoursRemovalComment;

    public function render()
    {
        $searchString = '%' . $this->searchTerm . '%';

        return view('livewire.users.users', [
            'users' => User::where('name', 'like', $searchString)->with('points')->orderBy('name')->get(),
            'roles' => $this->getRolesProperty(),
            'freeDaysRecords' => AllowedAbsence::where('user_id', $this->userId)->get(),
            'overtimeHoursRecords' => Overtime::where('user_id', $this->userId)->with('overtimeActivities')->get(),
        ]);
    }

    public function showCreateModal(): void
    {
        $this->reset();
        $this->isModalVisible = true;
    }

    public function showEditModal($id): void
    {
        $this->userId = $id;
        $this->isEditModalVisible = true;
        $this->loadUserModel();
    }

    public function showDestroyModal($id): void
    {
        $this->userId = $id;
        $this->isDestroyModalVisible = true;
    }

    public function showFreeDaysModal($id): void
    {
        $this->userId = $id;
        $this->isFreeDaysModalVisible = true;
    }

    public function showOvertimeWorkModal($id): void
    {
        $this->userId = $id;
        $this->isOvertimeWorkModalVisible = true;
    }

    public function getRolesProperty()
    {
        return Role::where('name', '!=', Config::get('constants.roles.ADMIN_ROLE'))->get();
    }

    public function modalInputData(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'role' => $this->userRole,
            'position' => $this->position
        ];
    }

    public function loadUserModel(): void
    {
        $user = User::find($this->userId);
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userRole = $user->getRoleNames()[0];
        $this->position = $user->position;
    }

    public function createUserAndAssignToCurrentTeam(
        CreatesNewUsers $creator,
        AddsTeamMembers $addsTeamMembers,
        InvitesTeamMembers $invitesTeamMembers
    ): void
    {
        $creator->create($this->modalInputData());

        // invite user to team by email -> user wont be seen as team member until he accepts invitation
        // $invitesTeamMembers->invite(auth()->user(), auth()->user()->currentTeam, $this->email, $this->userRole);

        // assign user to team directly
        $addsTeamMembers->add(auth()->user(), auth()->user()->currentTeam, $this->email, $this->userRole);

        $this->isModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! New user has been created.',
            'style' => 'success'
        ]);
    }

    public function updateUser(UpdatesUserProfileInformation $updatesUserProfileInformation): void
    {
        $user = User::whereId($this->userId)->with(['roles', 'permissions'])->firstOrFail();
        $updatesUserProfileInformation->update($user, $this->modalInputData());

        $this->isEditModalVisible = false;
        $this->reset();

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! User has been updated.',
            'style' => 'success'
        ]);
    }

    public function deleteUser(DeletesUsers $deletesUsers): void
    {
        $deletesUsers->delete(User::find($this->userId));
        $this->isDestroyModalVisible = false;

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! User has been deleted.',
            'style' => 'success'
        ]);
    }

    public function addFreeDaysByYearForUser(): void
    {
        AllowedAbsence::create([
           'user_id' => $this->userId,
           'days' => $this->freeDays,
           'year' => $this->freeDaysYear,
        ]);

        $this->isFreeDaysModalVisible = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Free days for user have been created.',
            'style' => 'success'
        ]);
    }

    public function addOvertimeHoursToUser(): void
    {
        $overtime = Overtime::where('user_id', $this->userId)->first();

        if (!$overtime) {
            $overtime = Overtime::create([
                'user_id' => $this->userId,
                'hours' => $this->overtimeHours,
            ]);
        } else {
            $overtime->hours += $this->overtimeHours;
            $overtime->update();
        }

        $this->createOvertimeActivityRecord($overtime);

        $this->isOvertimeWorkModalVisible = false;
        $this->reset();
        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Overtime hours for user have been added.',
            'style' => 'success'
        ]);
    }

    private function createOvertimeActivityRecord(Overtime $overtime): void
    {
        OvertimeActivity::create([
            'overtime_id' => $overtime->id,
            'hours' => $this->overtimeHours,
            'comments' => $this->overtimeHoursComment
        ]);
    }

    public function removeOvertimeHours($overtimeId): void
    {
        $overtime = Overtime::find($overtimeId);
        $overtime->hours -= $this->overtimeHoursRemoval;
        $overtime->update();

        OvertimeActivity::create([
            'overtime_id' => $overtime->id,
            'hours' => $this->overtimeHoursRemoval,
            'comments' => $this->overtimeHoursRemovalComment
        ]);

        $this->emit('saved');
    }
}
