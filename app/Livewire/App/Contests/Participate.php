<?php

namespace App\Livewire\App\Contests;

use Livewire\Component;
use App\Models\Contest;
use Livewire\WithFileUploads;
use App\Models\Folder;
use Illuminate\Suppot\Arr;

class Participate extends Component
{
    use WithFileUploads;

    public $contest, $folder, $files = [], $recolect = [];

    protected $rules = [
      'files.*' => 'required'
    ];

    public function mount(Contest $contest)
    {
        $this->contest = $contest;
        $this->folder = new Folder();
    }

    public function uploads()
    {
      foreach ($this->files as $file) {
        $this->recolect = $file;
      }

      dd($this->recolect);
    }

    public function render()
    {
        return view('livewire.pages.app.contests.participate');
    }
}
