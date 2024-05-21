<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use Carbon\Carbon;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    use ResponseTrait;

    public function users(Request $request)
    {
        $users = User::where('type', 'user')->get();

        // dd($users);
        
        return view('pages.users', compact('users'));

    }

    public function userDetail($id)
    {
        $user = User::find($id);

        return view('pages.user-detail', compact('user'));
    }
}
