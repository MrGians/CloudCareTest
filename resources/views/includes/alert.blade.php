{{-- Alert --}}
@if (session('message'))
    <div class="alert alert-{{ session('type') ?? info }} alert-dismissible fade show" role="alert">
      <strong>{{ session('message') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif