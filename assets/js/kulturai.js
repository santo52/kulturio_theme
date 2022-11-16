

(function($){




$(document).ready(() => {

  $.fn.ajaxForm = function(obj) {
    const disableSubmitButton = (bool) =>  $(obj.target).find('input[type=submit]').prop('disabled', bool);

    $.ajax({
      ...obj,
      enctype: 'multipart/form-data',
      processData: false,
      contentType: false,
      cache: false,
      beforeSend: function(){
      disableSubmitButton(true);
      },
      success: function(res){
        try {
          const json = JSON.parse(res);
          obj.success && obj.success(json);
        } catch(e) {
          obj.success && obj.success(res);
        } finally {
          disableSubmitButton(false);
        }
      },
      error: function(err){
        obj.error && obj.success(err);
        disableSubmitButton(false);
      },
    })
  }

  $.fn.show = function(time = 5000) {
    if($(this).hasClass('alert')) {
      $(this).removeClass('alert--open');
      $(this).removeClass('alert--close');
      
      $(this).addClass('alert--open');
      setTimeout(() => {
        $(this).addClass('alert--close');
        $(this).removeClass('alert--open');
      }, time)
    }
  }

    $('.contact-menu-action').click(() => {
      $('#contact-modal').addClass('modal--show')
    })

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


    $('.contact-form form').on('submit', (e) => {
      e.preventDefault();
      e.stopPropagation();

      
      const formData = new FormData(e.target);
      formData.append('action', 'kulturai_ajax_contact_form')
      
       $.fn.ajaxForm({
         target: e.taget,
         url : kulturai_vars.ajaxurl,
         type: 'post',
         data: formData,
         success: function(res){
            if(res.saved) {

              const $contactModal = $(e.target).parents('#contact-modal');
              if($contactModal.length) {
                $($contactModal[0]).removeClass('modal--show');
              } else {
                $('.alert').show();
              }
              
              $(e.target)[0].reset();
            }
         },
      })
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


})(jQuery);