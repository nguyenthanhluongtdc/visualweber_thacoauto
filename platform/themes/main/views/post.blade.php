{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="post-container container-remake">
    <div class="post-primary">
        <h2 class="title font-pri-bold font50">
            {{ $post->name }}
        </h2>
        <div class="post-author-wrap">
            <div class="left">
                <p class="author font20 font-mi-bold">{{ $post->author->name }}</p>
                <ul class="statistical font20 font-pri">
                    <li><span class="icon"><i class="far fa-clock"></i></span>{{ $post->created_at->format('d/m/Y') }}</li>
                    <li><span>Bình luận: </span><span>23</span></li>
                    <li><span>Lượt xem: </span><span>999</span></li>
                </ul>
            </div>
            <div class="like-share">
            <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>

            </div>
        </div>
        <p class="desc font20 font-mi-bold">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem ape
        </p>
        <div class="post__content font-pri">
            @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post)))
                {!! render_object_gallery($galleries, ($post->first_category ? $post->first_category->name : __('Uncategorized'))) !!}
            @endif
            {!! clean($post->content, 'youtube') !!}
            <div class="fb-like" data-href="{{ Request::url() }}" data-layout="standard" data-action="like" data-show-faces="false" data-share="true"></div>
        </div>
        <div class="tags">
            <span class="font18 font-mi-bold">Tags: </span>
            @if (!$post->tags->isEmpty())
            <span class="post__tags font-pri font15"><i class="ion-pricetags"></i>
                @foreach ($post->tags as $tag)
                    <a href="{{ $tag->url }}">{{ $tag->name }}</a>
                @endforeach
            </span>
        @endif
        </div>
        @if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes')
        <br />
        {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!}
    @endif
    </div>

    @php $relatedPosts = get_related_posts($post->id, 12); @endphp
    
            @if ($relatedPosts->count())
            <div class="post-relate">
                    <h2 class="font-pri-bold font50">Tin liên quan</h2>
                    <div class="post-relate-carousel owl-carousel">
                        @foreach ($relatedPosts as $relatedItem)
                            <div class="post-relate-item">
                                
                               
                                <div class="post-thumbnail">
                                    <a href="{{ $relatedItem->url }}" class="post__overlay">
                                        <img src="{{ RvMedia::getImageUrl($relatedItem->image) }}" alt="{{ $relatedItem->name }}">
                                    </a>
                                </div>
                                <p class="city-day font-pri font15">
                                    <span class="city">Hà Nội</span>
                                    <span class="time"> {{ $relatedItem->created_at->format('d/m/Y') }}</span>      
                                </p>
                                <header class="post__header">
                                    <h5 class="font-helve font30 font-pri-bold"><a href="{{ $relatedItem->url }}" class="post__title"> {{ $relatedItem->name }}</a></h5>
                                    
                                    <div class="post__desc font20 font-pri">{{ $relatedItem->description }}</div>
                                </header>
                            </div>
                        @endforeach
                    </div>
            </div>
            @endif
</div>


