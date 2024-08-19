<?php

namespace App\Observers;

use App\Mail\AbsenceRequestMail;
use App\Mail\AbsenceRequestAnswerMail;
use App\Models\Absence;
use Illuminate\Support\Facades\Mail;

class AbsenceObserver
{
    /**
     * Handle the Absence "created" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function created(Absence $absence)
    {
        // TODO background job - queue
        Mail::to('matej@kalapresence.com')->send(new AbsenceRequestMail($absence));
        Mail::to('ivana.s@kalapresence.com')->send(new AbsenceRequestMail($absence));
        Mail::to('stella@kalapresence.com')->send(new AbsenceRequestMail($absence));
    }

    /**
     * Handle the Absence "updated" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function updated(Absence $absence)
    {
        Mail::to($absence->user->email)->send(new AbsenceRequestAnswerMail($absence));
    }

    /**
     * Handle the Absence "deleted" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function deleted(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "restored" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function restored(Absence $absence)
    {
        //
    }

    /**
     * Handle the Absence "force deleted" event.
     *
     * @param  \App\Models\Absence  $absence
     * @return void
     */
    public function forceDeleted(Absence $absence)
    {
        //
    }
}
