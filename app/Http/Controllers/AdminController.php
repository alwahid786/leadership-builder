<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Question;
use App\Imports\QuestionsImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


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

    public function allQuestions()
    {
        $questions = Question::orderBy('day', 'asc')->get();

        // dd($questions);

        return view('pages.all-questions', compact('questions'));
    }

    public function addQuestionPage()
    {
        $questions = Question::orderBy('day', 'asc')->get();
        $lastQuestion = $questions->last();

        $lastday = 0;

        if ($lastQuestion==null) {
            $lastday = 1;
        } else {
            $lastday = $lastQuestion->day + 1;
        }

        return view('pages.add-question', compact('lastday'));
    }

    public function addQuestion(Request $request)
    {
        $request->validate([
            'day' => 'required',
            'question' => 'required',
            'quotation' => 'required',
        ]);

        $question = new Question();
        $question->day = $request->day;
        $question->question = $request->question;
        $question->quotation = $request->quotation;
        if ($request->author != null) {
            $question->author = $request->author;
        }

        // dd($question);
        $question->save();

        return redirect()->back()->with('responseSuccess', 'Question added successfully');
    }

    public function editQuestionPage($id)
    {
        $question = Question::find($id);

        return view('pages.edit-question', compact('question'));
    }

    public function editQuestion(Request $request){

        $request->validate([
            'day' => 'required',
            'question' => 'required',
            'quotation' => 'required',
        ]);

        $question = Question::find($request->id);
        $question->question = $request->question;
        $question->quotation = $request->quotation;
        if ($request->author != null) {
            $question->author = $request->author;
        }

        $question->save();

        return redirect()->back()->with('responseSuccess', 'Question updated successfully');
    }

    public function questionDetail($id){

        $question = Question::find($id);

        return view('pages.question-detail', compact('question'));
    }

    public function importPage(){

        return view('pages.import-questions');
    }

    public function import(Request $request)
    {
        $request->validate([
            'add-file' => 'required|mimes:xlsx,csv,xls'
        ]);

        $questions = Question::orderBy('day', 'asc')->get();
        $lastQuestion = $questions->last();

        $startDay = 0;

        if ($lastQuestion==null) {
            $startDay = 1;
        } else {
            $startDay = $lastQuestion->day + 1;
        }

        Excel::import(new QuestionsImport($startDay), $request->file('add-file'));

        return redirect()->back()->with('responseSuccess', 'Questions imported successfully.');
    }

    public function addUser(Request $request)
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

        if ($request->hasFile('profile_img')) {
            $user->profile_img = $user->id . '_profile.' . $request->profile_img->getClientOriginalExtension();
            // dd($user->profile_img);
            $image = $request->file('profile_img');
            $path = $image->storeAs('images', $user->profile_img, 'public'); // Store in public disk with the specified filename
        }

        $status = $user->save();
        
        return redirect()->back()->with('responseSuccess', 'User added successfully');
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'add-file' => 'required|mimes:xlsx,csv,xls'
        ]);

        // dd($request->all());
        Excel::import(new UsersImport, $request->file('add-file'));

        return redirect()->back()->with('responseSuccess', 'Users imported successfully.');
    }

    public function removeUser($id){

        $user = User::find($id);
        $user->delete();
        $book = Book::where('user_id', $id)->first();
        if ($book != null) {
            $book->delete();
        }
        return redirect()->route('users')->with('responseSuccess', 'User deleted successfully');
    }
    // public function checkDay($day)
    // {
    //     $questions = Question::where('day', $day)->first();

    //     // dd($questions);
    //     if ($questions == null) {
    //         return response()->json(['Day found', 'available' => false]);
    //     }


    //     return response()->json([$questions, 'available' => true]);
    // }
}
