<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
  public function create()
  {
    return view('schedules.create');
  }

  public function store(Request $request)
  {
    $request->merge(['user_id' => auth()->id()]);
    Schedule::create($request->all());
    return back()->with('status', '登録しました。');
  }
}
