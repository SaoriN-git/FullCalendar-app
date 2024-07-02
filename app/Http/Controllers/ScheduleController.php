<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facades\Auth;

class ScheduleController extends Controller
{
  public function index()
  {
    $schedules = Schedule::all();
    $events = [];
    foreach ($schedules as $schedule) {
      $events[] = [
        'id' => $schedule->id,
        'title' => $schedule->title,
        'description' => $schedule->description,
        'start' => $schedule->start_date,
        'end' => Carbon::parse($schedule->end_date)->addDay()->format('Y-m-d'),
      ];
    }
    return view('schedules.index', compact('events'));
  }

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
