<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use DateTime;
use App\VideoCategory;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $current_user = Auth::user();
        // $categories = DB::table('video_categories')->get();
        $categories = VideoCategory::all();
        $current_date = new DateTime();

        return view('home.index', [
            'current_user' => $current_user,
            'categories' => $categories,
            'current_date' => $current_date
        ]);
    }

    /**
     * Logout auth
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
