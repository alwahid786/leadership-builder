<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Book;
use App\Models\Question;
use App\Imports\QuestionsImport;
use Maatwebsite\Excel\Facades\Excel;
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
