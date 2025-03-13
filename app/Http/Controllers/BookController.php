<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show book list
    public function index()
    {
        $books = Book::all(); // Fetch all books
        return view('books.index', compact('books'));
    }

    // Show book creation form
    public function create()
    {
        return view('books.create');
    }

    // Store new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|unique:books|string|max:20',
            'description' => 'nullable|string',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }
    public function search(Request $request)
{
    $query = $request->input('query');

    $books = Book::where('title', 'like', "%$query%")
                ->orWhere('isbn', 'like', "%$query%")
                ->get();

    return view('books.index', compact('books'));
}
public function edit($id)
{
    // Retrieve the book by its ID
    $book = Book::findOrFail($id); 

    // Return the edit view with the book details
    return view('books.edit', compact('book'));
}
public function update(Request $request, $id)
{
    // Validate the input
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'isbn' => 'required|string|max:20',
        'description' => 'nullable|string',
    ]);

    // Find the book and update its details
    $book = Book::findOrFail($id);
    $book->update($request->all());

    // Redirect with a success message
    return redirect()->route('books.index')->with('success', 'Book updated successfully!');
}


}