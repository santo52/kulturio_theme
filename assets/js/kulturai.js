

var $ = jQuery;
$(document).ready(() => {

    $('.hamburguer-menu').click(() => {
        $('.main-menu').addClass('main-menu-show')
    })

    $('.main-menu-background').click(() => {
        $('.main-menu').removeClass('main-menu-show')
    });

    


    $(document).scroll(() => onScrollHeader())
    

})



function handleClickHeaderMenu() {
    alert();
}



function onScrollHeader() {
    const $header = $('.kulturio-header');
    const headerBottomPosition = 100;
    const scrollTop = $(this).scrollTop();
    const headerIsScrolled = $header.hasClass('scrolled');

    if(scrollTop >= headerBottomPosition) {
        !headerIsScrolled && $header.addClass('scrolled');
    } else {
        $header.removeClass('scrolled');
    }
}