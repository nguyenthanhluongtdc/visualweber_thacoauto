const Helpers = {
    handleRenderShowroom: async function(brand, category) {
        const result = $('.js-showroom-content')
        if (!result) return

        result.html('')

        Helpers.handleToggleLoading()
        const response = await $.get(window.__distribution.ajax, {
            brand, category
        })

        Helpers.handleToggleLoading(false)
        const { template } = response.data

        result.html(template)
    },
    handleClickRenderShowroom: function() {
        const item = $('.js-showroom-showlist')

        if(!item) return

        $('.js-showroom-showlist').click(function(e) {
            e.preventDefault()
            Helpers.handleRenderShowroom(item.data('brand-id'), item.data('category-id'))
        })
    },
    handleToggleLoading: function(enable = true) {
        const loading = $('.js-loading')
        if(!loading) return

        enable ? loading.removeClass('d-none') : loading.addClass('d-none')
    }
}

$(document).ready(function() {
    Helpers.handleRenderShowroom()
    Helpers.handleClickRenderShowroom()
})