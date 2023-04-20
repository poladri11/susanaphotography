if(window.location.pathname.includes("/galeria")) {

    $(".galeria-frontimg").each(function(data, img) {

        img.src = img.dataset.imgloaded;
        img.dataset.imgloaded = '';
    })
}

if(window.location.pathname.includes("galeria/")) {
    document.addEventListener("DOMContentLoaded", function() {
        const lazyImages = [].slice.call(document.querySelectorAll(".lazy"));

        const options = {
            rootMargin:  "300px"
        }

        let lazyImagesObs = new IntersectionObserver( function(images, observer) {
            images.forEach( function(image) {
                if (image.isIntersecting) {
                    
                    const img = image.target;
                    img.classList.remove("lazy");
                    img.classList.add("no-lazy");
                    img.src = img.dataset.srcset;
                    lazyImagesObs.unobserve(img);
                }
            } )
        }, options )

        lazyImages.forEach( function(lazyImage) {
            lazyImagesObs.observe(lazyImage);
        })
    })
}