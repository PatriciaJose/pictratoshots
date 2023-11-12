<x-app-layout>
    <div class="container mt-5">
        <section class="gallery">
            <div class="row">
                <small class="text-center">GALLERY</small>
                <h1 class="text-center">Our Works</h1>
                <div class="gallery-filter">
                    <span class="filter-item active" data-filter="all">All</span>
                    @foreach ($photoshootTypes as $photoshootType)
                    <span class="filter-item" data-filter="{{ $photoshootType->type_name }}">{{ $photoshootType->type_name }}</span>
                    @endforeach
                </div>
            </div>

            <div class="row">
                @foreach ($images as $image)
                <div class="col-md-4 gallery-item all" data-category="all">
                    <div class="gallery-item-inner">
                        <img src="{{ asset('storage/images/photoshoots/'.$image->image_path.'') }}" alt="{{ $image->image_name }}" width="100%" height="auto">
                    </div>
                </div>
                @endforeach
            </div>

            @foreach ($photoshootTypes as $photoshootType)
            <div class="row">
                @foreach ($albums as $album)
                @if ($album->photoshootType->id === $photoshootType->id)
                <div class="col-md-4 gallery-item {{ $photoshootType->type_name }} hide" data-category="{{ $photoshootType->type_name }}">
                    <div class="gallery-item-inner">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <h2>{{ $album->album_name }}</h2>
                                    <p>{{ $album->created_at }}</p>
                                </div>
                                <div class="justify-content-center">
                                    <a href="{{ route('images', ['id' => $album->id]) }}" class="btn btn-primary">View Album</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach
        </section>
        <script>
            $(document).ready(function() {
                $('.filter-item').click(function() {
                    $('.filter-item').removeClass('active');

                    $(this).addClass('active');

                    var filterValue = $(this).data('filter');

                    $('.gallery-item').hide();
                    $('.gallery-item[data-category="' + filterValue + '"]').show();
                });
            });
        </script>
    </div>
</x-app-layout>