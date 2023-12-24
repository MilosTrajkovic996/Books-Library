<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show all books
    public function index() {
        return view('books.index', [
            'books' => Book::latest()->filter(request(['tag', 'search']))->paginate(6)
        ]);
    }

    // Show single Book
    public function show(Book $book) {
        return view('books.show' , [
            'book' => $book
        ]);
    }

    // Show Create Form
    public function create() {

        // Check if the authenticated user has the 'librarian' role
        if (auth()->check() && auth()->user()->role !== 'librarian') {
            abort(403, 'You do not have permission to access this page.');
        }
        
        return view('books.create');
    }

    // Store Book and Author Data
    public function store(Request $request) {

        // Check if the authenticated user has the 'librarian' role
        if (auth()->check() && auth()->user()->role !== 'librarian') {
            abort(403, 'You do not have permission to access this page.');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email'],
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Add validation for image files
        ]);
    
        // Check if the author with the given email already exists
        $existingAuthor = Author::where('email', $formFields['email'])->first();
    
        if ($existingAuthor) {
            // Use the existing author's ID
            $formFields['author_id'] = $existingAuthor->id;
        } else {
            // Create a new author
            $newAuthor = Author::create([
                'name' => $formFields['name'],
                'surname' => $formFields['surname'],
                'email' => $formFields['email'],
            ]);
    
            // Attach the new author's ID to the $formFields array
            $formFields['author_id'] = $newAuthor->id;
        }
    
        // Upload and store the book picture
        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }
    
        // Attach the user_id (ownership) to the $formFields array
        $formFields['user_id'] = auth()->id();
    
        // Create the Book record
        Book::create($formFields);
    
        return redirect('/')->with('message', 'Book created successfully!');
    }

    // Show Edit Book Form
    public function edit(Book $book) {

        // Check if the authenticated user has the 'librarian' role
        if (auth()->check() && auth()->user()->role !== 'librarian') {
            abort(403, 'You do not have permission to access this page.');
        }

        return view('books.edit', ['book' => $book]);
    }

    // Update Book Data
    public function update(Request $request, Book $book) {

        // Check if the authenticated user has the 'librarian' role
        if (auth()->check() && auth()->user()->role !== 'librarian') {
            abort(403, 'You do not have permission to access this page.');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'description' => 'required',
        ]);

        if($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        $book->update($formFields);

        return redirect("/books/{$book->id}")->with('message', 'Book updated successfully!');
    }

    // Delete Book
    public function delete(Book $book) {
        $book->delete();
        return redirect('/')->with('message', 'Book deleted successfully');
    }

    // Manage books
    public function manage() {

        // Check if the authenticated user has the 'librarian' role
        if (auth()->check() && auth()->user()->role !== 'librarian') {
            abort(403, 'You do not have permission to access this page.');
        }

        return view('books.manage', ['books' => Book::get()]);
    }
}
