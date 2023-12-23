var swiper = new Swiper(".chieurap-content", {
    slidesPerView:1,  
    spaceBetween: 10,
    loop:true,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints:{
        280:{
            slidesPerView:1,  
            spaceBetween: 10, 
        },
        320:{
            slidesPerView:2,  
            spaceBetween: 10, 
        },
        510:{
            slidesPerView:2,  
            spaceBetween: 15, 
        },
        758:{
            slidesPerView:3,  
            spaceBetween: 15, 
        },
        900:{
            slidesPerView:4,  
            spaceBetween: 20, 
        },
    },
    
});



    var swiper = new Swiper(".home-container", {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 5500,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
