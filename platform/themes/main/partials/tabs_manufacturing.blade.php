    

    
    <div class="tab col-xl-3 col-lg-6 col-md-6 col-6 item-right">
        @foreach($menu_nodes as $item)
            <button class="tablink font25 text-uppercase fontmb-medium" id-name="{{Illuminate\Support\Str::Slug($item->name, '')}}"
            >
            {!! $item->name !!}
        </button>
        @endforeach
    </div>

    <div class="col-xl-6 col-lg-12 col-md-12 col-12 item-top p-0">
        @foreach($menu_nodes as $item)
            @php 
                $manufacturing = get_manufacturing_by_id($item->reference_id);
            @endphp
            <div id="{{Illuminate\Support\Str::Slug($item->name, '')}}" class="tabcontents">
                <img src="{{ get_image_url($manufacturing->image) }}" alt=""
                    class="mb-2">
                <div class="content-bottom p-2">
                    <h4 class="font20 mb-2 text-uppercase fontmb-middle"> 
                        {!! $item->name !!}
                    </h4>
                    <p class="font-pri font15 mb-2 fontmb-little">
                        {!! $manufacturing->description !!}
                    </p>
                    <div class="read-more font18"><a href="">Xem chi tiết</a></div>
                </div>
            </div>
        @endforeach
    </div>

{{-- <div class="tab col-xl-3 col-lg-6 col-md-6 col-6 item-left">
    <button class="font25 text-uppercase tablink fontmb-medium" onclick="openTabs(event, 'maylanh')"
        id="defaultOpen">máy lạnh xe tải, bus</button>
    <button class="font25 text-uppercase tablink fontmb-medium"
        onclick="openTabs(event, 'dungdich')">keo & dung dịch</button>
    <button class="font25 text-uppercase tablink fontmb-medium"
        onclick="openTabs(event, 'composite')">linh kiện composite</button>
    <button class="font25 text-uppercase tablink fontmb-medium"
        onclick="openTabs(event, 'xedulich')">máy lạnh xe du lịch</button>
    <button class="font25 text-uppercase tablink fontmb-medium"
        onclick="openTabs(event, 'vooto')">thân vỏ ô tô</button>
    <button class="font25 text-uppercase tablink fontmb-medium"
        onclick="openTabs(event, 'gangtay')">găng tay</button>
</div> --}}

<script>
    $(document).ready(function(){
      
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
            // evt.currentTarget.className += " active";
        }
        // document.getElementById("defaultOpen").click();

        Array.from(document.getElementsByClassName('tablink')).forEach((ele, index)=>{
            ele.onclick = ()=> {
                openTabs(ele, ele.getAttribute('id-name'));
            }
        })

        document.getElementsByClassName('tablink')[0].click();
    })
</script>