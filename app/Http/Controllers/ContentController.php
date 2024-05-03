<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use App\Models\PageCode;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\MessageBag;
use App\Http\Traits\ResponseTrait;
use App\Mail\OtpMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Symfony\Component\HttpFoundation\RequestStack;

class ContentController extends Controller
{
    use ResponseTrait;

    // Slides Function - Disabled/ Abandoned
    public function showSlide(Request $request, $slideNumber)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);

        // If Coming From Cover Page
        if ($slideNumber == 1) {
            $book = Book::where('user_id', $loginUserId)->first('designed_for');
            if ($book == null || empty($book)) {
                return redirect()->back()->withErrors('Please add proper data first.');
            }
        }

        if ($user->page_number >= $slideNumber) {
            return view('pages.slide' . $slideNumber);
        } else {
            User::where('id', $loginUserId)->update(['page_number' => $slideNumber]);
            return redirect()->route('slide', ['slideNumber' => $slideNumber]);
        }
    }

    // Gratitude FUnction 
    public function gratitudeFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);

        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->wow == '' || $book->wow == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Wow first.');
        }
        if ($user->page_number >= 8) {
            return view('pages.gratitude', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 8]);
            return redirect('/gratitude');
        }
    }

    // Desire FUnction 
    public function desireFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->gratitude == '' || $book->gratitude == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Gratitude first.');
        }
        if ($user->page_number >= 9) {
            return view('pages.desire', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 9]);
            return redirect('/desire');
        }
    }

    // WOW FUnction 
    public function wowFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        // If Coming From Cover Page
        $book = Book::where('user_id', $loginUserId)->first('first_name');
        if ($book == null || empty($book)) {
            return redirect()->back()->withErrors('Please add proper data first.');
        }
        $book = Book::where('user_id', $loginUserId)->first();

        if ($user->page_number >= 7) {
            return view('pages.wow', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 7]);
            return redirect('/wow');
        }
    }

    // vision FUnction 
    public function visionFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->wow == '' || $book->wow == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Wow first.');
        }
        $book = Book::where('user_id', $loginUserId)->first();

        if ($user->page_number >= 10) {
            return view('pages.vision', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 10]);
            return redirect('/see-it');
        }
    }

    // inspiration FUnction 
    public function inspirationFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->vision == '' || $book->vision == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Vision first.');
        }
        $book = Book::where('user_id', $loginUserId)->first();

        if ($user->page_number >= 11) {
            return view('pages.inspiration', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 11]);
            return redirect('/say-it');
        }
    }

    // execution FUnction 
    public function executionFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->inspiration == '' || $book->inspiration == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Inspiration first.');
        }
        $book = Book::where('user_id', $loginUserId)->first();

        if ($user->page_number >= 12) {
            return view('pages.execution', compact('book'));
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 12]);
            return redirect('/live-it');
        }
    }

    // conclusion FUnction 
    public function conclusionFunction(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::find($loginUserId);
        $book = Book::where('user_id', $loginUserId)->first();
        if ($book->execution == '' || $book->execution == null) {
            return redirect()->back()->with('nextError', 'Please insert and save Execution first.');
        }
        if ($user->page_number >= 13) {
            return view('pages.conclusion');
        } else {
            User::where('id', $loginUserId)->update(['page_number' => 13]);
            return redirect('/conclusion');
        }
    }

    // Show Cover Page
    public function coverPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.cover', compact('book'));
    }

    // Show gratitude Page
    public function gratitudePage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.gratitude', compact('book'));
    }

    // Show wow Page
    public function wowPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.wow', compact('book'));
    }

    // Show desire Page
    public function desirePage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.desire', compact('book'));
    }

    // Show Vision Page
    public function visionPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.vision', compact('book'));
    }

    // Show inspiration Page
    public function inspirationPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.inspiration', compact('book'));
    }

    // Show execution Page
    public function executionPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.execution', compact('book'));
    }

    // Show conclusion Page
    public function conclusionPage(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.conclusion', compact('book'));
    }

    // submit cover FUnction 
    public function submitCover(Request $request)
    {
        $loginUserId = Auth::user()->id;
        if ($request->has('book_id') && $request->book_id != '') {
            $book = Book::find($request->book_id);
        } else {
            $book = new Book();
        }
        $book->user_id = $loginUserId;
        $book->first_name = $request->first_name;
        $book->last_name = $request->last_name;
        $book->save();
        return $this->sendResponse($book, 'Data inserted successfully!');
    }

    // submit Gratitude Function 
    public function submitGratitude(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->gratitude = $request->gratitude;
        $book->save();
        return redirect()->back()->with('gratitudeSuccess', 'Data inserted Successfully!');
    }

    // submit Desire Function 
    public function submitDesire(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->desire = $request->desire;
        $book->save();
        return redirect()->back()->with('desireSuccess', 'Data inserted Successfully!');
    }

    // submit Wow Function 
    public function submitWow(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->wow = $request->wow;
        $book->save();
        return redirect()->back()->with('wowSuccess', 'Data inserted Successfully!');
    }

    // submit Vision Function 
    public function submitVision(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->vision = $request->vision;
        $book->save();
        return redirect()->back()->with('visionSuccess', 'Data inserted Successfully!');
    }

    // submit Inspiration Function 
    public function submitInspiration(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->inspiration = $request->inspiration;
        $book->save();
        return redirect()->back()->with('inspirationSuccess', 'Data inserted Successfully!');
    }

    // submit Execution Function 
    public function submitExecution(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $book->execution = $request->execution;
        $book->save();
        return redirect()->back()->with('executionSuccess', 'Data inserted Successfully!');
    }

    // submit Welcome Function 
    public function submitWelcome(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $user = User::where('id', $loginUserId)->update(['is_welcomed' => 1]);
        if ($user) {
            return redirect('/cover');
        } else {
            return redirect('/cover');
        }
    }

    // Create PDF Function 
    public function createPdf()
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        $pdf = PDF::loadView('pages.pdf', compact('book')); // load view and pass data
        $pdf->setPaper([0, 0, 800, 1200], 'portrait');
        // Set the response content-type to PDF
        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename=' . 'Transformational Leadership ' . date('d-m-Y') . '".pdf"'
        ];

        // Return the rendered PDF in a new tab
        return response($pdf->stream(), 200, $headers);
    }


    public function viewPdf()
    {
        $loginUserId = Auth::user()->id;
        $book = Book::where('user_id', $loginUserId)->first();
        return view('pages.pdf', compact('book'));
    }

    public function validatePageCode(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $pageCode = PageCode::where('page_number', $request->page_number)->first();
        if ($pageCode->code === $request->code) {
            User::where('id', $loginUserId)->update(['unlocked_pages' => $request->page_number]);
            return $this->sendResponse([], "Page Unlocked Successfully!");
        } else {
            return $this->sendError('Incorrect Page Code!');
        }
    }

    public function updatePageCode(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $pageCode = PageCode::where('id', $request->id)->update(['code' => $request->code]);
        if ($pageCode) {
            return $this->sendResponse([], "Page Code Updated Successfully!");
        } else {
            return $this->sendError('Error while updating Page Code!');
        }
    }

    public function pageCodes(Request $request)
    {
        $loginUserId = Auth::user()->id;
        $pageCodes = PageCode::all();
        return view('pages.page-codes', compact('pageCodes'));
    }
}
