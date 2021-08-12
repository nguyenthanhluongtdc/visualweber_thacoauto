<div id="menu-cont-1">
    <ul class="menu-ul">
        @foreach ($menu_nodes as $key => $row)
            <li class="nav-item {!!($row->has_child)?'sub-menu':''!!} font18"> 
                <a href="{!!$row->url!!}" title="{{!!$row->title!!}}">
                    {!! $row->title !!}
                </a>
                @if ($row->has_child)
                    <input type="checkbox" id="menu-{!!$key!!}"/>
                    <div id="menu-cont-2">
                        <ul class="menu-ul">
                            <label class="menu-label" for="menu-{!!$key!!}">{!! $row->title !!}</label>
                            @forelse ($row->child as $key => $child)
                                <li class="nav-item">
                                    <a href="{!!@$child->url!!}" title="{!!@$child->title!!}">
                                        {!! @$child->title !!}
                                    </a>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                @endif
            </li>
        @endforeach
    </ul>
</div>        

<script>
    // $(document).ready(function() {
    //     $(document).on('click', function(){
    //         $('#top-nav').trigger('click');
    //         console.log('sdf')
    //     });
    //     $('#ad_transa, #transa_noua').on('click', function(e){
    //         e.stopPropagation();
    //     });
    // })
</script>