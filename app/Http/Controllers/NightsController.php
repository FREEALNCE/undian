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
        $nights = Night::orderBy('created_at', 'desc')->paginate(10);;
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
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        Night::create([
            'num_one' => $request->num_one,
            'num_two' => $request->num_two,
            'num_three' => $request->num_three,
            'num_four' => $request->num_four,
            'num_five' => $request->num_five,
            'is_active' => ($request->is_active) ? '1' : '0',
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
    public function show(Night $night)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function edit(Night $night)
    {
        $statuses = $this->statuses();
        return view('nights.edit', compact('night', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Night $night)
    {
        $request->validate([
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $night->update([
            'num_one' => $request->num_one,
            'num_two' => $request->num_two,
            'num_three' => $request->num_three,
            'num_four' => $request->num_four,
            'num_five' => $request->num_five,
            'is_active' => ($request->is_active) ? '1' : '0',
        ]);

        Alert::success('Update Night Number', 'Update Night Number Success');
        return redirect()->route('nights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Night  $night
     * @return \Illuminate\Http\Response
     */
    public function destroy(Night $night)
    {
        try {
            $night->delete();
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
