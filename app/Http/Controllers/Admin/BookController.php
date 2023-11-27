<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookFormRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.adminbooks', compact('books', 'categories', 'publishers'));
    }

    public function create()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('admin.book.create', compact('categories', 'publishers'));
    }

    public function store(BookFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['category_id']);
        $publisher = Publisher::findOrFail($validatedData['publisher_id']);

        $book = $category->books()->create([
            'category_id' => $validatedData['category_id'],
            'publisher_id' => $validatedData['publisher_id'],
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'small_description' => $validatedData['small_description'],
            'abstract' => $validatedData['abstract'],
            'trending' => $request->trending ? '1' : '0',
            'status' => $request->status ? '1' : '0',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/books', 'public');
            $book->image = $imagePath;
            $book->save();
        }

        notify()->success('Book Added Successfully');
        return redirect('/book');
    }

    public function edit($book_id)
    {
        $book = Book::find($book_id);
        $categories = Category::all();
        $publishers = Publisher::all();

        return view('admin.book.edit', compact('book', 'categories', 'publishers'));
    }

    public function update(BookFormRequest $request, $book_id)
    {
        $validatedData = $request->validated();

        $book = Book::findOrFail($book_id);

        $book->update([
            'category_id' => $validatedData['category_id'],
            'publisher_id' => $validatedData['publisher_id'],
            'title' => $validatedData['title'],
            'author' => $validatedData['author'],
            'small_description' => $validatedData['small_description'],
            'abstract' => $validatedData['abstract'],
            'trending' => $request->trending ? '1' : '0',
            'status' => $request->status ? '1' : '0',
        ]);

        // Update book image if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('uploads/books', 'public');
            $book->image = $imagePath;
            $book->save();
        }

        notify()->success('Book Updated Successfully');
        return redirect('/book');
    }

    public function destroy($book_id)
    {
        $book = Book::find($book_id);

        if ($book) {
            if ($book->image && Storage::disk('public')->exists($book->image)) {
                Storage::disk('public')->delete($book->image);
            }

            $book->delete();

            notify()->success('Book deleted Successfully');
            return redirect('/book');
        } else {
            notify()->error('Book not found.');
            return redirect('/book');
        }
    }
}
