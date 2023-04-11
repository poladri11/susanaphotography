$(".header__mobile-hmenu").click(function() {

    const durationLines13 = 400;
    const easingLines13 = "easeInOutQuart";

    const durationLine2 = 500;
    const easingLine2 = "easeInOutBack";
    
    if($( this ).hasClass("active")) {
        
        anime({
            targets: ".header__mobile-overlay",
            delay: 550,
            left: "-100%",
            duration: 300,
            easing: "linear"
        })
        
        anime({
            targets: ".header__mobile-overlay-body-a",
            opacity: {
                value: 0,
                delay: anime.stagger(10)
            },
            duration: 1000,
            delay: anime.stagger(10),
            letterSpacing: {
                value: "0px",
                delay: anime.stagger(10)
            },
            easing: "easeInOutCirc",
            left: "-20px",
            bottom: "-10px"
        })

        anime({
            targets: ".line-1",
            rotate: 0,
            duration: durationLines13,
            bottom: 0,
            easing: easingLines13,
        })

        anime({
            targets: ".line-2",
            opacity: 1,
            duration: durationLine2,
            width: 32,
            easing: easingLine2,
        })
        
        anime({
            targets: ".line-3",
            rotate: 0,
            duration: durationLines13,
            top: 0,
            easing: easingLines13,
        })
        
    } else {

        document.querySelector(".header__mobile-overlay").style.display = "flex";

        anime({
            targets: ".header__mobile-overlay",
            left: 0,
            duration: 300,
            easing: "linear"
        })

        anime({
            targets: ".header__mobile-overlay-body-a",
            opacity: {
                value: 1,
                delay: anime.stagger(50)
            },
            delay: anime.stagger(10),
            easing: "easeInOutCirc",
            letterSpacing: {
                value: "5px",
                delay: anime.stagger(50)
            },
            left: 0,
            bottom: 0
        })
        
        anime({
            targets: ".line-1",
            rotate: 45,
            duration: durationLines13,
            bottom: -10,
            easing: easingLines13,
        })
        
        anime({
            targets: ".line-2",
            duration: durationLine2,
            width: 0,
            opacity: {
                value: 0,
                delay: 20
            },
            easing: easingLine2,
           
        })
        
        
        anime({
            targets: ".line-3",
            rotate: -45,
            duration: durationLines13,
            top: -10,
            easing: easingLines13,
        })
    }
    $( this ).toggleClass("active");
    
})