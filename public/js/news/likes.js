$( document ).ready(function() {
    $( ".like-button" ).click(function(event) {
        $button = $(event.target)
            jQuery.ajax({
                url: Routing.generate('like_news', {'id':$button.data('id')}),
                success: function (result) {
                    if (result === true) {
                        let $spanToInc = $('span#'+$button.data('id'));
                        let value = parseInt($spanToInc.text(), 10) + 1;
                        $spanToInc.text(value);
                        $button.addClass('btn-success');
                        $('#dislike[data-id="'+ $button.data('id') +'"]').removeClass('btn-danger');
                    }
                },
                async: false
            });
    });

    $( ".dislike-button" ).click(function(event) {
        $button = $(event.target);
        jQuery.ajax({
            url: Routing.generate('dislike_news', {'id':$button.data('id')}),
            success: function (result) {
                if (result === true) {
                    let $spanToDec = $('span#'+$button.data('id'));
                    let value = parseInt($spanToDec.text(), 10) - 1;
                    $spanToDec.text(value);
                    $button.addClass('btn-danger');
                    $('#like[data-id="'+ $button.data('id') +'"]').removeClass('btn-success').addClass('btn-secondary');
                }
            },
            async: false
        });
    });
});