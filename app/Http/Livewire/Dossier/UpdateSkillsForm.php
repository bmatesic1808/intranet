<?php

namespace App\Http\Livewire\Dossier;

use App\Models\Skill;
use Livewire\Component;
use App\Models\User;

class UpdateSkillsForm extends Component
{
    public $user;
    public $knowledgeRating = 0;
    public $proactivityRating = 0;
    public $competencyRating = 0;
    public $softSkillsRating = 0;
    public $businessBontonRating = 0;

    protected $rules = [
        'knowledgeRating' => 'integer|min:0|max:10',
        'proactivityRating' => 'integer|min:0|max:10',
        'competencyRating' => 'integer|min:0|max:10',
        'softSkillsRating' => 'integer|min:0|max:10',
        'businessBontonRating' => 'integer|min:0|max:10',
    ];

    public function mount(?User $user): void
    {
        if ($user) {
            $this->user = $user;
        } else {
            $this->user = auth()->user();
        }

        if ($this->user->skill) {
            $this->knowledgeRating = $this->user->skill->knowledge_expertise;
            $this->proactivityRating = $this->user->skill->proactivity;
            $this->competencyRating = $this->user->skill->competency;
            $this->softSkillsRating = $this->user->skill->soft_skills;
            $this->businessBontonRating = $this->user->skill->business_bonton;
        }
    }

    public function render()
    {
        return view('livewire.dossier.update-skills-form');
    }

    public function updateSkillsRating(): void
    {
        $this->validate();

        if(!$this->user->skill) {
            Skill::create($this->getSkillsRatingInput());
        } else {
            Skill::find($this->user->skill->id)->update($this->getSkillsRatingInput());
        }

        $this->emit('saved');
    }

    public function incrementKnowledgeExpertiseRating(): void
    {
        if ($this->knowledgeRating >= 0 && $this->knowledgeRating <= 9 ) {
            $this->knowledgeRating++;
        }
    }

    public function decrementKnowledgeExpertiseRating(): void
    {
        if ($this->knowledgeRating >= 1 && $this->knowledgeRating <= 10 ) {
            $this->knowledgeRating--;
        }
    }

    public function incrementProactivityRating(): void
    {
        if ($this->proactivityRating >= 0 && $this->proactivityRating <= 9 ) {
            $this->proactivityRating++;
        }
    }

    public function decrementProactivityRating(): void
    {
        if ($this->proactivityRating >= 1 && $this->proactivityRating <= 10 ) {
            $this->proactivityRating--;
        }
    }

    public function incrementCompetencyRating(): void
    {
        if ($this->competencyRating >= 0 && $this->competencyRating <= 9 ) {
            $this->competencyRating++;
        }
    }

    public function decrementCompetencyRating(): void
    {
        if ($this->competencyRating >= 1 && $this->competencyRating <= 10 ) {
            $this->competencyRating--;
        }
    }

    public function incrementSoftSkillsRating(): void
    {
        if ($this->softSkillsRating >= 0 && $this->softSkillsRating <= 9 ) {
            $this->softSkillsRating++;
        }
    }

    public function decrementSoftSkillsRating(): void
    {
        if ($this->softSkillsRating >= 1 && $this->softSkillsRating <= 10 ) {
            $this->softSkillsRating--;
        }
    }

    public function incrementBusinessBontonRating(): void
    {
        if ($this->businessBontonRating >= 0 && $this->businessBontonRating <= 9 ) {
            $this->businessBontonRating++;
        }
    }

    public function decrementBusinessBontonRating(): void
    {
        if ($this->businessBontonRating >= 1 && $this->businessBontonRating <= 10 ) {
            $this->businessBontonRating--;
        }
    }

    public function getSkillsRatingInput(): array
    {
        return [
            'user_id' => $this->user->id,
            'knowledge_expertise' => $this->knowledgeRating,
            'proactivity' => $this->proactivityRating,
            'competency' => $this->competencyRating,
            'soft_skills' => $this->softSkillsRating,
            'business_bonton' => $this->businessBontonRating,
        ];
    }
}
