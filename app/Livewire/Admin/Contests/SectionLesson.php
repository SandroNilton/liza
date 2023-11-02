<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Contest;
use App\Models\Section;

class SectionLesson extends Component
{
    public $contest, $section, $name;

    protected $rules = [
        'section.name' => 'required'
    ];

    public function mount(Contest $contest)
    {
        $this->contest = $contest;
        $this->section = new Section();
    }

    public function edit(Section $section)
    {
        $this->section = $section;
    }

    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();
        $this->contest = Contest::find($this->contest->id);
    }

    public function store()
    {
        $this->validate(['name' => 'required']);
        Section::create([
          'name' => $this->name,
          'contest_id' => $this->contest->id
        ]);
        $this->reset('name');
        $this->contest = Contest::find($this->contest->id);
      }

    public function destroy(Section $section)
    {
      $section->delete();
      $this->contest = Contest::find($this->contest->id);
    }

   
    public function render()
    {
        return view('livewire.pages.admin.contests.section-lesson');
    }
}
