<?php

namespace App\Http\Controllers;

use App\Models\DayTime;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DayTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function show(DayTime $dayTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = DayTime::find($id);
        $data['day'] = 'setting time days';

        return view('time-setting.day-time',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id'         => 'required',
            'jam_siang'  => 'required',

        ]);

        $update = DayTime::updateTime($request);

        if($update){
            Alert::success('Update Day Time', 'Update Day Time Success');
            return redirect()->back();
        }else{
            Alert::warning('Update Day Time', 'Update Day Time failed');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DayTime  $dayTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(DayTime $dayTime)
    {
        //
    }
}
