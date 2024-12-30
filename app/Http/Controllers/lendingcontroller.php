<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\History;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    // Show the view to input a borrowing
    public function create() {
        // Get all books available for lending
        $books = Book::all();  // Adjust this query if needed to match your book lending criteria
        
        return view('lending.bookLend', compact('books'));
    }

    // Store the lending data
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'book_id' => 'required',
            'tgl_pinjam' => 'required'
        ]);

        // Create a new member record
        $member = new Member;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->save();

        // Find the book by ID
        $book = Book::find($request->book_id);
        if (!$book) {
            return back()->with('error', 'Book not found.');
        }

        // Create a new history record for the borrowing
        $history = new History;
        $history->member_id = $member->id;
        $history->book_id = $book->id;
        $history->status = 'borrowed';  // Book borrowed
        $history->tgl_pinjam = $request->tgl_pinjam;
        $history->tgl_kembali = \Carbon\Carbon::now()->addDays(7)->format('Y-m-d');
        $history->save();

        // Redirect back to the lending page or books index
        return redirect()->route('lending.create')->with('success', 'Book borrowed successfully.');
    }
}
