

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

    $(document).scroll(() => {
      onScrollHeader();
      onScrollSubscription();
    })
})



function onScrollSubscription() {
  const $introImage = $('.intro-image'); 

  if($introImage.length) {
    const $subsButtonMobile = $('.subscription-button-mobile');
    const introTop = $introImage.position().top;
    const scrollTop = $(this).scrollTop();
    if(scrollTop >= introTop) {
      $subsButtonMobile.addClass('fixed');
    } else {
      $subsButtonMobile.removeClass('fixed');
    }
  }
}



function onScrollHeader() {
    const $header = $('.kulturio-header');
    if($header.length) {
      const headerBottomPosition = 100;
      const scrollTop = $(this).scrollTop();
      const headerIsScrolled = $header.hasClass('scrolled');

      if(scrollTop >= headerBottomPosition) {
          !headerIsScrolled && $header.addClass('scrolled');
      } else {
          $header.removeClass('scrolled');
      }
    }
}


function imageSlider() {
  const slides = Array.from(document.querySelectorAll('.image-slider'));
  slides.forEach((slide, index) => {
    const images = slide.querySelectorAll('img');

    if(images.length) {

      const sizePercent = images.length > 1 ? images.length * 75 : 100;

      const slideContainer = document.createElement("div");
      slideContainer.setAttribute('class', 'slide');

      const slideContent = document.createElement("div");
      slideContent.setAttribute('class', 'slide-content');
      slideContent.style.width = sizePercent + '%';

      images.forEach((sourceImage) => {
        const imageClone = new Image();
        imageClone.src = sourceImage.src;
        slideContent.appendChild(imageClone);
        sourceImage.remove();
      });

      slideContainer.appendChild(slideContent);
      slide.appendChild(slideContainer);
    }
  })
}


function sliderInit() {
    let isDragging = false,
        startPos = 0,
        currentTranslate = 0,
        prevTranslate = 0,
        animationID,
        currentIndex = 0

    imageSlider();

    const slides = Array.from(document.querySelectorAll('.slide'));

    slides.forEach((slide, index) => {
        const slideImage = slide.querySelector('.slide-content')
        if(slideImage) {
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
        }
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
    const currentSlide = slides && slides[currentIndex];

    if(currentSlide) {
      const slideContent = currentSlide.querySelector('.slide-content')

      if(!slideContent) return;

      const childWidth = slideContent.offsetWidth
      const isActive = currentSlide.offsetWidth < childWidth;
      
      if(!isActive) return;

      if(currentTranslate > 0) currentTranslate = 0;

      if(currentTranslate < currentSlide.offsetWidth - childWidth) currentTranslate = currentSlide.offsetWidth - childWidth;

      currentSlide.style.transform = `translateX(${currentTranslate}px)`
    }
  }
}
