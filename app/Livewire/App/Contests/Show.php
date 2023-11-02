<?php

namespace App\Livewire\App\Contests;

use Livewire\Component;
use App\Models\Contest;

class Show extends Component
{
    public $contest;

    public function mount(Contest $contest)
    {
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.pages.app.contests.show');
    }
}
