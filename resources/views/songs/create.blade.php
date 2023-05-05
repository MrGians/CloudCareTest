@extends('layouts.app')

@section('content')
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header text-center">
            <ul class="nav nav-tabs card-header-tabs justify-content-between">
              <li class="nav-item">
                <span class=" nav-link active">Add New Song</span>
              </li>
              <li class="nav-item">
                <a class="btn btn-sm btn-dark" href="{{ route('songs.index') }}">
                  <i class="fa-solid fa-left-long"></i> Back to list
                </a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            @include('songs.partials.form')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection