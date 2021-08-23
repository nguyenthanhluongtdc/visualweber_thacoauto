{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="list-newspapers container-remake">
    @php
        $posts = get_posts_by_category(18, 3);
    @endphp
    @if (!empty($posts))
            @foreach ($posts as $post)
            <div class="item-newspaper">
                <div class="row__top"> 
                    <h5 class="title font-pri-bold font30 color-gray text-uppercase ">
                        <a href="">{{$post->name}}</a>
                    </h5>
                    <p class="desc font-pri color-gray font21 ">
                        {{$post->description}}
                    </p>
                </div>
                
                <div class="row__bottom">
                    <a href="#" title="" class="title-docx font-cond color-gray font24">
                        {{@get_file_name(get_field($post, 'newspaper_file'))}}
                    </a>
                    <p class="size-dowload">
                        <span class="left font-cond color-gray font24">{{@get_file_size(get_field($post, 'newspaper_file'))}}</span>
                        <span class="font-pri"><a href="{{ get_object_image(get_field($post, 'newspaper_file')) }}">DOWNLOAD</a></span>
                    </p>
                    
                    <div class="tags">
                        <div class="tag-name">
                            <span class="name-tag font-pri-bold font13">Tags: </span>
                        </div>
                       
                        <div class="tag-list">
                            @foreach ($post->tags as $tag)
                            <p class="tag-title font-pri font13 mb-3">
                                <a href="">{{$tag->name}}</a>
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    
</div>
<div class="container-remake">
    {{ $posts->links('vendor.pagination.custom') }}
</div>