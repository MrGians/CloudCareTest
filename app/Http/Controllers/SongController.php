<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateSongRequest;
use App\Models\Artist;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderBy('title', 'ASC')->get();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $song = new Song;
        $artists = Artist::all();

        if ($artists->isEmpty()) {
            return redirect()->route('artists.create')
            ->with('message', 'Access denied. To be able to register a new song you must have registered at least one Artist.')
            ->with('type', 'danger');
        }

        return view('songs.create', compact('song', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ValidateSongRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidateSongRequest $request)
    {
        $data = $request->validated();

        // Create Song
        $song = new Song;
        $song->fill($data);
        $song->save();
        
        if (array_key_exists('artists', $data)) $song->artists()->sync($data['artists']);
        
        return redirect()->route('songs.index')
        ->with('message', 'The new song has been successfully created!')->with('type', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit(Song $song)
    {
        $artists = Artist::all();
        
        $song_artists_ids = [];
        if(count($song->artists)){
            foreach($song->artists as $artist){
                $song_artists_ids[] = $artist->id;
            }
        }
        
        return view('songs.edit', compact('song', 'artists', 'song_artists_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\ValidateSongRequest  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(ValidateSongRequest $request, Song $song)
    {
        $data = $request->validated();
        
        // Update Song
        $song->update($data);
        $song->save();
        
        if (array_key_exists('artists', $data)) $song->artists()->sync($data['artists']);
        
        return redirect()->route('songs.index')
        ->with('message', 'The song has been successfully updated!')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();

        return redirect()->route('songs.index')
        ->with('message', 'The song has been successfully deleted!')->with('type', 'success');
    }
}
