<?php

namespace Database\Seeders;

use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $songs = config('data.artists_songs_list.songs');

        foreach($songs as $song)
        {
            $new_song = new Song;
            $new_song->title = $song['title'];
            $new_song->publication_date = $song['publication_date'];
            $new_song->save();
        }
    }
}
