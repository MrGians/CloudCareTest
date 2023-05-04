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
              {{-- 
              <h5 class="card-title">Artist Songs</h5>
              <hr class="border @if($artist->genre === 'Male') border-primary @elseif($artist->genre === 'Female') border-danger @else border-secondary @endif border-2 opacity-50">
               --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection