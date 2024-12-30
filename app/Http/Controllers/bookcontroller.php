<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Show the main view
    public function index(Request $request)
{
    $keyword = $request->get('search');
    $perPage = 5;

    if (!empty($keyword)) {
        // Only search in existing columns like title, author, and publication_year
        $products = Book::where('title', 'LIKE', "%$keyword%")
                        ->orWhere('author', 'LIKE', "%$keyword%")
                        ->orWhere('publication_year', 'LIKE', "%$keyword%")
                        ->latest()
                        ->paginate($perPage);
    } else {
        // If no search term is provided, just fetch all products
        $products = Book::latest()->paginate($perPage);
    }

    return view('products.home', ['products' => $products])
        ->with('1', (request()->input('page', 1) - 1) * 5);
}


    // Show the view to input a book
    public function create(){
        return view('products.input');
    }

    // Save a book in database
    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
            'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2028'
        ]);

        $book = new Book;

        $file_name = time() . '.' . request()->picture->getClientOriginalExtension();
        request()->picture->move(public_path('picture'), $file_name);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication_year = $request->publication_year;
        $book->description = $request->description ?? null; // Optional field
        $book->picture = $file_name; // Correct column name

        $book->save();
        return redirect()->route('products.index')->with('success', 'Book Added Successfully');
    }

    // Show the view to edit a book
    public function edit($id) {
        $product = Book::findOrFail($id);
        return view('products.edit', ['product'=>$product]);
    }

    // Update book data in database
    // public function update(Request $request, Book $book) {
    //     $request->validate([
    //         'title' => 'required',
    //     ]);

    //     $file_name = $request->hidden_product_image; // Use the hidden input for the current image

    //     if($request->hasFile('picture')) { // Check if a new image is uploaded
    //         $file_name = time() . '.' . $request->picture->getClientOriginalExtension();
    //         $request->picture->move(public_path('picture'), $file_name);
    //     }

    //     $book->title = $request->title;
    //     $book->author = $request->author;
    //     $book->publication_year = $request->publication_year;
    //     $book->description = $request->description ?? null; // Optional field
    //     $book->picture = $file_name; // Correct column name for the image

    //     $book->save();

    //     return redirect()->route('products.index')->with('success', 'Book Edited Successfully');
    // }
    public function update(Request $request, $id) {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'publication_year' => 'required',
        ]);
    
        // Find the book by ID
        $book = Book::findOrFail($id);
    
        // Handle the image upload
        if ($request->hasFile('picture')) {
            // If a new image is uploaded, create a new file name and move it
            $file_name = time() . '.' . $request->picture->getClientOriginalExtension();
            $request->picture->move(public_path('picture'), $file_name);
            // Update the image in the database
            $book->picture = $file_name;
        } else {
            // If no new image is uploaded, keep the current image
            $book->picture = $request->current_image;
        }
    
        // Update other fields
        $book->title = $request->title;
        $book->author = $request->author;
        $book->publication_year = $request->publication_year;
        $book->description = $request->description ?? null; // Update description (if provided)
    
        // Save the book details
        $book->save();
    
        // Redirect back to the index page with a success message
        return redirect()->route('products.index')->with('success', 'Book Updated Successfully');
    }
    
    
    
    

    // Delete a book in database
    public function destroy($id){
        $product = Book::findOrFail($id);
        $image_path = public_path('picture/') . $product->picture; // Correct directory
        if(file_exists($image_path)) {
            @unlink($image_path); // Delete the old image
        }
        $product->delete();
        return redirect('products')->with('success','Book Deleted');
    }
}
