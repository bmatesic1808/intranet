<?php

namespace App\Listeners;

use App\Models\Point;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(object $event): void
    {
        // points for user login
        // when user logs in, he gets 1 point (even if he logs in multiple times, that day he will get only 1 point)
        $this->user = $event->user;
        $latestLogin = Point::where('user_id', $this->user->id)->latest('date')->first();
        // points are collected for every month
        if ($latestLogin) {
            if((int)$latestLogin->date->format('m') !== today()->month) {
                $this->createNewLoginPoint($this->user);
            }

            if ((int)$latestLogin->date->format('m') === today()->month && !$latestLogin->date->equalTo(today())) {
                $latestLogin->date = today();
                ++$latestLogin->points;
                $latestLogin->update();
            }
        } else {
            $this->createNewLoginPoint($this->user);
        }
    }

    private function createNewLoginPoint(User $user): void
    {
        $newLogin = new Point();
        $newLogin->user_id = $user->id;
        $newLogin->date = today();
        $newLogin->points = 1;
        $newLogin->save();
    }
}
