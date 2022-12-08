<?php

namespace App\Http\Controllers;

use App\Models\ThirdPage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ThirdPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website-setting.third-page.edit', [
            'settings' => ThirdPage::whereIn('key', ['image_first', 'image_second', 'description'])->get()->toArray()
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
     * @param  \App\Models\ThirdPage  $thirdPage
     * @return \Illuminate\Http\Response
     */
    public function show(ThirdPage $thirdPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ThirdPage  $thirdPage
     * @return \Illuminate\Http\Response
     */
    public function edit(ThirdPage $thirdPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ThirdPage  $thirdPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThirdPage $thirdPage)
    {
        DB::beginTransaction();
        try {

            foreach ($request->all() as $inputName => $value) {
                if (!in_array($inputName, ['_method', '_token'])) {
                    $thirdPage = ThirdPage::where('key', $inputName)->first();
                    // dump($siteIdentity->variant);
                    if ($thirdPage->variant == "character") {
                        $thirdPage->update(['value' => $value]);
                    } else {
                        // dump($request->file($inputName) ? "prose upload" :  "not");

                        if ($request->hasFile($inputName)) {
                            $dest = env('IMAGE_PATH') . $thirdPage->value;

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

                            $thirdPage->update(['value' => $imagedb]);
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
        return redirect()->route('third-page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ThirdPage  $thirdPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThirdPage $thirdPage)
    {
        //
    }
}
