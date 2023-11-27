<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(6);
        $books = Book::where('trending', '1')->latest()->take(6)->get();
        $book = Book::all();
        $category = Category::all();
        $publisher = Publisher::all();
        $user = User::all();
        $review = Rating::all();
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('frontend.index', compact('categories', 'books'));
            } else if ($usertype == 'admin') {
                return view('admin.adminhome', compact('category', 'book', 'publisher', 'user', 'review'));
            } else {
                return redirect()->back();
            }
        }
    }
}
