</div>


<footer class="footer" id="footer">
    <div class="footer-wrap container-remake">
        <div class="footer-left">
            <a href="{{ route('public.single') }}" class="logo-bottom">
                <img src="{{ Theme::asset()->url('images/main/logobt.png') }}" alt="THACO AUTO" height="34">
            </a>
            <div class="thaco-contact">
                <h1 class="font-pri-bold color-pri font32">CÔNG TY TNHH THACO AUTO</h1>
                <p class="address font-pri font18">
                    <span>Địa chỉ:</span>
                    <span>KCN Cơ khí ô tô Chu Lai Trường Hải, Xã Tam Hiệp, Huyện Núi Thành, Tỉnh Quảng Nam ( Tìm vị trí )</span>
                </p>
                <p class="tax-code font-pri font18  ">
                    <span>Mã số thuế:</span>
                    <span> 4001221658</span>
                </p>
            </div>

            <div class="footer-left-bottom">
                <div class="img-bct">
                    <img src="{{ Theme::asset()->url('images/main/bct.png') }}" alt="Bộ công thương">
                </div>
                <ul class="list-media">
                    <li><a href=""><img src="{{ Theme::asset()->url('images/main/iconfb.png') }}" alt="facebook"></a></li>
                    <li><a href=""><img src="{{ Theme::asset()->url('images/main/iconin.png') }}" alt="in"></a></li>
                    <li><a href=""><img src="{{ Theme::asset()->url('images/main/iconyt.png') }}" alt="youtube"></a></li>
                </ul>
            </div>
        </div>
        <div class="footer-right">
                <div class="item">
                    <p class="title font-pri-bold font30 color-gray">Giới thiệu</p>
                    <ul class="font-pri font18">
                        <li><a href="" class="color-gray">Lĩnh vực hoạt động</a></li>
                        <li><a href="" class="color-gray">Sản phẩm dịch vụ</a></li>
                        <li><a href="" class="color-gray">Công ty tỉnh thành</a></li>
                    </ul>
                </div>
                <div class="item">
                    <p class="title font-pri-bold font30 color-gray">Truyền thông</p>
                    <ul class="font-pri font18">
                        <li><a href="" class="color-gray">Tin tức hoạt động</a></li>
                        <li><a href="" class="color-gray">Hoạt động cộng đồng</a></li>
                        <li><a href="" class="color-gray">Bản tin Thaco Auto</a></li>
                    </ul>
                </div>
                <div class="item">
                    <p class="title font-pri-bold font30 color-gray">Liên hệ</p>
                    <ul class="font-pri font18">
                        <li class="color-gray"><span>Hotline: </span><span><a href="tel:0980909789" class="color-gray">0980909789</a></span></li>
                        <li class="color-gray"><span>Email: </span><span><a href="mailto:Thacoauto@gmail.com" class="color-gray">Thacoauto@gmail.com</a></span></li>
                        <li class="color-gray"><span>Fax: </span><span><a href="tel:0980909789" class="color-gray">0980909789</a></span></li>
                    </ul>
                </div>
                <div class="item">
                    <p class="title font-pri-bold font30 color-gray">Chính sách bảo mật thông tin</p>
                    <ul class="font-pri font18">
                        <li><a href="" class="color-gray">Chính sách bảo mật</a></li>
                        <li><a href="" class="color-gray">Các điều khoản và điều kiện</a></li>
                    </ul>
                </div>
        </div>
    </div>
</footer>
<div class="action-button">
    <div class="item-button">
        <a href="#"><img src="{{ Theme::asset()->url('images/main/phone.png') }}" alt="phone"></a>
    </div>
    <div class="item-button">
        <a href="#"><img src="{{ Theme::asset()->url('images/main/mess.png') }}" alt="phone"></a>
    </div>
</div>
<div class="end-web" style="background: url('{{ Theme::asset()->url('images/main/end.jpg') }}')">
    <div class="container-remake">
        <p class="font-pri color-white font25">Giấy phép kinh doanh: 4001221658</p>
    </div>
</div>
<button  id="myBtn" title="Go to top"><img src="{{ Theme::asset()->url('images/main/btt.png') }}" alt="youtube"></button>

<!-- JS Library-->
{!! Theme::footer() !!}

@if (theme_option('facebook_comment_enabled_in_post', 'yes') == 'yes' || (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id')))
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml            : true,
                version          : 'v7.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    @if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
        <div class="fb-customerchat"
             attribution="install_email"
             page_id="{{ theme_option('facebook_page_id') }}"
             theme_color="{{ theme_option('primary_color', '#ff2b4a') }}">
        </div>
    @endif
@endif



<script>
    $('.slider-main-carousel').owlCarousel({
    smartSpeed: 1000,
    loop: true,
    autoplay: true,
    dots: true,
    nav: false,
    animateIn: 'fadeIn',
    animateOut: 'fadeOut',
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});



$(function () {
    x=8;
    $('#myList li').slice(0, 8).show();
    $('#loadMore').on('click', function (e) {
        e.preventDefault();
        x = x+4;
        $('#myList li').slice(0, x).slideDown();
    });
});


</script>

<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    $('#myBtn').click(function() {
        $("html, body").animate({scrollTop: 0}, 600);
    });
    </script>
</body>
</html>
