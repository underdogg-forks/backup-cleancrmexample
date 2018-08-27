<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $body_class = '';

        return view('frontend.index', compact('body_class'));
    }

    public function profile()
    {
        $body_class = 'profile-page';

        return view('frontend.profile', compact('body_class'));
    }
}
