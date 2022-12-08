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

        Day::create([
            'num_one' => $request->num_one,
            'num_two' => $request->num_two,
            'num_three' => $request->num_three,
            'num_four' => $request->num_four,
            'num_five' => $request->num_five,
            'is_active' => ($request->is_active) ? '1' : '0',
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
    public function show(Day $day)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function edit(Day $day)
    {
        $statuses = $this->statuses();
        return view('days.edit', compact('day', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Day  $day
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Day $day)
    {
        $request->validate([
            'num_one' => 'required|integer|min:1',
            'num_two' => 'required|integer|min:1',
            'num_three' => 'required|integer|min:1',
            'num_four' => 'required|integer|min:1',
            'num_five' => 'required|integer|min:1',
        ]);

        $day->update([
            'num_one' => $request->num_one,
            'num_two' => $request->num_two,
            'num_three' => $request->num_three,
            'num_four' => $request->num_four,
            'num_five' => $request->num_five,
            'is_active' => ($request->is_active) ? '1' : '0',
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
    public function destroy(Day $day)
    {
        try {
            $day->delete();
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
