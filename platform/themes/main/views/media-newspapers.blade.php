{!! do_shortcode('[filter-media][/filter-media]') !!}
<div class="list-newspapers container-remake">
    @php
        $posts = get_posts_by_category(18, 6);
    @endphp
    @if (!empty($posts))
            @foreach ($posts as $post)
            <div class="item-newspaper">
                <div class="row__top">
                    <h5 class="title font-pri-bold font30 color-gray text-uppercase">
                        <a href="">{{$post->name}}</a>
                    </h5>
                    <p class="desc font-pri color-gray font21">
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
                        <span class="name-tag font-pri-bold">Tags: </span>
                        <div class="tag-list">
                            @foreach ($post->tags as $tag)
                            <p class="tag-title font-pri font13">
                                <a href="">{{$tag->name}}</a>
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
    <div class="page-pagination">
        @if(!empty($posts))
            @includeIf("theme.main::views.components.news-pagination",['paginator'=>$posts])
        @endif

        <ul class="pagination font25 font-pri-bold">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
            <li>10</li>
            <li class="color">></li>
            <li class="color">>></li>
        </ul>
    </div>
</div>
