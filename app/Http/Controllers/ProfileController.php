<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
	
    public function index(){
    	$profile = Profile::where('user_id', Auth::user()->id)->first();
    	return view('profile.index', compact('profile'));
    }
}
