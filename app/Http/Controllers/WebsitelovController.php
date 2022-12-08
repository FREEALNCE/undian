<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLov;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class WebsitelovController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('website-setting.edit', [
            'settings' => WebsiteLov::whereIn('key', ['image_logo', 'banner', 'image_footer', 'footer_desc', 'footer_copy', 'ads_1', 'ads_2', 'ads_3'])->get()->toArray()
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
     * @param  \App\Models\WebsiteLov  $websiteLov
     * @return \Illuminate\Http\Response
     */
    public function show(WebsiteLov $websiteLov)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WebsiteLov  $websiteLov
     * @return \Illuminate\Http\Response
     */
    public function edit(WebsiteLov $websiteLov)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteLov  $websiteLov
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebsiteLov $websiteLov)
    {
        DB::beginTransaction();
        try {

            foreach ($request->all() as $inputName => $value) {
                if (!in_array($inputName, ['_method', '_token'])) {
                    $websiteLov = WebsiteLov::where('key', $inputName)->first();
                    // dump($siteIdentity->variant);
                    if ($websiteLov->variant == "character") {
                        $websiteLov->update(['value' => $value]);
                    } else {
                        // dump($request->file($inputName) ? "prose upload" :  "not");

                        if ($request->hasFile($inputName)) {
                            $dest = env('IMAGE_PATH') . $websiteLov->value;

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

                            $websiteLov->update(['value' => $imagedb]);
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
        return redirect()->route('website-lov.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WebsiteLov  $websiteLov
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebsiteLov $websiteLov)
    {
        //
    }
}
