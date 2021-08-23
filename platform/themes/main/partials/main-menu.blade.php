<ul {!! clean($options) !!} class="list-menu  font-pri-bold font18">
    @foreach ($menu_nodes as $key => $row)
        <li class="menu-item menu-big @if ($row->has_child) menu-item-has-children @endif {{ $row->css_class }} @if ($row->active) active @endif font-pri-bold font18">
            <a href="{{ $row->url }}" target="{{ $row->target }}" class="menu-link {{ $row->has_child ? 'arrow' : '' }}">
                @if ($row->icon_font)<i class='{{ trim($row->icon_font) }}'></i> @endif{{ $row->title }}
            </a>
            @if ($row->has_child)
                {!!
                    Menu::generateMenu([
                        'menu'       => $menu,
                        'menu_nodes' => $row->child,
                        'view'       => 'main-menu',
                        'options'    => ['class' => 'sub-menu menu-sub-item sub-menu-drop'],
                    ])
                !!}
            @endif
        </li>
    @endforeach
</ul>
