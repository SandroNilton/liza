<?php

namespace App\Livewire\Admin\Participants;

use App\Models\Contest;
use App\Models\Participant;
use Livewire\Component;
use Illuminate\Support\Sleep;

class Group extends Component
{
    public $contest;

    public function mount(Contest $contest)
    {
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.pages.admin.participants.group', ['participants' => Participant::where('contest_id', $this->contest->id)->orderBy('created_at', 'desc')->paginate(10),]);
    }
}
