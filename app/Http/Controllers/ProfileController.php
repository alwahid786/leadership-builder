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

    public function profileView(Request $request)
    {
        // dd($request->path());
        
        $userid = Auth::user()->id;
        $response_exists = $this->navbardynamic($userid);

        if ($request->path() == 'profile'){
            return view('pages.profile-view', compact('response_exists'));
        }
        elseif ($request->path() == 'profile-edit-view'){
            return view('pages.edit-profile', compact('response_exists'));
        }
    }

    public function profileEdit(Request $request)
    {
        // dd($request->all());
        $userid = Auth::user()->id;
        $user = User::find($userid);

        if ($request->hasFile('profile_img')) {
            if ($user->profile_img) {
                // Delete the previous image file
                Storage::disk('public')->delete('images/' . $user->profile_img);
            }
            $user->profile_img = $user->id . '_profile.' . $request->profile_img->getClientOriginalExtension();
            // dd($user->profile_img);
            $image = $request->file('profile_img');
            $path = $image->storeAs('images', $user->profile_img, 'public'); // Store in public disk with the specified filename
        
            // return response()->json(['success' => true, 'data' => $path]);
        }
        
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        
        $response_exists = $this->navbardynamic($userid);
        // dd($response_exists);
        
        return redirect()->route('profileEditView')->with(['response_exists' => $response_exists, 'responseSuccess' => 'Profile updated successfully!']);
    }

    public function navbardynamic($loginUserId){
        
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

        return $response_exists;
    }
}
