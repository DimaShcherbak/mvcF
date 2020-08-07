$(document).ready(function () {
    $('.flexslider') .flexslider({
        // namespace: "my_str"
        // selector:".slider >p"
        animation:"slide",
        // easing: "easeOutElastic",
        // revers:true,
        // animationLoop:true,
        // startAt:3,
        slideShow:true,
        slideshowSpeed:3000,
        animationSpeed:2000,
        // initDelay:3000,
        // randomize: true,
        // pauseOnHover: true,
        // pauseOnAction: true,
        controlNav: true,
        directoinNav: true,
        prevText:"Previous",
        NextText:"Next",
        keyboard: false,
        // pausePlay:true,
        // playText: "Play",
        pauseText: "Pause"
    });
});