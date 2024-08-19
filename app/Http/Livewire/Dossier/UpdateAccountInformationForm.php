<?php

namespace App\Http\Livewire\Dossier;

use App\Models\User;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateAccountInformationForm extends Component
{
    use WithFileUploads;

    public $user;
    public $state = [];
    public $photo;

    public function mount(?User $user): void
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = auth()->user();
        }

        $this->state = $this->user->withoutRelations()->toArray();
    }

    public function updateProfileInformation(UpdatesUserProfileInformation $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->user,
            $this->photo
                ? array_merge($this->state, ['photo' => $this->photo])
                : $this->state
        );

        if (isset($this->photo)) {
            return redirect()->route('users.show', $this->state['id']);
        }

        $this->emit('saved');

        $this->emit('refresh-navigation-menu');
    }

    public function deleteProfilePhoto(): void
    {
        $this->user->deleteProfilePhoto();

        $this->emit('refresh-navigation-menu');
    }

    public function render()
    {
        return view('livewire.dossier.update-account-information-form');
    }
}
