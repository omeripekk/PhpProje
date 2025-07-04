$('.owl-carousel').owlCarousel({
    rtl:true, // Sagdan sola kaydırma aktif
    loop:false, // Dongu kapalı
    margin:10,
    nav:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        1000:{
            items:3
        }
    }
});
