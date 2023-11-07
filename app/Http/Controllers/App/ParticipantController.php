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
    return view('app.participants.index', []);
  }

  public function show(Participant $participant): View
  {
    return view('app.participants.show', compact('participant'));
  }
}
