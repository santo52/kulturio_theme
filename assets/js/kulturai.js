

var $ = jQuery;
$(document).ready(() => {

    $('.hamburguer-menu').click(() => {
        $('.main-menu').addClass('modal--show')
    })

    $('.modal-background').click(() => {
        $('.modal').removeClass('modal--show')
    });
    
    $('.subscription-button').click(() => {
        $('#subscription-modal').addClass('modal--show')
    })

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