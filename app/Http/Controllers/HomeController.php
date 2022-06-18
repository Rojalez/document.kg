<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Userdocument;

class HomeController extends Controller
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
        if (Auth::check()) {
            $user = Auth::user();
            $id = $user->id;
            
        }

        $user = User::findOrFail($id);

        return view('home', compact('user'));
    }

    public function my_document($id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $document = Userdocument::findOrFail($id);
            if ($user->id === $document->user_id) {
                return view('documents.userdocument', compact('document'));
            }
        }



        
    }
}
