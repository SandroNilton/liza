<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Contest;

class Create extends Component
{

    public $title, $slug, $subtitle, $description;

    protected $rules = [
      'title' => 'required|unique:contests',
      'slug' => 'required|unique:contests',
      'subtitle' => 'required',
    ];

    public function createContest()
    {
      $this->validate();

      $contest = Contest::create([
        'title' => $this->title,
        'slug' => $this->slug,
        'subtitle' => $this->subtitle,
        'user_id' => auth()->user()->id,
        'description' => $this->description
      ]);

      return $this->redirect(route('admin.contests.edit', $contest), navigate: true);
      
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.create');
    }
}
