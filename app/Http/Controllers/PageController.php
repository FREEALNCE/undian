<?php

namespace App\Http\Controllers;

use App\Models\WebsiteLov;
use App\Models\FirstPage;
use App\Models\SecondPage;
use App\Models\ThirdPage;
use App\Models\Day;
use App\Models\Night;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();

        $days = Day::orderBy('created_at', 'desc')->paginate(10);
        $nights = Night::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.index', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'days', 'nights'));
    }

    public function dayresults() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();

        $days = Day::select('*')->where('is_active', '=', 0)->orderBy('created_at', 'desc')->paginate(7)->withQueryString();

        return view('pages.day-result', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'days'));
    }

    public function nightresults() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();

        $nights = Night::select('*')->where('is_active', '=', 0)->orderBy('created_at', 'desc')->paginate(7)->withQueryString();

        return view('pages.night-result', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'nights'));
    }

    public function firstpage() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();
        
        $imageFirst = FirstPage::whereIn('key', ['image_first'])->get()->toArray();
        $imageSecond = FirstPage::whereIn('key', ['image_second'])->get()->toArray();
        $descs = FirstPage::whereIn('key', ['description'])->get()->toArray();

        return view('pages.first-page', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'imageFirst', 'imageSecond', 'descs'));
    }

    public function secondpage() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();
        
        $imageFirst = SecondPage::whereIn('key', ['image_first'])->get()->toArray();
        $imageSecond = SecondPage::whereIn('key', ['image_second'])->get()->toArray();
        $descs = SecondPage::whereIn('key', ['description'])->get()->toArray();

        return view('pages.second-page', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'imageFirst', 'imageSecond', 'descs'));
    }

    public function thirdpage() {
        $imageLogo = WebsiteLov::whereIn('key', ['image_logo'])->get()->toArray();
        $banners = WebsiteLov::whereIn('key', ['banner'])->get()->toArray();
        $imageFooter = WebsiteLov::whereIn('key', ['image_footer'])->get()->toArray();
        $footerDesc = WebsiteLov::whereIn('key', ['footer_desc'])->get()->toArray();
        $footerCopy = WebsiteLov::whereIn('key', ['footer_copy'])->get()->toArray();
        $ads1 = WebsiteLov::whereIn('key', ['ads_1'])->get()->toArray();
        $ads2 = WebsiteLov::whereIn('key', ['ads_2'])->get()->toArray();
        $ads3 = WebsiteLov::whereIn('key', ['ads_3'])->get()->toArray();
        
        $imageFirst = ThirdPage::whereIn('key', ['image_first'])->get()->toArray();
        $imageSecond = ThirdPage::whereIn('key', ['image_second'])->get()->toArray();
        $descs = ThirdPage::whereIn('key', ['description'])->get()->toArray();

        return view('pages.third-page', compact('imageLogo', 'banners', 'imageFooter', 'footerDesc', 'footerCopy', 'ads1', 'ads2', 'ads3', 'imageFirst', 'imageSecond', 'descs'));
    }
}
