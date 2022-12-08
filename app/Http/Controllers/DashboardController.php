<?php

namespace App\Http\Controllers;

use Facade\FlareClient\Context\RequestContext;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Partner;
use App\Models\PartnerRegion;
use App\Models\Gallery;
use App\Models\User;


class DashboardController extends Controller
{

    public function index(Request $request)
    {
        return view('dashboard.index');
    }
}
