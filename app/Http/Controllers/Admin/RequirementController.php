<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contest;
use Illuminate\View\View;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
  public function index(): View
  {
    return view('admin.requirements.index', []);
  }

  public function create(): view
  {
    return view('admin.requirements.create');
  }

  public function edit(Requirement $requirement): view
  {
    return view('admin.requirements.edit', compact('requirement'));
  }
}
