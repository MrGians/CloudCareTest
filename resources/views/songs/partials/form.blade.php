@if ($song->exists)
  <form action="{{ route('songs.update', $song) }}" enctype="multipart/form-data" method="POST" novalidate>
    @method('PUT')
@else
  <form action="{{ route('songs.store', $song) }}" enctype="multipart/form-data" method="POST" novalidate> 
@endif
    @csrf
    {{-- Title --}}
    <div class="mb-4 row">
        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

        <div class="col-md-6">
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $song->title) }}" required autofocus>

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    {{-- Publication Date --}}
    <div class="mb-4 row">
        <label for="publication_date" class="col-md-4 col-form-label text-md-right">Publication Date</label>

        <div class="col-md-6">
            <input id="publication_date" type="date" class="form-control @error('publication_date') is-invalid @enderror" name="publication_date" value="{{ old('publication_date', $song->publication_date) }}" required>

            @error('publication_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    {{-- Song Artists --}}
    <div class="mb-4 row">
      <div class="accordion col-md-10 @if(!old('artists') && $errors->any()) is-invalid @endif" id="artists-accordion">
        <div class="accordion-item">
          <h2 class="accordion-header" id="heading">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#artist-list" aria-expanded="false" aria-controls="artist-list">
              Choose one or more Artists from the list
            </button>
          </h2>
          <div id="artist-list" class="accordion-collapse collapse" aria-labelledby="heading" data-bs-parent="#artists-accordion">
            <div class="accordion-body">
              @foreach ($artists as $artist)
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="artist-{{ $artist->id }}" value="{{ $artist->id }}" name="artists[]" @checked(in_array($artist->id, old('artists', $song_artists_ids ?? [])))>
                  <label class="form-check-label" for="artist-{{ $artist->id }}">{{ $artist->stage_name }}</label>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      @error('artists')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>

    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">{{ $song->exists ? 'Update the Song' : 'Save the Song' }}</button>
        </div>
    </div>
  </form>