<?php

namespace App\Http\Livewire\Equipment;

use App\Models\Charge;
use App\Models\Device;
use App\Models\User;
use Livewire\Component;

class Charges extends Component
{
    protected $listeners = ['updateChargesView' => 'render'];

    public function render()
    {
        return view('livewire.equipment.charges', [
            'users' => User::with('charges')->get()
        ]);
    }

    public function dischargeDeviceFromTheEmployee($chargeId): void
    {
        $charge = Charge::whereId($chargeId)->first();
        $charge->update(['date_discharged' => now()]);

        Device::whereId($charge->device->id)->update(['charged' => false]);

        $this->emit('updateChargesView');
        $this->emit('updateInventoryView');

        $this->dispatchBrowserEvent('banner-message',  [
            'show' => true,
            'message' => 'Success! Device has been sucessfully discharged from the employee.',
            'style' => 'success'
        ]);
    }
}
