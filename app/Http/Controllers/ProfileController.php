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

class ProfileController extends Controller
{
    use ResponseTrait;

    public function profileView()
    {
        $loginUserId = Auth::user()->id;
        $current_date = Carbon::now()->toDateString();
        
        $response_exists = User::where('id', $loginUserId)
            ->first();
         
        $today_response = Book::where('user_id', $loginUserId)
            ->whereDate('created_at', $current_date)
            ->first();
        if ($today_response==null) {
            $response_exists['response_type'] = null;
        }
        else {
            $response_exists['response_type'] = $today_response['response_type'];
        }

        // dd($response_exists);
        $response_exists['today'] = ($response_exists['response_type']==null ? auth()->user()->total_days+1: auth()->user()->total_days);
        
        return view('pages.profile-view', compact('response_exists'));
    }
}
