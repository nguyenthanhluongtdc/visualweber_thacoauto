{!! Theme::partial('header') !!}
{!! Theme::content() !!}
{!! Theme::partial('footer') !!}

<script>
    window.trans = {!! json_encode(get_result_language_file()) !!}
</script>
