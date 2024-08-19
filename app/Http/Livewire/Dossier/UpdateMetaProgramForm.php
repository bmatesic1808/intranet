<?php

namespace App\Http\Livewire\Dossier;

use App\Models\MetaProgram;
use App\Models\User;
use Livewire\Component;

class UpdateMetaProgramForm extends Component
{
    public $user;
    public $motivationReason;
    public $referenceFrame;
    public $activityMode;
    public $activityStyle;
    public $activityScope;

    protected $rules = [
        'motivationReason' => 'string',
        'referenceFrame' => 'string',
        'activityMode' => 'string',
        'activityStyle' => 'string',
        'activityScope' => 'string',
    ];

    public function mount(?User $user): void
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = auth()->user();
        }

        if ($this->user->metaProgram) {
            $this->motivationReason = $this->user->metaProgram->motivation_reason;
            $this->referenceFrame = $this->user->metaProgram->reference_frame;
            $this->activityMode = $this->user->metaProgram->activity_mode;
            $this->activityStyle = $this->user->metaProgram->activity_style;
            $this->activityScope = $this->user->metaProgram->activity_scope;
        }
    }

    public function render()
    {
        return view('livewire.dossier.update-meta-program-form');
    }

    public function updateMetaProgram(): void
    {
        $this->validate();

        if(!$this->user->metaProgram) {
            MetaProgram::create($this->getFormInputData());
        } else {
            MetaProgram::find($this->user->metaProgram->id)->update($this->getFormInputData());
        }

        $this->emit('saved');
    }

    public function getFormInputData(): array
    {
        return [
            'user_id' => $this->user->id,
            'motivation_reason' => $this->motivationReason,
            'reference_frame' => $this->referenceFrame,
            'activity_mode' => $this->activityMode,
            'activity_style' => $this->activityStyle,
            'activity_scope' => $this->activityScope
        ];
    }
}
