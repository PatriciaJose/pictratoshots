<x-app-layout>
    <div class="container mt-5 pt-5">
        <nav class="bg-light p-2" style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('gallery') }}" class="text-decoration-none">Gallery</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $album->album_name }}</li>
            </ol>
        </nav>
        <h1 class="mt-3">{{ $album->album_name }}</h1>
        <div class="row mt-3">
            @foreach ($album->images as $image)
            <div class="col-md-4">
                <img src="{{ asset('images/photoshoots/' . $image->image_path) }}" alt="{{ $image->caption }}" class="img-fluid">
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>