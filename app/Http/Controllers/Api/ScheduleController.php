<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;
use function PHPUnit\Framework\isNull;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $schedules = Schedule::with('user')
        // ->orderBy('start_date','desc')
        // ->get();
        $schedules = Schedule::with(['user'])
        ->orderBy('start_date','desc')
        ->get();
        // return view('schedules.index', compact('schedules'));
        return response()->json($schedules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['start_time'] = (isNull($request->input('start_time'))&&($request->has('allday_flag'))) ? '00:00':NULL;
        $request -> validate([
            'subject' => 'required|max:50',
            'start_time' => 'required',
            'end_date' => 'nullable',
            'end_time' => 'nullable',
            'note'=>'nullable|max:400',
        ]);
        $data['allday_flag'] = $request->has('allday_flag') ? 1 : 0;
        $data['end_date'] = isNull($request->input('end_date')) ?  $data['start_date'] :  $data['end_date'];
        $data['end_time'] = isNull($request->input('end_time')) ?  $data['start_time'] :  $data['end_time'];
        $schedule = $request->user()->schedule()->create($data);

        return response()->json($schedule, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        return response()->json($schedule);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $data = $request->all();
        $data['start_time'] = (isNull($request->input('start_time'))&&($request->has('allday_flag'))) ? '00:00':null;
        
        $request -> validate([
            'subject' => 'required|max:50',
            'start_date' => 'required|date',
            'start_time' => 'required',
            'end_date' => 'nullable',
            'end_time' => 'nullable',
            'note'=>'required|max:400',
        ]);

        $data['allday_flag'] = $request->has('allday_flag') ? 1 : 0;
        $data['end_date'] = isNull($request->input('end_date')) ?  $data['start_date'] :  $data['end_date'];
        $data['end_time'] = isNull($request->input('end_time')) ?  $data['start_time'] :  $data['end_time'];
        $schedule->update($data);

        // return redirect()->route('schedules.show',$schedule);
        return response()->json($schedule);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return response()->json(['message'=>'Schedule deleted']);
        //
    }
}
