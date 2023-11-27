<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewFormRequest;
use App\Models\Book;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $ratings = Rating::all();
        $users = User::all();
        $books = Book::all();

        return view('admin.adminreview', compact('ratings', 'users', 'books'));
    }

    public function edit($rating_id)
    {
        $rating = Rating::find($rating_id);

        return view('admin.review.edit', compact('rating'));
    }

    public function update(ReviewFormRequest $request, $rating_id)
    {
        $validatedData = $request->validated();

        $rating = Rating::findOrFail($rating_id);

        $rating->update([
            'user_id' => $validatedData['user_id'],
            'book_id' => $validatedData['book_id'],
            'rating' => $validatedData['rating'],
            'review' => $validatedData['review'],
        ]);

        notify()->success('Review Updated Successfully');
        return redirect('/userReview');
    }

    public function destroy($rating_id)
    {
        $rating = Rating::find($rating_id)->delete();

        notify()->success('Review Delete Successfully');
        return redirect('/userReview');
    }
}
