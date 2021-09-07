
@forelse($posts as $post)

<div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000"
data-aos-easing="ease-in-out">
<div class="col-lg-3 col-md-5 result-img">
    <a class="image h-100" href="{{$post->url}}" title="">
        <img loading="lazy" src="{{ Storage::disk('public')->exists($post['image']) ? get_image_url($post['image']) : RvMedia::getDefaultImage() }}" alt="img-detail"
            class="w-100 h-100 object-fit-cover">
    </a>
</div>
<div class="col-lg-9 col-md-7 result-content">
    <div class="content">
        <a href="{{$post->url}}">
            <h3 class="font-pri-bold font30 fontmb-middle color-gray">
                {!! $post->name !!}
            </h3>
        </a>
        <a href="{{$post->url}}">
        <p class="font-pri my-3 font20 fontmb-small text-dark desc">
            {!! empty($post->description) ? $post->name : $post->description !!}
        </p>
        </a>
        <p class="font-pri date font15 fontmb-little">
            {{$post->created_at->format('d-m-y')}}
        </p>
    </div>
</div>
</div>

@empty

<p class="text-center font25">
    {!! __('Không tìm thấy kết quả nào') !!}
</p>

@endforelse

@isset($posts)
<div class="container-remake">
    {{ $posts->withQueryString()->links('vendor.pagination.custom') }}
</div>
@endisset

<style>
    .search-result:first-child {
        margin-top: 3rem;
    }
</style>