
<h2 class=" mt-2 title font-pri-bold font50 fontmb-medium p-0 text-uppercase text-center fontmb-large">
    {{ $post->name }}
</h2>
<div class="gallery-detail" id="gallery">
    <div class="gallery">
        @if (!empty($galleries = gallery_meta_data($post)))
                @foreach ($galleries as $gallery)
                {{-- @dd($gallery) --}}
                <div class="gallery-pic">
                    <a href="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" data-fancybox="images" data-caption="{{Arr::get($gallery, 'description')}}">
                        <img loading="lazy" src="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" />
                    </a>
                </div>

                @endforeach
        @endif
        @if (!empty(get_field($post, 'video_gallery')))
                @foreach (get_field($post, 'video_gallery') as $gallery)
                <div class="gallery-pic">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field($gallery, 'youtube_code')}}" data-caption="{{get_sub_field($gallery, 'video_description')}}">
                        <img loading="lazy" src="http://img.youtube.com/vi/{{get_sub_field($gallery, 'youtube_code')}}/mqdefault.jpg" />
                    </a>
                </div>

                @endforeach
        @endif
</div>
<script>
    var swiper = new Swiper(".gallery-swiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
</script>
</div>