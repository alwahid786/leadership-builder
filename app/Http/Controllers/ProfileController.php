<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Invoices;
use App\Models\PlansPricing;
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

    public function plans(Request $request)
    {
        $userid = Auth::user()->id;
        $response_exists = $this->navbardynamic($userid);

        $plans = PlansPricing::all();

        $intent = auth()->user()->createSetupIntent();

        $invoices = Invoices::with(['plan', 'user'])->where('user_id', $userid)->get();

        $cur_sub = auth()->user()->subscription();
        
        if ($cur_sub && $cur_sub->active() && $cur_sub->ends_at > Carbon::now()) {
            $cur_sub = PlansPricing::where('stripe_price_id', $cur_sub->stripe_price)->first();
        }
        
        // dd($cur_sub);

        return view('pages.plans', compact('response_exists', 'plans', 'intent', 'invoices', 'cur_sub'));
    }

    public function userInvoice(Request $request)
    {
        $userid = Auth::user()->id;
        $response_exists = $this->navbardynamic($userid);

        $invoices = Invoices::with(['plan', 'user'])->where('user_id', $userid)->get();
        // dd($invoices);

        return view('pages.user_invoices', compact('response_exists', 'invoices'));
    }

    public function singleCharge(Request $request)
    {
        // return $request->all();
        $getplan = PlansPricing::where('id', $request->plan_id)->first();

        $amount = $getplan->price*100;
        $paymentMethod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        if ($paymentMethod != null) {
            // $user->addPaymentMethod($paymentMethod);
            $paymentMethod = $user->addPaymentMethod($paymentMethod);
        }
        $user->charge($amount, $paymentMethod->id);

        try {
            $subscription = $user->newSubscription(
                'default', $getplan->stripe_price_id
                )->create($paymentMethod->id);
        } catch (Exception $th) {
            return back()->with([
                'nextError' => 'Something went wrong!', $th->getMessage()
            ]);
        }

        if ($getplan->duration == 'month') {
            $subscription->ends_at = Carbon::now()->addMonth();
        }
        if ($getplan->duration == 'year') {
            $subscription->ends_at = Carbon::now()->addYear();
        }
        $subscription->save();

        $invoice = new Invoices();
        $invoice->user_id = Auth::user()->id;
        $invoice->plan_id = $request->plan_id;
        $invoice->save();

        $lastInsertedId = $invoice->id;

        // return redirect()->route('plans')->with('responseSuccess', 'Payment successful!');
        return redirect()->route('invoice', ['id' => $lastInsertedId])->with('responseSuccess', 'Payment successful!');
    }

    public function invoice(Request $request)
    {
        $userid = Auth::user()->id;
        $response_exists = $this->navbardynamic($userid);

        $invoice = Invoices::with(['plan', 'user'])->where('id', $request->id)->first();
        return view('pages.invoice', compact('response_exists', 'invoice'));
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
