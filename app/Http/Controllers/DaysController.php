<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Day::orderBy('created_at', 'desc')->paginate(10);
        return view('days.index', compact('days'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = $this->statuses();
        return view('days.create', compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $kode = $request->num_one.$request->num_two.$request->num_three.$request->num_four.$request->num_five;

        Day::create([
            'kode_siang' => $kode,
            'status' => ($request->is_active) ? '1' : '0',
        ]);

        Alert::success('Add Day Number', 'Add Day Number Success');
        return redirect()->route('days.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Day::find($id);
        $data['day'] = 'edit kode';
        return view('days.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $kode = $request->num_one.$request->num_two.$request->num_three.$request->num_four.$request->num_five;

        Day::where('id',$request->id)->update([
            'kode_siang' => $kode,
            'status' => ($request->is_active) ? '1' : '0',
        ]);

        Alert::success('Update Day Number', 'Update Day Number Success');
        return redirect()->route('days.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Day::where('id',$id)->delete();
            Alert::success('Delete Day Number', 'Delete Day Number Success');
        } catch (\Throwable $th) {
            Alert::error('Delete Day Number', 'Error' . $th->getMessage());
        }
        return redirect()->back();
    }

    private function statuses()
    {
        return [
            '0' => 'Draft',
            '1' => 'Published',
        ];
    }
}
