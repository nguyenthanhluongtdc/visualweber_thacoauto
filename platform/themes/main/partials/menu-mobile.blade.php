{{-- <ul {!! clean($options) !!} >
	@foreach ($menu_nodes as $key => $row)
		<li class="@if ($row->has_child) has-submenu @endif {{ $row->css_class }}">
			@if (!$row->has_child)
				<a href="{{ $row->url }}">
					<span class="font20 font-pri-bold text-uppercase">{{ $row->title }}</span>
				</a>
			@else
			<a data-submenu="{{ 'menu_' . $row->id }}" class="d-flex justify-content-between">
				<span class="font20 font-pri-bold text-uppercase" href="{{ $row->url }}">{{ $row->title }}</span>
				<span class="arrow"></span>
			</a>

			<div id="{{ 'menu_' . $row->id }}" class="submenu">
				<div class="submenu-header">
					<a href="#" data-submenu-close="{{ 'menu_' . $row->id }}">
						<span class="font20 font-pri-bold text-uppercase">{{ __("Quay về") }}</span>
					</a>
				</div>
				{!!
					Menu::generateMenu([
						'menu'       => $menu,
						'menu_nodes' => $row->child,
						'view'       => 'menu-mobile',
					])
				!!}
			</div>
			@endif
		</li>
	@endforeach
</ul> --}}

<ul {!! clean($options) !!} >
	@foreach ($menu_nodes as $key => $row)
	<li class="@if ($row->has_child) has-submenu @endif {{ $row->css_class }}">
		@if (!$row->has_child)
	  		<a href="{{ $row->url }}" class="font20 font-pri-bold text-uppercase">{{ $row->title }}</a>
		@else
			<a href="#" class="font20 font-pri-bold text-uppercase" data-submenu="{{ 'menu_' . $row->id }}">{{ $row->title }}</a>

			<div id="{{ 'menu_' . $row->id }}" class="submenu">
				<div class="submenu-header">
					<a href="#" class="font20 font-pri-bold text-uppercase" data-submenu-close="{{ 'menu_' . $row->id }}">{{ __("Quay lại") }}</a>
				</div>

				<a class="font20 font-pri-bold text-uppercase submenu-link" href="{{ $row->url }}">{{ $row->title }}</a>
				{!!
					Menu::generateMenu([
						'menu'       => $menu,
						'menu_nodes' => $row->child,
						'view'       => 'menu-mobile',
					])
				!!}
	  		</div>
		@endif
	</li>
	@endforeach
</ul>