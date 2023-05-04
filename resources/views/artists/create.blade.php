@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header text-center">
          <ul class="nav nav-tabs card-header-tabs justify-content-between">
            <li class="nav-item">
              <span class=" nav-link active">Add New Artist</span>
            </li>
            <li class="nav-item">
              <a class="btn btn-sm btn-dark" href="{{ route('artists.index') }}">
                <i class="fa-solid fa-left-long"></i> Back to list
              </a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('artists.store') }}" novalidate>
            @csrf
            {{-- Stage Name --}}
            <div class="mb-4 row">
                <label for="stage_name" class="col-md-4 col-form-label text-md-right">Stage Name</label>

                <div class="col-md-6">
                    <input id="stage_name" type="text" class="form-control @error('stage_name') is-invalid @enderror" name="stage_name" value="{{ old('stage_name') }}" required autofocus>

                    @error('stage_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- Birthday --}}
            <div class="mb-4 row">
                <label for="birthday" class="col-md-4 col-form-label text-md-right">Birthday</label>

                <div class="col-md-6">
                    <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required>

                    @error('birthday')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            {{-- Genre --}}
            <div class="mb-4 row">
                <label for="genre" class="col-md-4 col-form-label text-md-right">Genre</label>
                <div class="col-md-6">
                    <select id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ old('genre') }}" required>
                      <option @if(old('genre') == 'Male') selected @endif value="Male">Male</option>
                      <option @if(old('genre') == 'Female') selected @endif value="Female">Female</option>
                      <option @if(old('genre') == 'Other') selected @endif value="Other">Other</option>
                    </select>
                    @error('genre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-4 row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection