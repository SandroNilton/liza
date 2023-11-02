<?php

namespace App\Livewire\Admin\Contests;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Contest;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.admin.contests.table', ['contests' => Contest::where('state',1)->orderBy('created_at', 'desc')->paginate(9),]);
    }
}