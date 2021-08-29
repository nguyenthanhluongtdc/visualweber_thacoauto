{!! Theme::partial('templates.car-selection-menu', ['brand' => $brand]) !!}

<div class="step-first">
    {!! Theme::partial('templates.car-selection.step-first', ['car' => $car]) !!}
</div>

{{-- <script>
    window.__request = '{!! json_encode(request()->all()) !!}'
    window.__urlAjax = '{{ Language::getLocalizedURL(Language::getCurrentLocale(), route("public.ajax.car-selection")) }}'
    window.request = function(key = null) {
        try {
            const result = JSON.parse(window.__request)
            if(!!key) {
                return result[key]
            }
            return result
        } catch (error) {
            return key ? null : []
        }
    }
    const App = {
        renderHtmlDetailCar: async function() {
            const stepFirst = $('.step-first')
            if(stepFirst) {
                const response = await $.get(window.__urlAjax, window.request())
                const { template } = response.data

                stepFirst.html(template)
            }
        }
    }

    $(document).ready(function() {
        App.renderHtmlDetailCar()
    })
</script> --}}