<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'intranet:make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command creates user with administrator privilegies.';

    /**
     * @var CreateNewUser
     */
    private $createNewUser;

    /**
     * Create a new command instance.
     *
     * @param CreateNewUser $createNewUser
     */
    public function __construct(CreateNewUser $createNewUser)
    {
        parent::__construct();
        $this->createNewUser = $createNewUser;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        activity()->disableLogging();

        $this->createNewUser->create([
           'name' => 'Matej Jambrović',
           'email' => 'matej@kalapresence.com',
           'password' => '9!8La!MWPvp9',
           'password_confirmation' => '9!8La!MWPvp9',
           'position' => 'CEO',
           'role' => Config::get('constants.roles.ADMIN_ROLE')
       ]);

       $this->info('Administrator account created');
    }
}
