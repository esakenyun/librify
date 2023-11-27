<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookFileFormRequest;
use App\Models\Book;
use App\Models\BookFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookFileController extends Controller
{
    public function index()
    {
        $bookfiles = BookFile::all();
        return view('admin.adminbookfile', compact('bookfiles'));
    }

    public function create()
    {
        $books = Book::all();
        return view('admin.bookfile.create', compact('books'));
    }

    public function store(BookFileFormRequest $request)
    {
        $validatedData = $request->validated();

        $book = Book::findOrFail($validatedData['book_id']);

        $bookfile = $book->bookfile()->create([
            'book_id' => $validatedData['book_id'],
            'name' => $validatedData['name'],
        ]);

        if ($request->hasFile('bookfile')) {
            $bookPath = $request->file('bookfile')->store('uploads/bookfile', 'public');
            $bookfile->bookfile = $bookPath;
            $bookfile->save();
        }

        notify()->success('Book File Added Successfully');
        return redirect('/bookfile');
    }

    public function edit($bookfile_id)
    {
        $bookfile = BookFile::find($bookfile_id);
        $books = Book::all();

        return view('admin.bookfile.edit', compact('bookfile', 'books'));
    }

    public function update(BookFileFormRequest $request, $bookfile_id)
    {
        $validatedData = $request->validated();

        $bookfile = BookFile::findOrFail($bookfile_id);

        $bookfile->update([
            'book_id' => $validatedData['book_id'],
            'name' => $validatedData['name'],
        ]);

        // Update book image if a new image is provided
        if ($request->hasFile('bookfile')) {
            // Delete the old image
            if ($bookfile->bookfile && Storage::disk('public')->exists($bookfile->bookfile)) {
                Storage::disk('public')->delete($bookfile->bookfile);
            }

            // Store the new image
            $bookPath = $request->file('bookfile')->store('uploads/bookfile', 'public');
            $bookfile->bookfile = $bookPath;
            $bookfile->save();
        }

        notify()->success('Book File Updated Successfully');
        return redirect('/bookfile');
    }

    public function destroy($bookfile_id)
    {
        $bookfile = BookFile::find($bookfile_id);

        if ($bookfile) {
            if ($bookfile->bookfile && Storage::disk('public')->exists($bookfile->bookfile)) {
                Storage::disk('public')->delete($bookfile->bookfile);
            }

            $bookfile->delete();

            notify()->success('Book File deleted Successfully');
            return redirect('/bookfile');
        } else {
            notify()->error('Book File not found.');
            return redirect('/bookfile')->with('error', 'Book File not found.');
        }
    }
}
