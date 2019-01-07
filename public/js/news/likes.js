$( document ).ready(function() {
    $( ".like-button" ).click(function(event) {
        $button = $(event.target)
        console.log($button.data('id'));

                jQuery.ajax({
                    url: Router.generate('like_news', {'id':1}),
                    success: function (result) {
                        console.log('ok');
                    },
                    async: false
                });
    });
});