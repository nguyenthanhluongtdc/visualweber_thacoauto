{{-- <div class="container">
    <h3 class="page-intro__title">{{ $page->name }}</h3>
    {!! Theme::breadcrumb()->render() !!}
</div>
<div>
    {!! apply_filters(PAGE_FILTER_FRONT_PAGE_CONTENT, clean($page->content), $page) !!}
</div> --}}

<div class="container-remake default-page">
    <h2 class="font-pri-bold font40 color-gray title">
        {{ $page->name }}
    </h2>
    <div class="font-pri font18">
        {!! $page->content !!}
    </div>
</div>