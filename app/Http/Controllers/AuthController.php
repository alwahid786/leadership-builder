<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use App\Http\Traits\ResponseTrait;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    use ResponseTrait;

    // Function to convert the validation MessageBag to plain text
    private function convertMessagesToPlainText(MessageBag $messages): string
    {
        return implode("\n", $messages->all());
    }

    // Signup Function 
    public function signupFunction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required',
            'password' => 'required|min:6|max:32|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',

        ]);
        if ($validator->fails()) {
            $plainTextErrorMessage = $this->convertMessagesToPlainText($validator->errors());
            return $this->sendError($plainTextErrorMessage);
        }
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);
        $user->type = "user";
        $user->page_number = "0";
        $status = $user->save();
        if ($status) {
            return $this->sendResponse($user, 'Registration Successfull!');
        } else {
            return $this->sendError("Something went wrong! Try again later.");
        }
    }

    // Signin Function 
    public function signinFunction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6|max:32',

        ]);
        if ($validator->fails()) {
            $plainTextErrorMessage = $this->convertMessagesToPlainText($validator->errors());
            return $this->sendError($plainTextErrorMessage);
        }
        $UserData = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (!auth()->attempt($UserData)) {
            return $this->sendError("Try again. Wrong password.Try again or click forget password to reset your password.");
        }

        $authUser = auth()->user();
        $authUser->token = $authUser->createToken('API Token')->accessToken;
        return $this->sendResponse($authUser, 'Login Successfull!');
    }


    // Forgot Password Function 
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        if ($validator->fails()) {
            $plainTextErrorMessage = $this->convertMessagesToPlainText($validator->errors());
            return $this->sendError($plainTextErrorMessage);
        }

        $otp = rand(1000, 9999);
        if (!User::where('email', $request->email)->update(['otp_code' => $otp])) {
            return $this->sendError('Unable to proccess. Please try again later.');
        }
        Mail::to($request->email)->send(new OtpMail($otp));
        $request->session()->put('otp_email', $request->email);
        return $this->sendResponse([], 'Please check your email for verification.');
    }

    // Verify OTP CODE FUNCTION 
    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp_code' => 'required',
        ]);
        if ($validator->fails()) {
            $plainTextErrorMessage = $this->convertMessagesToPlainText($validator->errors());
            return $this->sendError($plainTextErrorMessage);
        }
        $userEmail = $request->session()->get('otp_email');
        $user = User::where('email', $userEmail)->first();
        if ($user->otp_code == intval($request->otp_code)) {
            $user->otp_code = null;
            $user->save();
            return $this->sendResponse([], 'Email Verified! Click Ok to set new password.');
        }
        return $this->sendError("Invalid OTP Code!");
    }

    // Password Reset Function 
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:6|max:32|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            $plainTextErrorMessage = $this->convertMessagesToPlainText($validator->errors());
            return $this->sendError($plainTextErrorMessage);
        }
        $userEmail = $request->session()->get('otp_email');
        $user = User::where('email', $userEmail)->first();
        $status = $user->update(['password' => bcrypt($request->password)]);
        if (!$status) {
            return redirect()->back()->withErrors("Something went wrong! Please try again.");
            return $this->sendError("Something went wrong! Please try again.");
        }
        return $this->sendResponse([], 'Password Updated! Use your new password to login.');
    }

    // Logout FUnction 
    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
