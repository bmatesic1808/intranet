<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intranet:make:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command generates user roles and permissions.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createPermissions();
        $this->createRolesAndAssignPermissions();

        $this->info("Roles and permissions generated successfully!");
    }

    private function createPermissions(): void
    {
        Permission::create(['name' => 'create_users']);
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'delete_users']);

        Permission::create(['name' => 'delete_profile']);

        Permission::create(['name' => 'do_dossier_actions']);

        Permission::create(['name' => 'do_performance_review_actions']);

        Permission::create(['name' => 'do_meeting_actions']);

        Permission::create(['name' => 'see_user_actions']);

        Permission::create(['name' => 'do_clickup_actions']);

        Permission::create(['name' => 'do_gdrive_actions']);

        Permission::create(['name' => 'do_slack_actions']);

        Permission::create(['name' => 'read_activity']);

        Permission::create(['name' => 'manage_team']);

        Permission::create(['name' => 'create_sop']);
        Permission::create(['name' => 'edit_sop']);
    }

    private function createRolesAndAssignPermissions(): void
    {
        // admin role has all permissions
        Role::create(['name' => 'admin']);

        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo('create_users');
        $managerRole->givePermissionTo('edit_users');
        $managerRole->givePermissionTo('delete_profile');
        $managerRole->givePermissionTo('do_dossier_actions');
        $managerRole->givePermissionTo('see_user_actions');
        $managerRole->givePermissionTo('do_clickup_actions');
        $managerRole->givePermissionTo('do_gdrive_actions');
        $managerRole->givePermissionTo('do_slack_actions');
        $managerRole->givePermissionTo('read_activity');
        $managerRole->givePermissionTo('create_sop');
        $managerRole->givePermissionTo('edit_sop');
        $managerRole->givePermissionTo('manage_team');

        $moderatorRole = Role::create(['name' => 'moderator']);
        $moderatorRole->givePermissionTo('create_sop');
        $moderatorRole->givePermissionTo('edit_sop');


        Role::create(['name' => 'member']);
    }
}
