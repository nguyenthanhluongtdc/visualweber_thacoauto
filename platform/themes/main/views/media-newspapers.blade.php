{!! do_shortcode('[filter-media category="' . $category->id . '"][/filter-media]') !!}
<div class="container-remake">
    <div class="list-newspapers overflow-x-hidden">
        @php
            $posts = get_posts_by_category($category->id ?? 16, 10);
        @endphp
        @if (!empty($posts))
                @foreach ($posts as $post)
                <div class="item-newspaper">
                    <div class="row__top">
                        <h5 class=" title font-pri-bold font30 color-gray text-uppercase fontmb-middle">
                            <a href="">{{$post->name}}</a>
                        </h5>
                        <p class="match desc font-pri color-gray font21 fontmb-small">
                            {{$post->description}}
                        </p>
                    </div>
    
                    <div class="row__bottom">
                        <p class=" title-docx font-cond color-gray font24 fontmb-small">
                            {{get_file_name(get_field($post, 'newspaper_file')) ? get_file_name(get_field($post, 'newspaper_file')) : 'N/A'}}
                        </p>
                        <p class="size-dowload">
                            @if(get_field($post, 'newspaper_file'))
                            <span class="left font-cond color-gray font24 fontmb-small">{{@get_file_size(get_field($post, 'newspaper_file'))}}</span>
                            <span class="font-pri fontmb-small"><a href="{{ get_image_url(get_field($post, 'newspaper_file')) }}">{{ __("Tải về") }}</a></span>
                            @else
                            <span class="left font-cond color-gray font24 fontmb-small">{{__('Không có dữ liệu để tải về')}}</span>
                            @endif
                        </p>
    
                        <div class="tags match">
                            <div class="tag-name">
                                <span class="name-tag font-pri-bold font13">{{ __("Tags") }}: </span>
                            </div>
    
                            <div class="tag-list ">
                                @foreach ($post->tags as $tag)
                                <p class="tag-title font-pri font13 mb-3 fontmb-small">
                                    <span>{{$tag->name}}</span>
                                </p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
    
    </div>
    {{ $posts->links('vendor.pagination.custom') }}
</div>

    
    