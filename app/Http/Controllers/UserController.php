<?php

namespace App\Http\Controllers;

use App\Models\Method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function history(){
        $history = Method::where('user_id', '=', Auth::user()->id)->get();
        return view('content.history',[
            'active' => 'history',
            'title' => 'History',
            'histories' => $history
        ]);
    }
}
