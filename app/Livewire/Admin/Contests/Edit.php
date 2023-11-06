<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Sleep;
use App\Models\Contest;

class Edit extends Component
{

    use WithFileUploads;

    public $contest, $title, $subtitle, $description, $cover, $oldcover;

    protected $rules = [
        'title' => 'required',
        'subtitle' => 'required',
    ];

    public function mount(Contest $contest)
    {
        $this->oldcover = $contest->image;
        $this->cover = $contest->image;
        $this->title = $contest->title;
        $this->subtitle = $contest->subtitle;
        $this->description = $contest->description;
        $this->contest = $contest;
    }

    public function update()
    {
      $this->validate();

      if($this->cover != null){
        Sleep::for(5)->seconds();
        //dd($this->cover->getClientOriginalName());
        $filename = $this->cover->getClientOriginalName();
        $path = $this->cover->storeAs('cover', $filename);
        Storage::delete($this->oldcover);
      }else{
        $path = null;
      }

      $this->contest->update(
        [
          'cover_image' => $path,
          'title' => $this->title,
          'subtitle' => $this->subtitle,
          'description' => $this->description
        ]
      );

      return $this->redirect(route('admin.contests.edit', $this->contest), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.edit');
    }
}
