{!! Theme::partial('templates.car-selection-menu', ['car' => $car]) !!}

<div class="step-first">
    {!! Theme::partial('templates.car-selection.step-first', ['car' => $car, 'request' => request()]) !!}
</div>

<script>
    window.__urlAjax = `{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.ajax.car-option')) }}`
</script>