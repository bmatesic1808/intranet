<?php

namespace App\Http\Livewire\Dossier;

use App\Models\PersonalInformation;
use App\Models\User;
use Livewire\Component;

class UpdatePersonalInformationForm extends Component
{
    public $user;
    public $country;
    public $city;
    public $address;
    public $postal;
    public $phone;
    public $employment_date;
    public $employment_type;
    public $birthday;

    protected $rules = [
        'country' => 'string|max:30',
        'city' => 'string|max:30',
        'address' => 'string',
        'postal' => 'integer',
        'phone' => 'string',
        'birthday' => 'date',
        'employment_date' => 'date',
        'employment_type' => 'string|max:30',
    ];

    public function mount(?User $user): void
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = auth()->user();
        }

        if ($this->user->personalInformation) {
            $this->country = $this->user->personalInformation->country;
            $this->city = $this->user->personalInformation->city;
            $this->address = $this->user->personalInformation->address;
            $this->postal = $this->user->personalInformation->postal;
            $this->phone = $this->user->personalInformation->phone;
            $this->employment_date = $this->user->personalInformation->employment_date;
            $this->employment_type = $this->user->personalInformation->employment_type;
            $this->birthday = $this->user->personalInformation->birthday;
        }
    }

    public function render()
    {
        return view('livewire.dossier.update-personal-information-form');
    }

    public function updatePersonalInformation(): void
    {
        $this->validate();

        if(!$this->user->personalInformation) {
            PersonalInformation::create($this->getFormInputData());
        } else {
            PersonalInformation::find($this->user->personalInformation->id)->update($this->getFormInputData());
        }

        $this->emit('saved');
    }

    public function getFormInputData(): array
    {
        return [
            'user_id' => $this->user->id,
            'country' => $this->country,
            'city' => $this->city,
            'address' => $this->address,
            'postal' => $this->postal,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'employment_date' => $this->employment_date,
            'employment_type' => $this->employment_type,
        ];
    }
}
