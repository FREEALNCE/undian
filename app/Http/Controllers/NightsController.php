<?php

namespace App\Http\Controllers;

use App\Models\Night;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class NightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nights = Night::orderBy('tanggal', 'desc')->paginate(10);;
        return view('nights.index', compact('nights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = $this->statuses();
        return view('nights.create', compact('statuses'));
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
            "tanggal" => "required|unique:night_results,tanggal",
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $kode = $request->num_one.$request->num_two.$request->num_three.$request->num_four.$request->num_five;

        Night::create([
            'kode_malam' => $kode,
            'status' => ($request->is_active) ? '1' : '0',
        ]);

        Alert::success('Add Night Number', 'Add Night Number Success');
        return redirect()->route('nights.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['row'] = Night::find($id);
        $data['day'] = 'edit kode';
        return view('nights.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            "tanggal" => "required",
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $kode = $request->num_one.$request->num_two.$request->num_three.$request->num_four.$request->num_five;

        $check = Night::where('id',$request->id)->first();

        if($check->tanggal == $request->tanggal)
        {

            Night::where('id',$request->id)->update([
                'kode_malam' => $kode,
                'tanggal'    => $request->tanggal,
                'status' => ($request->is_active) ? '1' : '0',
            ]);
            
        }else{
            $request->validate([
                "tanggal" => "required|unique:night_results,tanggal",
            ]);

            Night::where('id',$request->id)->update([
                'kode_malam' => $kode,
                'tanggal'    => $request->tanggal,
                'status' => ($request->is_active) ? '1' : '0',
            ]);
        }   
        Alert::success('Update Night Number', 'Update Night Number Success');
        return redirect()->route('nights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Night::where('id',$id)->delete();
            Alert::success('Delete Night Number', 'Delete Night Number Success');
        } catch (\Throwable $th) {
            Alert::error('Delete Night Number', 'Error' . $th->getMessage());
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
