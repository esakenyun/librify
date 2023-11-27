<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewFormRequest;
use App\Models\Book;
use App\Models\BookFile;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        $books = Book::where('trending', '1')->latest()->take(6)->get();
        return view('frontend.index', compact('categories', 'books'));
    }

    public function book()
    {
        $books = Book::where('status', '1')->latest()->get();
        return view('frontend.book.index', compact('books'));
    }

    public function categories()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        return view('frontend.category.index', compact('categories'));
    }

    public function showBookByCategory($category_name)
    {
        $category = Category::where('name', $category_name)->first();
        if (!$category) {
            abort(404);  // Or handle the case where the category is not found
        }

        // Retrieve books related to the category
        $books = $category->books;

        return view('frontend.category.bookcategory', compact('category', 'books'));
    }

    public function detailBook($book_id)
    {
        $books = Book::find($book_id);
        $publishers = Publisher::all();
        $ratings = $books->ratings;
        $bookfile = $books->bookfile;

        if ($books) {
            return view('frontend.book.bookdetails', compact('books', 'publishers', 'ratings', 'bookfile'));
        } else {
            return abort(404);
        }
    }

    public function searchBook(Request $request)
    {
        $query = $request->input('query');

        $results = Book::where('title', 'like', '%' . $query . '%')->get();

        return view('frontend.search.result', compact('results', 'query'));
    }

    public function postReviewBook(
        ReviewFormRequest $request,
    ) {
        $validatedData = $request->validated();

        if (Auth::check()) {
            $review = new Rating([
                'user_id' => auth()->user()->id,
                'book_id' => $validatedData['book_id'],
                'rating' => $validatedData['rating'],
                'review' => $validatedData['review'],
            ]);

            $review->save();
            notify()->success('Your Review Posted!');
            return redirect()->back();
        } else {
            notify()->info('You need to login to post a review');
            return redirect()->back();
        }
    }

    public function viewBook($bookfile_id)
    {
        $bookfile = BookFile::findOrFail($bookfile_id);

        if (Auth::check()) {
            return view('frontend.book.viewbook', compact('bookfile'));
        } else {
            notify()->info('You need to login to view the book.');
            return redirect()->back();
        }
    }

    public function downloadBook($bookfile_id)
    {
        $bookfile = BookFile::findOrFail($bookfile_id);

        if (Auth::check()) {
            $filePath = storage_path('app/public/' . $bookfile->bookfile);

            if (Storage::disk('public')->exists($bookfile->bookfile)) {
                return response()->download($filePath, $bookfile->name . '.pdf', ['Content-Type' => 'application/pdf']);
            } else {
                abort(404);
            }
        } else {
            notify()->info('You need to login to download the book.');
            return redirect()->back();
        }
    }
}
