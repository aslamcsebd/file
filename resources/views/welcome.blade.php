@extends('layouts.app2')

@section('content')
    <div class="container-fluid pt-4 welcome">
        <div class="row row-cols-5">
            @foreach ($files as $item)
                <div class="col">
                    <div class="card">
                        <a href="{{ $item->file }}" target="_blank" class="text-light">

                            @if (Str::endsWith($item->file, ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.svg', '.webp']))
                                <img src="{{ $item->file }}" alt="Image Preview" width="100%">
                            @else     
                                <div class="poster">
                                    {{ strlen($item->name) > 60 ? substr_replace($item->name, '...', 60) : $item->name }}
                                </div>                                       
                            @endif

                            <a class="download" href="{{ $item->file }}" download aria-label="Download file"
                                class="btn btn-outline-success">
                                <i class="fas fa-download"></i>
                            </a>

                            <small class="extension px-1">
                                {{ pathinfo($item->file, PATHINFO_EXTENSION) }}
                            </small>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $files->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
