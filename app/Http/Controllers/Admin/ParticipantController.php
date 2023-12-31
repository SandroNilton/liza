<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use App\Models\Participant;
use Illuminate\View\View;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
  public function index(): View
  {
    return view('admin.participants.index', []);
  }

  public function group(Contest $contest): View
  {
    return view('admin.participants.group', compact('contest'));
  }

  public function edit(Participant $participant): view
  {
    return view('admin.participants.edit', compact('participant'));
  }
}
