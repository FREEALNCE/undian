<?php

namespace App\Http\Controllers;

use App\Models\NightTime;
use Illuminate\Http\Request;

class NightTimeController extends Controller
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
     * @param  \App\Models\NightTime  $nightTime
     * @return \Illuminate\Http\Response
     */
    public function show(NightTime $nightTime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NightTime  $nightTime
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = NightTime::find($id);

        return view('time-setting/night-time',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NightTime  $nightTime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NightTime $nightTime)
    {
        $request->validate([
            'id'         => 'required',
            'jam_malam'       => 'required',

        ]);

        $update = Night::updateTime($request);

        if($update){
            Alert::success('Update Night Time', 'Update Night Time Success');
            return redirect()->route('nights.index');
        }else{
            Alert::warning('Update Night Time', 'Update Night Time failed');
            return redirect()->route('nights.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NightTime  $nightTime
     * @return \Illuminate\Http\Response
     */
    public function destroy(NightTime $nightTime)
    {
        //
    }
}
