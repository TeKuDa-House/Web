<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $filter = $request->input('filter');

        $ads = Ad::paginate(48);

        if($filter and $filter != 'All') {
            $categoryId = Category::where('name', '=', $filter)->first()->id;

            $ads = Ad::where('cat_id', '=', $categoryId)->paginate(48);
        }

        return view('home', compact('ads'));
    }
}
