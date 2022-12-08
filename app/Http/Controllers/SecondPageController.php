<?php

namespace App\Http\Controllers;

use App\Models\SecondPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class SecondPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website-setting.second-page.edit', [
            'settings' => SecondPage::whereIn('key', ['image_first', 'image_second', 'description'])->get()->toArray()
        ]);
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
     * @param  \App\Models\SecondPage  $secondPage
     * @return \Illuminate\Http\Response
     */
    public function show(SecondPage $secondPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SecondPage  $secondPage
     * @return \Illuminate\Http\Response
     */
    public function edit(SecondPage $secondPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SecondPage  $secondPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SecondPage $secondPage)
    {
        DB::beginTransaction();
        try {

            foreach ($request->all() as $inputName => $value) {
                if (!in_array($inputName, ['_method', '_token'])) {
                    $secondPage = SecondPage::where('key', $inputName)->first();
                    // dump($siteIdentity->variant);
                    if ($secondPage->variant == "character") {
                        $secondPage->update(['value' => $value]);
                    } else {
                        // dump($request->file($inputName) ? "prose upload" :  "not");

                        if ($request->hasFile($inputName)) {
                            $dest = env('IMAGE_PATH') . $secondPage->value;

                            if (file_exists($dest)) {
                                unlink($dest);
                            }
                            // dd($request->file($inputName));
                            $images = $request->file($inputName);
                            // dump($images);
                            $ext = '.' . $images->getClientOriginalExtension();
                            $fileName = str_replace($ext, '-' . date('d-H-i') . $ext, $images->getClientOriginalName());
                            $year = date('Y');
                            $month = date('M');
                            $destination = env('IMAGE_PATH') . $year . '/' . $month;
                            $request->$inputName->move($destination, $fileName);
                            $imagedb = $year . '/' . $month . '/' . $fileName;

                            $secondPage->update(['value' => $imagedb]);
                        }
                    }
                }
            }
            // dd($imagedb);
            Alert::toast('Website Updated', 'success');
        } catch (\Throwable $th) {
            // DB::rollBack();
            // dd($th->getMessage());
        } finally {
            DB::commit();
        }
        // dd($imagedb);
        // dd($request->all());
        return redirect()->route('second-page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SecondPage  $secondPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(SecondPage $secondPage)
    {
        //
    }
}
