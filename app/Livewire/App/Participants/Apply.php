<?php

namespace App\Livewire\App\Participants;

use Livewire\Component;
use App\Models\Contest;
use App\Models\Participant;
use App\Models\Requirement;
use Livewire\WithFileUploads;
use App\Models\Folder;
use App\Models\Space;
use Illuminate\Suppot\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Rule;

class Apply extends Component
{   
    use WithFileUploads;

    public $contest, $folder, $items = [];
    
    public function mount(Contest $contest)
    {
        $this->contest = $contest;
        $this->folder = new Folder();

        foreach ($this->contest->requirements as $key => $value) {
          $this->items[$key]['requirement_id'] = $value->id;
        }
    }

    public function store()
    {
      $this->validate([
          'items.0.file' => 'required',
          'items.0.requirement_id' => 'required',
          'items.1.file' => 'required',
          'items.1.requirement_id' => 'required',
          'items.2.file' => 'required',
          'items.2.requirement_id' => 'required',
      ]);

      $participant = Participant::create([
        'user_id' => auth()->user()->id,
        'contest_id' => $this->contest->id
      ]);

      foreach ($this->items as $item) {

        $requirement = Requirement::find($item['requirement_id']);

        $filename = $item['file']->getClientOriginalName();

        $folder = ''.auth()->user()->name.'';

        //$path = Storage::put($folder, $filename);

        $path = $item['file']->storeAs($folder, $filename);

        Space::create([
          'user_id' => auth()->user()->id,
          'participant_id' => $participant->id,
          'requirement_id' => $item['requirement_id'],
          'filename' => $item['file']->getClientOriginalName(),
          'path' => $path
        ]);
      }

    }


    public function render()
    {
        return view('livewire.pages.app.participants.apply');
    }
}