<ul {!! clean($options) !!} class="list-menu  font-pri-bold font18">
    @foreach ($menu_nodes as $key => $row)
        <li class="menu-item menu-big @if ($row->has_child) menu-item-has-children @endif {{ $row->css_class }} @if ($row->active) active @endif font-pri-bold font18">
            <a href="{{ $row->url }}" target="{{ $row->target }}" class="menu-link">
                @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
                {{-- @if ($row->has_child) <span class="toggle-icon"><i class="fa fa-angle-down"></i></span>@endif --}}
            </a>
            @if ($row->has_child)
            <ul class="sub-menu-drop">
                <div class="fixed"></div>
                @forelse ($row->child as $key => $child)
                    <li class="item-menu-drop @if (!blank(@$child->url)) {{ Language::getLocalizedURL(app()->getLocale(),$child->url) == Request::url() ? 'active child_menu' : ''}} @endif">
                        <a class="purple child" href="{{ blank($child->url) ? 'javascript:;' : Language::getLocalizedURL(app()->getLocale(),$child->url) }}" target="{{ @$child->target }}">
                            <i class='d-none d-md-block {{ trim(@$child->icon_font) }}'></i> <span>{{ @$child->title }}</span>
                        </a>

                        @if ($child->has_child)
                        <ul class="sub-menu-3">
                            <div class="fixed"></div>
                            @forelse ($child->child as $key => $grandChild)
                                <li class="item-menu-drop-3 @if (!blank(@$grandChild->url)) {{ Language::getLocalizedURL(app()->getLocale(),$grandChild->url) == Request::url() ? 'active child_menu' : ''}} @endif">
                                    <a class="purple child-3" href="{{ blank($grandChild->url) ? 'javascript:;' : Language::getLocalizedURL(app()->getLocale(),$grandChild->url) }}" target="{{ @$grandChild->target }}">
                                        <i class='d-none d-md-block {{ trim(@$grandChild->icon_font) }}'></i> <span>{{ @$grandChild->title }}</span>
                                    </a>
                                </li>
                                @empty  
                            @endforelse
                        </ul>
                        @endif
                    </li>
                @empty
                @endforelse
            </ul>
                {{-- {!!
                    Menu::generateMenu([
                        'menu'       => $menu,
                        'menu_nodes' => $row->child,
                        'view'       => 'main-menu',
                        'options'    => ['class' => 'sub-menu menu-sub-item'],
                    ])
                !!} --}}
            @endif
        </li>
    @endforeach
</ul>
