<?php

namespace App\Http\Livewire\Goals;

use App\Models\Goal;
use Livewire\Component;

class Goals extends Component
{

    public $category_id;
    public $item;
    public $year;

    public function render()
    {
        $goals = Goal::all();
        $goalsYear = [2023, 2024];

        return view('livewire.goals.goals', compact('goals', 'goalsYear'));
    }

    public function addNewGoalItem(): void
    {
        Goal::create([
            'category_id' => $this->category_id,
            'item' => $this->item,
            'year' => $this->year
        ]);

        $this->emit('saved');
        $this->reset();
    }

    public function deleteGoalsItem($id): void
    {
        Goal::destroy($id);
    }
}
