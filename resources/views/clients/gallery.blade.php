<x-app-layout>
    <div class="container mt-5">
        <section class="gallery">
            <div class="row">
                <h5 class="text-center">Gallery</h5>
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
                    <div class="col-md-4"> 
                        <div class="gallery-item all">
                            <div class="gallery-item-inner">
                                <img src="{{ asset('images/photoshoots/'.$image->image_path.'') }}" alt="{{ $image->image_name }}" width="100%" height="auto">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @foreach ($photoshootTypes as $photoshootType)
                <div class="row">
                    @foreach ($albums as $album)
                        @if ($album->photoshootType->id === $photoshootType->id)
                            <div class="col-md-4"> 
                                <div class="gallery-item {{ $photoshootType->type_name }} hide">
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
                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </section>
    </div>
    <script>
    const filterContainer = document.querySelector(".gallery-filter");
    const galleryItems = document.querySelectorAll(".gallery-item");

    filterContainer.addEventListener("click", (event) => {
        if (event.target.classList.contains("filter-item")) {
            filterContainer.querySelector(".active").classList.remove("active");
            event.target.classList.add("active");
            const filterValue = event.target.getAttribute("data-filter");

            galleryItems.forEach((item) => {
                item.classList.add("hide");
            });

            if (filterValue === "all") {
                galleryItems.forEach((item) => {
                    item.classList.remove("hide");
                });
            } else {
                document.querySelectorAll(".gallery-item." + filterValue).forEach((item) => {
                    item.classList.remove("hide");
                });
            }
        }
    });
</script>

</x-app-layout>
