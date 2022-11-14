

var $ = jQuery;

// $( window ).load(function() { {
//    $( '#home-video' )[0].play()
// } });

$(document).ready(() => {

    $('.hamburguer-menu').click(() => {
        $('.mobile-menu .modal').addClass('modal--show')
    })

    $('.modal-background').click(() => {
        $('.modal').removeClass('modal--show')
    });
    
    $('.subscription-button').click(() => {
        $('#subscription-modal').addClass('modal--show')
    })

    sliderInit();

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



function sliderInit() {
    let isDragging = false,
        startPos = 0,
        currentTranslate = 0,
        prevTranslate = 0,
        animationID,
        currentIndex = 0

    const slides = Array.from(document.querySelectorAll('.slide'));

    slides.forEach((slide, index) => {
        const slideImage = slide.querySelector('img')
        // disable default image drag
        slideImage.addEventListener('dragstart', (e) => e.preventDefault())
        // touch events
        slide.addEventListener('touchstart', touchStart(index))
        slide.addEventListener('touchend', touchEnd)
        slide.addEventListener('touchmove', touchMove)
        // mouse events
        slide.addEventListener('mousedown', touchStart(index))
        slide.addEventListener('mouseup', touchEnd)
        slide.addEventListener('mousemove', touchMove)
        slide.addEventListener('mouseleave', touchEnd)
    })

    window.addEventListener('resize', setPositionByIndex)

    window.oncontextmenu = function (event) {
        event.preventDefault()
        event.stopPropagation()
        return false
    }



function touchStart(index) {
    return function (event) {
      currentIndex = index
      startPos = getPositionX(event)
      isDragging = true
      animationID = requestAnimationFrame(animation)
      //slider.classList.add('grabbing')
    }
  }
  
  function touchMove(event) {
    if (isDragging) {
      const currentPosition = getPositionX(event)
      currentTranslate = prevTranslate + currentPosition - startPos
    }
  }

  function getPositionX(event) {
    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX
  }

  function animation() {
    setSliderPosition()
    if (isDragging) requestAnimationFrame(animation)
  }
  
  function touchEnd() {
    cancelAnimationFrame(animationID)
    isDragging = false
    setPositionByIndex()
  }

  function setPositionByIndex() {
    prevTranslate = currentTranslate
    setSliderPosition()
  }

  function setSliderPosition() {
    const currentSlide = slides[currentIndex];
    const childWidth = currentSlide.childNodes[1].offsetWidth
    const isActive = currentSlide.offsetWidth < childWidth;
    
    if(!isActive) return;

    if(currentTranslate > 0) currentTranslate = 0;

    if(currentTranslate < currentSlide.offsetWidth - childWidth) currentTranslate = currentSlide.offsetWidth - childWidth;

    currentSlide.style.transform = `translateX(${currentTranslate}px)`
  }
    
}
