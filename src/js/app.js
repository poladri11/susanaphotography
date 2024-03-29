$(".header__mobile-hmenu").click(function() {

    const durationLines13 = 400;
    const easingLines13 = "easeInOutQuart";

    const durationLine2 = 500;
    const easingLine2 = "easeInOutBack";
    
    if($( this ).hasClass("active")) {
        
        document.body.style.overflow = "auto";

        anime({
            targets: ".header__mobile-overlay",
            delay: 550,
            left: "-100%",
            duration: 300,
            easing: "linear",
            complete: function() {
                document.querySelector(".header__mobile-overlay").style.display = "none"
            }
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
        document.body.style.overflow = "hidden";
        window.scrollTo(0, 0);

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

if($(".header__mobile-head-button-perfil").length) {
    
    let active = false;
    let running = false;
    $( ".header__mobile-head-button-perfil" ).click(function() {

        if(running) { return }

        if(!active) {
            anime({
                targets: ".header__mobile-head-button-perfil-c",
                height: "120px",
            })
            anime({
                targets: ".header__mobile-head-button-perfil-c-a",
                begin: function() {
                    running = true;
                    $( ".header__mobile-head-button-perfil-c-a" ).each(function(a) {
                        $( this ).show();
                    })
                },
                opacity: 1,
                delay: anime.stagger(100),
                easing: "linear",
                duration: 400,
                complete: function() {
                    running = false;
                }
            })
            active = true
        } else {
            anime({
                targets: ".header__mobile-head-button-perfil-c",
                height: "0px",
                delay: 500
            })
            anime({
                targets: ".header__mobile-head-button-perfil-c-a",
                begin: function() {
                    running = true;
                },
                complete: function() {
                    running = false;
                    $( ".header__mobile-head-button-perfil-c-a" ).each(function(a) {
                        $( this ).hide();
                    })
                },
                opacity: 0,
                delay: anime.stagger(100, {direction: 'reverse'}),
                easing: "linear",

                duration: 200
            })
            active = false
        }
    });
}