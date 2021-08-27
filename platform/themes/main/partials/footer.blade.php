</div>


<footer class="footer" id="footer">
    <div class="footer-wrap container-remake">
        <div class="footer-left">
            <a href="{{ route('public.single') }}" class="logo-bottom">
                <img loading="lazy" src="{{ get_image_url(theme_option('logo_footer')) }}" alt="{!! __('THACO AUTO') !!}" height="34">
            </a>
            <div class="thaco-contact">
                <h2 class="name-company font-pri-bold color-pri font32">{!! theme_option('name-company') !!}</h2>
                <p class="address font-pri font18">
                    <span>{{__('Address')}}:</span>
                    <span>{!! theme_option('address-company') !!} <a href="{!! theme_option('map-company') !!}" target="_blank">( {{__("Find location") }} )</a></span>
                </p>
                <p class="tax-code font-pri font18">
                    <span>{{__('Tax Code')}}:</span>
                    <span> {!! theme_option('tax-code-company') !!}</span>
                </p>
            </div>

            <div class="footer-left-bottom">
                <a class="img-bct d-inline-block" href="{{theme_option('link_bct')}}" title="">
                    <img loading="lazy" src="{{ get_image_url(theme_option('logo_bct')) }}" alt="{!! __('Bộ công thương') !!}">
                </a>
                <ul class="list-media">
                    <li>
                        <a href="{{ theme_option('facebook') }}" target="_blank">
                            <img loading="lazy" src="{{ get_image_url(theme_option('facebook_icon')) }}" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a href="{{ theme_option('linkedin') }}" target="_blank">
                            <img loading="lazy" src="{{ get_image_url(theme_option('linkedin_icon')) }}" alt="in">
                        </a>
                    </li>
                    <li>
                        <a href="{{ theme_option('youtube') }}" target="_blank">
                            <img loading="lazy" src="{{ get_image_url(theme_option('youtube_icon')) }}" alt="youtube">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer-right">
                <div class="item">
                    <h2 class="title font-pri-bold font30 color-gray fontmb-medium" id="menu-footer">{{__('Introduce')}}</h2>
                    {!! dynamic_sidebar('footer_introduce') !!}
                </div>
                <div class="item">
                    <p class="title font-pri-bold font30 color-gray fontmb-medium" id="menu-footer">{{__('The media')}}</p>
                        {!! dynamic_sidebar('footer_media') !!}
                        {{-- <li><a href="" class="color-gray">Tin tức hoạt động</a></li>
                        <li><a href="" class="color-gray">Hoạt động cộng đồng</a></li>
                        <li><a href="" class="color-gray">Bản tin Thaco Auto</a></li> --}}
                </div>
                <div class="item">
                    <h2 class="title font-pri-bold font30 color-gray fontmb-medium" id="menu-footer">{{__('Contact')}}</h2>
                    <ul class="font-pri font18 list-link">
                        <li class="color-gray"><span>{{ __("Hotline") }}: </span><span><a href="tel:{{ theme_option('hotline-contact') }}" class="color-gray">{{ theme_option('hotline-contact') }}</a></span></li>
                        <li class="color-gray"><span>{{ __("Email") }}: </span><span><a href="mailto:{{ theme_option('email-contact') }}" class="color-gray">{{ theme_option('email-contact') }}</a></span></li>
                        <li class="color-gray"><span>{{ __("Fax") }}: </span><span><a href="tel:{{ theme_option('fax-contact') }}" class="color-gray">{{ theme_option('fax-contact') }}</a></span></li>
                    </ul>
                </div>
                <div class="item">
                    <h2 class="title font-pri-bold font30 color-gray fontmb-medium" id="menu-footer">{{__('information privacy policy')}}</h2>
                    {!! dynamic_sidebar('footer_policy') !!}
                </div>

                <div class="item list-media-mobile font-pri">
                    <p>{{__('connect with us')}}</p>
                    <ul class="list-media">
                        <li><a href="{{ theme_option('facebook') }}" target="_blank"><img loading="lazy" src="{{ Theme::asset()->url('images/main/iconfb.png') }}" alt="facebook"></a></li>
                        <li><a href="{{ theme_option('linkedin') }}" target="_blank"><img loading="lazy" src="{{ Theme::asset()->url('images/main/iconin.png') }}" alt="in"></a></li>
                        <li><a href="{{ theme_option('youtube') }}" target="_blank"><img loading="lazy" src="{{ Theme::asset()->url('images/main/iconyt.png') }}" alt="youtube"></a></li>
                    </ul>
                    <div class="img-bct-mobile">
                        <a href="{{theme_option('link_bct')}}" title="">
                            <img loading="lazy" src="{{ get_image_url(theme_option('logo_bct')) }}" alt="{!! __('Bộ công thương') !!}">
                        </a>
                    </div>
                </div>
        </div>
    </div>
</footer>
<div class="action-button">
    <div class="item-button">
        <a href="tel:{{ theme_option('hotline-contact') }}"><img loading="lazy" src="{{ Theme::asset()->url('images/main/phone.png') }}" alt="phone"></a>
    </div>
    <div class="item-button ">
        <button class="fb-customerchat messenger"><img loading="lazy" src="{{ Theme::asset()->url('images/main/mess.png') }}" alt="Messenger"></button>
    </div>
</div>
<div class="end-web" style="background: url('{{ Theme::asset()->url('images/main/end.jpg') }}')">
    <div class="container-remake">
        <p class="font-pri color-white font20">{{__('business license')}}: {!! theme_option('tax-code-company') !!}</p>
    </div>
</div>
<button  id="myBtn" title="Go to top"><img loading="lazy" src="{{ Theme::asset()->url('images/main/btt.png') }}" alt="youtube"></button>

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
        }(document, 'script', 'facebook-jssdk'));

        let buttonMes = $('.messenger');
        buttonMes.on('click', function(e) {
            FB.CustomerChat.show();
        });

        </script>

    @if (theme_option('facebook_chat_enabled', 'yes') == 'yes' && theme_option('facebook_page_id'))
        <div class="fb-customerchat"
             attribution="install_email"
             page_id="{{ theme_option('facebook_page_id') }}"
             theme_color="{{ theme_option('primary_color', '#01498b') }}"
             greeting_dialog_display="fade"
             greeting_dialog_delay="10">
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
