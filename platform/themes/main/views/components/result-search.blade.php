
@forelse($data as $post)
    <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000"
        data-aos-easing="ease-in-out">
        <div class="col-lg-3 col-md-5 result-img">
            <a class="image h-100" href="#" title="">
                <img src="{{ Storage::disk('public')->exists($post->image) ? get_image_url($post->image) : RvMedia::getDefaultImage() }}" alt="img-detail"
                    class="w-100 h-100 object-fit-cover">
            </a>
        </div>
        <div class="col-lg-9 col-md-7 result-content">
            <div class="content">
                <a href="#">
                    <h3 class="font-pri-bold font30  color-gray">
                        {!! $post->name !!}
                    </h3>
                </a>
                <p class="font-pri my-3 font15">
                    {!! $post->description !!}
                </p>
                <p class="font-pri date font15">
                    {{$post->created_at->format('d-m-y')}}
                </p>
            </div>
        </div>
    </div>

    @empty

@endforelse