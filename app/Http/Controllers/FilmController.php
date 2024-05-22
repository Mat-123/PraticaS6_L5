<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function index(Request $request)
    {

        $films = Film::all();


        $films = Film::select()->paginate(4);

        return view('films.index', compact('films'));
    }

    public function show($id)
    {
        $film = Film::findOrFail($id);

        return view('films.show', [
            'film' => $film
        ]);
    }

    public function create(Request $request)
    {
        return view('films.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $newFilm = new Film();
        $newFilm->title = $data['title'];
        $newFilm->director = $data['director'];
        $newFilm->description = $data['description'];
        $newFilm->price = $data['price'];
        $newFilm->img = $data['img'];
        $newFilm->user_id = $request->user()->id;
        $newFilm->save();

        return redirect()->route('films.show', ['id' => $newFilm->id])->with('creation_success', $newFilm);
    }

    public function edit($id)
    {
        $film = Film::findOrFail($id);

        if (Auth::user()->id !== $film->user_id) {
            return redirect()->route('films.index')->with('no_permission', $film);
        }

        return view('films.edit', compact('film'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $film = Film::findOrFail($id);

        if ($request->user()->id !== $film->user_id) abort(401);

        $film->title = $data['title'];
        $film->director = $data['director'];
        $film->description = $data['description'];
        $film->price = $data['price'];
        $film->img = $data['img'];
        $film->update();

        return redirect()->route('films.index')->with('update_success', $film);
    }

    public function destroy(Request $request, $id)
    {
        $film = Film::findOrFail($id);
        if (Auth::user()->id !== $film->user_id) abort(401);
        $film->delete();


        return redirect()->route('films.index')->with('operation_success', $film);
    }

    public function list()
    {
        $films = Film::all();

        return response()->json([
            'success' => true,
            'data'  => $films
        ]);
    }
}
