<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Contest;

class ContestController extends Controller
{
  public function index(): View
  {
    return view('app.contests.index', []);
  }

  public function show(Contest $contest): view
  {
    return view('app.contests.show', compact('contest'));
  }

  public function participate(Contest $contest): view
  {
    return view('app.contests.participate', compact('contest'));
  }

  public function participateStatus(Contest $contest): view
  {
    return view('app.contests.participate-status', compact('contest'));
  }
}
