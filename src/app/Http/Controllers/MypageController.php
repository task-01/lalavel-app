<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $total_hours = $user->learningrecords->sum('hours');
        return view('mypage', ['total_hours' => $total_hours] );
    }

    public function edit()
    {
        $user = Auth::user();
        return view('mypage_edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('mypage');
    }
}
