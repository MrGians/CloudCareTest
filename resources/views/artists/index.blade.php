@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <header class="d-flex justify-content-between align-items-center mb-5">
      <h1>Artists Page</h1>
      <a href="{{ route('artists.create') }}" class="btn btn-success">
        <i class="fa-solid fa-plus"></i> Add New Artist
      </a>
    </header>

    @if (count($artists))
      <form id="artists-form" class="row align-items-end border border-3 p-3">
        <div class="col-8">
          <label for="artist" class="form-label">Choose an Artists from the list to see his songs</label>
          <select class="form-control" id="artist" name="artist">
            @foreach ($artists as $artist)
              <option value="{{ route('artists.show', $artist) }}">{{ $artist->stage_name }}</option>
              @endforeach
          </select>
        </div>
        <div class="col-4">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
    @else
      <h2 class="text-center my-5">There are no Artists, register one to get started!</h2>  
    @endif
  </div>
@endsection