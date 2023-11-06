<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use Illuminate\Support\Sleep;
use App\Models\Contest;

class Show extends Component
{
    public $contest, $title, $subtitle, $description, $cover;

    public function mount(Contest $contest)
    {
        $this->cover = $contest->image;
        $this->title = $contest->title;
        $this->subtitle = $contest->subtitle;
        $this->description = $contest->description;
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.show');
    }
}
