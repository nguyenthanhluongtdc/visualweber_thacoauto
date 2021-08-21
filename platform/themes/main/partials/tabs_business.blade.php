    

    @php 
        $count = count($menu_nodes);
    @endphp
    <div class="col-1"></div>
    @if($count > 6)
        <div class="tab col-2 item-right">
            @foreach($menu_nodes as $item)
                <button class="tablink font25 text-uppercase fontmb-medium" id-name="{{Str::Slug($item->name, '')}}"
                >
                {!! $item->name !!}
                </button>
                @break($loop->index == ceil(count($menu_nodes)/2)-1)
            @endforeach
        </div>

        @else 
        <div class="tab col-3 item-right">
            @foreach($menu_nodes as $item)
                <button class="tablink font25 text-uppercase fontmb-medium" id-name="{{Str::Slug($item->name, '')}}"
                >
                {!! $item->name !!}
                </button>
            @endforeach
        </div>
    @endif

    <div class="{{$count>6?'col-6':'col-7'}} item-top p-0">
        @foreach($menu_nodes as $item)
            @php 
                $manufacturing = get_manufacturing_by_id($item->reference_id);
            @endphp
            <div id="{{Str::Slug($item->name, '')}}" class="tabcontents">
                <img src="{{ Storage::disk('public')->exists($manufacturing->image) ? get_image_url($manufacturing->image) : RvMedia::getDefaultImage()}}" alt=""
                    class="mb-2">
                <div class="content-bottom p-2">
                    <h4 class="font20 mb-2 text-uppercase fontmb-middle"> 
                        {!! $item->name !!}
                    </h4>
                    <p class="font-pri font15 mb-2 fontmb-little">
                        {!! $manufacturing->description !!}
                    </p>
                    <div class="read-more font18"><a href="{{$manufacturing->url}}">Xem chi tiết</a></div>
                </div>
            </div>
        @endforeach
    </div>

    @if($count > 6)
        <div class="tab col-2 item-left">
            @for($i = ceil(count($menu_nodes)/2); $i < count($menu_nodes); $i++ )
                <button class="font25 text-uppercase tablink fontmb-medium" id-name="{{Str::Slug($menu_nodes[$i]->name, '')}}">
                    {!! $menu_nodes[$i]->name !!}
                </button>
            @endfor
        </div>
    @endif
    <div class="col-1"></div>

<script>
    $(document).ready(function(){
        let ele_prev = document.getElementsByClassName('tablink')[0];
      
        function openTabs(evt, tabsName) {
            var i, tabcontent, tablinks;
            
            tabcontent = document.getElementsByClassName("tabcontents");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabsName).style.display = "block";
            ele_prev.classList.remove('active');
            evt.classList.add('active');
            ele_prev = evt;
        }
        // document.getElementById("defaultOpen").click();

        Array.from(document.getElementsByClassName('tablink')).forEach((ele, index)=>{
            ele.onclick = ()=> {
                openTabs(ele, ele.getAttribute('id-name'));
            }
        })

        ele_prev.click();
    })
</script>