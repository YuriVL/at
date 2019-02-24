(function () {

    function headerStyle() {
        if ($('.menu.menu--miranda').length) {
            var mainHeader = $('.menu.menu--miranda').height();
            var windowpos = $(window).scrollTop();
            if (windowpos >= mainHeader) {
                $('.sticky-header').addClass('now-visible');
                $('.scroll-to-top').fadeIn(300);
            } else {
                $('.sticky-header').removeClass('now-visible');
                $('.scroll-to-top').fadeOut(300);
            }
        }
    }

    headerStyle();

    function parseUrl() {
        if(location.pathname.indexOf('#') >= 0){
            $('body,html').animate({scrollTop: $('#' + location.pathname.replace('/', '')).offset().top}, 800);
        }
    }

    parseUrl();

    /* init Jarallax */
    $('.jarallax').jarallax({
        speed: 0.5,
        imgWidth: 1366,
        imgHeight: 768
    });

    $('#schedule_carousel').carousel({interval:false});

    $(window).on('load', function() {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
        setTimeout(function(){
            $('<iframe>', {frameborder:"0", src: window.mapsrc}).appendTo('div.agileits-w3layouts-map');
        }, 2000);
    });


    $(window).scroll(function () {
        headerStyle();
    });
    $(document).on('click', '.menu__link', function () {
        var link = $(this).attr('href');
        link = link.replace('#', '');
        console.log(link);
        history.pushState(null, null, location.origin + '/' + link);
    })
    //Modal
    $('.button a').on('click', function () {
        window.book_date = $(this).data('book_date');
        window.book_direction = $(this).data('book_direction');
    })
    setTimeout(function () {
        $('#bookingModal').on('shown.bs.modal', function() {
            $(this).find('form').find('select[name*="direction"]').find('option').removeAttr('selected');
            $(this).find('form').find('select[name*="direction"]').find('option[value="'+window.book_direction+'"]').attr('selected', true);

            $(this).find('.krajee-datepicker').each(function () {
               // $(this).kvDatepicker("update", new Date(window.book_date.replace( /(\d{2})\/(\d{2})\/(\d{4})/, "$1/$2/$3")));
                $(this).val(window.book_date)
            });
        }) ;
    }, 200)

    //Ajax form
    $('div.book-form form').find('input[type="submit"]').on('click', function(){
        var data = $(this).parent('form').serialize();
        var input = $(this);
        input.attr('disabled', true);
        $.ajax({
            url: '/api/book',
            type: 'POST',
            data: data,
            success: function(res){
                input.parent('form').append('<div class="alert alert-success" role="alert">\n' +
                    ' Ваша заявка на бронирование принята. В ближайшее время с Вами свяжется наш диспетчер.\n' +
                    '</div>');
                input.remove();
            },
            error: function(res){
                input.parent('form').append('<div class="alert alert-danger" role="alert">\n' +
                    '  Заявка не принята! Попробуйте позже.\n' +
                    '</div>');
                input.attr('disabled', false);
                console.log(res);
            }
        });
    });
    $('div.contact-form form').find('input[type="submit"]').on('click', function(){
        var data = $(this).parent('form').serialize();
        var input = $(this);
        input.attr('disabled', true);
        $.ajax({
            url: '/api/send-message',
            type: 'POST',
            data: data,
            success: function(res){
                input.parent('form').append('<div class="alert alert-success" role="alert">\n' +
                    ' Ваше сообщение доставлено!\n' +
                    '</div>');
                input.remove();
            },
            error: function(res){
                input.parent('form').append('<div class="alert alert-danger" role="alert">\n' +
                    '  Сообщение не доставлено! Попробуйте позже.\n' +
                    '</div>');
                input.attr('disabled', false);
                console.log(res);
            }
        });
    });

})();