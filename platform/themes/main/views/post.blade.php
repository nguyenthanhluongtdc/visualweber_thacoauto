
@if($post->categories->first()->id==20 || $post->categories->first()->id==22)
{!!render_media_gallery($post)!!}
@else
{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="post-container container-remake Lineheight-Regular">
    <div class="post-primary">
        <h2 class="title font-pri-bold font50 p-0">
            {{ $post->name }}
        </h2>
        <div class="post-author-wrap">
            <div class="left d-flex align-content-center">
                <ul class="p-0 statistical font18 MyriadPro-Regular mb-0 mt-2">
                    @if(!empty(get_field($post, 'author')))
                    <li><span class="author font20 font-mi-bold">{{ get_field($post, 'author') }}</span></li>
                    @endif
                    <li><span class="icon"><i class="far fa-clock"></i></span>{{ $post->created_at->format('d/m/Y') }}</li>
                    <li><span>Bình luận: </span><span>23</span></li>
                    <li><span>Lượt xem: </span><span>999</span></li>
                </ul>
            </div>
            <div class="like-share desktop">
                <div class="fb-like" data-href="{{ Request::url() }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
            </div>
        </div>
        <div class="desc font25 MyriadPro-BoldCond px-0 mx-0 w-100 my-5 text-center">
            {{$post->description}}
        </div>
        <div class="post__content font-pri font18">
            @if (defined('GALLERY_MODULE_SCREEN_NAME') && !empty($galleries = gallery_meta_data($post)))
                {!! render_object_gallery($galleries, ($post->first_category ? $post->first_category->name : __('Uncategorized'))) !!}
            @endif
            {!! $post->content !!}
            <div class="fb-like fb-like-bottom" data-href="{{ Request::url() }}" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
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
        {{-- {!! apply_filters(BASE_FILTER_PUBLIC_COMMENT_AREA, Theme::partial('comments')) !!} --}}
        <div class="comment-post">
            <div class="top-comment">
                <div class="left">
                    <img src="{{ Theme::asset()->url('images/media/avatar.png') }}" alt="">
                </div>
                <div class="right font18 font-pri">
                    Vui lòng điền <span class="font-mi-bold">Email</span> trước khi bình luận
                </div>
            </div>
            <div class="list-comment">
                <div class="item-comment">
                    <div class="left">
                        <img src="{{ Theme::asset()->url('images/media/avatar.png') }}" alt="">
                    </div>
                    <div class="right font20 font-pri">
                        <div class="name-wrap">
                            <p class="name font20 font-mi-bold color-pri">Nguyễn Văn A</p>
                            <p class="menu-name"><i class="fas fa-ellipsis-h"></i></p>
                        </div>
                       <p class="cmt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <div class="like-time">
                            <div class="like font15 font-pri"><span><i class="fas fa-thumbs-up"></i></span> 15</div>
                            <div class="time font15 font-pri"><span class="icon"><i class="far fa-clock"></i></span>12/12/2021</div>
                        </div>
                    </div>
                </div>
                <div class="item-comment">
                    <div class="left">
                        <img src="{{ Theme::asset()->url('images/media/avatar.png') }}" alt="">
                    </div>
                    <div class="right font20 font-pri">
                        <div class="name-wrap">
                            <p class="name font20 font-mi-bold color-pri">Nguyễn Văn A</p>
                            <p class="menu-name"><i class="fas fa-ellipsis-h"></i></p>
                        </div>
                       <p class="cmt">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                        <div class="like-time">
                            <div class="like font15 font-pri"><span><i class="fas fa-thumbs-up"></i></span> 15</div>
                            <div class="time font15 font-pri"><span class="icon"><i class="far fa-clock"></i></span>12/12/2021</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                                        <img src="{{ RvMedia::getImageUrl($relatedItem->image, 'post-related') }}" alt="{{ $relatedItem->name }}">
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
@endif

