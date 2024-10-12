<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class Create extends Component
{

    public Project $project;

    public bool $modal = false;

    public string $email = '';

    public int $hours = 0;

    public bool $agree = false;

    protected $rules = [
        'email' => ['required', 'email', 'exists:users,email'],
        'hours' => ['required', 'numeric', 'gt:0'],
    ];

    public function save()
    {
        if(!$this->agree) {
            return $this->addError('agree', 'You must agree to the terms of use');
        }

        $this->validate();

        $user = User::where('email', $this->email)->first();
        $this->project->proposals()->updateOrCreate(
            ['user_id' => $user->id],
            ['hours' => $this->hours]
        );

        $this->dispatch('proposal::created');
        
        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
