<?php

namespace Database\Seeders;

use App\Models\Artist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists = config('data.artists_songs_list.artists');

        foreach($artists as $artist)
        {
            $new_artist = new Artist;
            $new_artist->stage_name = $artist['stage_name'];
            $new_artist->birthday = $artist['birthday'];
            $new_artist->genre = $artist['genre'];
            $new_artist->save();
        }
    }
}
