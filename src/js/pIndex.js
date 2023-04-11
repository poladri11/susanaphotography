if(window.location.pathname == "/") {
    document.querySelector(".main-index").scrollLeft = 0;
    const width = screen.width;

    if(width < 500) {
        anime({
            targets: ".main-index-img",
            easing: "linear",
            objectPosition: {
                delay: anime.stagger(2000),
                value: [0, 60],
                duration: 4000
            },
            loop: true,
            direction: "alternate",
            endDelay: 1000,
        })
        
        const animeScrollIndex = anime({
            targets: ".main-index",
            easing: "linear",
            scrollLeft: [{
                value: 0,
                delay: 500,
                duration: 1000
            }, {
                value: width,
                delay: 1000,
                duration: 1000
            }, {
                value: width*2,
                delay: 1500,
                duration: 1000
            }, {
                value: width*3,
                delay: 2000,
                duration: 1000
            }],
            direction: "alternate",
            loop: true,
            endDelay: 2000,
        })

    } else if (width > 500 && width < 900) {
        anime({
            targets: ".main-index",
            easing: "linear",
            scrollLeft: [{
                value: 0,
                delay: 500,
                duration: 1000
            }, {
                value: width / 2,
                delay: 1000,
                duration: 1000
            }, {
                value: width*2 / 2,
                delay: 1500,
                duration: 1000
            }],
            direction: "alternate",
            loop: true,
            endDelay: 2000,
        })
        
    } else {
        
    
    }


}
