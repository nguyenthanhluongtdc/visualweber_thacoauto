<div class="services">
    @php
        $services = get_services(true) ?? collect();
    @endphp
    <div class="container-remake">
        @forelse ($services as $service)
            {!! Theme::partial('templates/service', ['service' => $service]) !!}
        @empty
            {!! Theme::partial('templates/no-content') !!}
        @endforelse
    </div>
</div>