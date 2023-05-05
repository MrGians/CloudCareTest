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
    {{-- TODO Song Artists --}}
    <div class="mb-4 row">
        
    </div>
    <div class="mb-4 row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">{{ $song->exists ? 'Update' : 'Save' }}</button>
        </div>
    </div>
  </form>