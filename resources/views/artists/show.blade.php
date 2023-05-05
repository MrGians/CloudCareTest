@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row">
    <div class="col">
      
      <div class="card">
        <div class="card-header text-center">
          <ul class="nav nav-tabs card-header-tabs justify-content-between">
            <li class="nav-item">
              <h3 class=" nav-link active">{{ $artist->stage_name }}</h3>
            </li>
            <li class="nav-item">
              <a class="btn btn-sm btn-dark" href="{{ route('artists.index') }}">
                <i class="fa-solid fa-left-long"></i> Back to list
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="row g-0">
            <div class="col">
              <h5 class="card-title">Artist Information</h5>
              <hr class="border @if($artist->genre === 'Male') border-primary @elseif($artist->genre === 'Female') border-danger @else border-secondary @endif border-2 opacity-50">
              <p class="card-text">
                <span>Birthday:</span>
                <strong>{{ $artist->birthday }}</strong>
              </p>
              <p class="card-text">
                <span>Gender:</span>
                <strong class="badge @if($artist->genre === 'Male') bg-primary @elseif($artist->genre === 'Female') bg-danger @else bg-secondary @endif bg-opacity-50">{{ $artist->genre }}</strong>
              </p>
              <p class="card-subtitle">Biography: <small class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil in minus, deserunt ex necessitatibus atque voluptatum veniam? Magni debitis quibusdam maiores inventore iusto magnam illo odit itaque, quo labore fuga.</small></p>
              
              <h5 class="card-title mt-4">Discography</h5>
              <hr class="border @if($artist->genre === 'Male') border-primary @elseif($artist->genre === 'Female') border-danger @else border-secondary @endif border-2 opacity-50">
              <ul class="list-group">
                @forelse ($artist->songs as $song)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex flex-column justify-content-center">
                      <strong>{{ $song->title }}</strong>
                      @if(count($song->artists) > 1)
                        <small>Other Artists: 
                          @foreach ($song->artists as $song_artist)
                            @continue($artist->stage_name == $song_artist->stage_name)
                            <span class="text-muted">{{ $song_artist->stage_name }}@if($loop->last).@else, @endif</span>
                          @endforeach
                        </small>
                      @endif
                    </div>
                    <div class="w-max mx-3">   
                      <a class="btn btn-sm btn-warning me-1" href="{{ route('songs.edit', $song) }}">
                        <i class="fa-solid fa-pencil"></i>
                      </a>

                      <form action="{{ route('songs.destroy', $song) }}" method="POST" class="d-inline-block delete-form">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger me-1" type="submit">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                      </form>
                    </div>
                  </li>
                @empty
                  <li class="list-group-item">This artist has no songs yet</li>
                @endforelse
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection