<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Contest;

class Edit extends Component
{

    public $contest, $title, $slug, $subtitle, $description;

    protected $rules = [
        'title' => 'required',
        'slug' => 'required',
        'subtitle' => 'required',
    ];

    public function mount(Contest $contest)
    {
        $this->title = $contest->title;
        $this->slug = $contest->slug;
        $this->subtitle = $contest->subtitle;
        $this->contest = $contest;
    }

    public function update()
    {
      $this->validate();
      $this->contest->update(
        [
          'title' => $this->title,
          'slug' => $this->slug,
          'subtitle' => $this->subtitle,
        ]
      );

      return $this->redirect(route('admin.contests.edit', $this->contest), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.edit');
    }
}
