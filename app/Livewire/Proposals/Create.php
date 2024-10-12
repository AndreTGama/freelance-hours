<?php

namespace App\Livewire\Proposals;

use App\Action\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

    public function arrangePositions(Proposal $proposal)
    {
        $query = DB::select("
            select *, row_number() over (order by hours asc) as newPosition from proposals
            where project_id = :project
        ", ['project' => $proposal->project_id]);

        $position = collect($query)->where('id', $proposal->id)->first();
        $otherProposal = collect($query)->where('position', $position->newPosition)->first();

        if($otherProposal) {
            $proposal->update(['position_status' => 'up']);
            Proposal::where('id', $otherProposal->id)->update(['position_status' => 'down']);
        }

        ArrangePositions::run($proposal->project_id);
    }

    public function save()
    {
        if(!$this->agree) {
            return $this->addError('agree', 'You must agree to the terms of use');
        }

        $this->validate();

        $user = User::where('email', $this->email)->first();

        $proposal = $this->project->proposals()->updateOrCreate(
            ['user_id' => $user->id],
            ['hours' => $this->hours]
        );

        $this->arrangePositions($proposal);

        $this->dispatch('proposal::created');

        $this->modal = false;
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
