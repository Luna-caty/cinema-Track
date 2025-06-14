<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = \App\Models\Movie::all();
        return view('movies', compact('movies'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'genre' => 'nullable',
            'year' => 'nullable|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        Movie::create($data);

        return redirect()->route('movies')->with('success', 'Film ajouté avec succès !');
    }
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies')->with('success', 'Film supprimé avec succès !');
    }
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'genre' => 'nullable',
            'year' => 'nullable|integer',
            'image' => 'nullable|image|max:2048'
        ]);

        $movie = Movie::findOrFail($id);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        $movie->update($data);

        return redirect()->route('movies')->with('success', 'Film mis à jour avec succès !');
    }
}
