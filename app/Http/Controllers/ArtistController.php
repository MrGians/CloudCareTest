<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->validated();
        $data = $request->validate([
            'stage_name' => ['required', 'string', 'max:100'],
            'birthday' => ['required', 'string', 'date'],
            'genre' => ['required', 'string', Rule::in(['Male', 'Female', 'Other'])],
        ]);

        // Create Artist
        $artist = new Artist;
        $artist->fill($data);
        $artist->save();
        
        return redirect()->route('artists.show', compact('artist'))
        ->with('message', 'The new artist has been successfully created!')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        return view('artists.show', compact('artist'));
    }
}
