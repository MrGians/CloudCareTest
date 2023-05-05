@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <header class="d-flex justify-content-between align-items-center mb-5">
    <h1>Songs Page</h1>
    <a href="{{ route('songs.create') }}" class="btn btn-success">
      <i class="fa-solid fa-plus"></i> Add New Song
    </a>
  </header>

  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Publication Date</th>
        <th scope="col" class="text-center">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($songs as $i => $song)
        <tr>
          <th scope="row">{{ $i+1 }}</th>
          <td>{{ $song->title }}</td>
          <td>{{ $song->publication_date }}</td>
          <td class="align-middle">
            <div class="w-max mx-auto">   
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
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4">
          <h3 class="text-center">No Songs have been registered yet</h3>
        </td>
      </tr>  
      @endforelse 
    </tbody>
  </table>
@endsection