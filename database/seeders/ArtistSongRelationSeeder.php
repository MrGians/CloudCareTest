<?php

namespace Database\Seeders;

use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArtistSongRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artists_ids = Artist::pluck('id')->toArray();
        $songs = Song::all();

        foreach($songs as $song){
            $artists_ids_to_sync = [];
            do {
                $artist_id = $artists_ids[rand(0, count($artists_ids) - 1)];
                if(!in_array($artist_id, $artists_ids_to_sync)) $artists_ids_to_sync[] = $artist_id;
                
            } while(rand(0,1) || count($artists_ids_to_sync) > 3);

            $song->artists()->attach($artists_ids_to_sync);
        };
    }
}
