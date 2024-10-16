<?php

namespace App\Http\Controllers;


use App\Models\Author; // Import model Author
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data author dari database
        $authors = Author::all();

        // Tampilkan view index dengan data author
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan view untuk membuat author baru
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'phone_number' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
        ]);

        Author::create($request->all()); // Simpan author baru ke database
        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        // Tampilkan detail author berdasarkan id
        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        // Tampilkan view untuk mengedit data author
        return view('authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email,' . $author->id,
            'phone_number' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:500',
            'phone_number' => 'nullable|string|max:20',
        ]);

        $author->update($request->all()); // Update data author
        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $author->delete(); // Hapus author berdasarkan id
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
