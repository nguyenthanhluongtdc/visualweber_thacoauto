@forelse ($posts as $post)
    <div class="post-new-item">
        <div class="post-thumbnail-wrap">
            <div class="post-thumbnail">
                <a href="{{ $post->url }}"><img src="{{ get_image_url($post->image) }}" alt="{{ $post->name }}"></a>
            </div>
        </div>
        <h5 class="title font-mi-bold font20">
            <a href="{{ $post->url }}">{{ $post->name }}</a>
        </h5>
    </div>
@empty
    <span class="font-pri font20 text-center">{{ __('Not found') }}</span>
@endforelse