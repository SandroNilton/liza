<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Contest;

class Create extends Component
{
    use WithFileUploads;

    public $title, $subtitle, $description, $cover;

    protected $rules = [
      'title' => 'required|unique:contests',
      'subtitle' => 'required',
    ];

    public function createContest()
    {
      $this->validate();

      if($this->cover == null){
        $path = null;
      }else{
        $filename = $this->cover->getClientOriginalName();
        $path = $this->cover->storeAs('cover', $filename);
      }

      $contest = Contest::create([
        'cover_image' => $path,
        'title' => $this->title,
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
