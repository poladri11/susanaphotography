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

if(window.location.pathname.includes("galeria/add")) {
    $(" .form__add-c ").submit(function(event) {
        const input = $(".add-cat");
        input.prop("disabled", true);
    })
}

if(window.location.pathname.includes("galeria/edit")) {

    $(" .main__edit-gal-head-img ").click(function(e) {
        const inputEdit = $(".main__edit-gal-head-input");
        if(inputEdit.prop("disabled")) {
            inputEdit.prop("disabled", false);
            e.target.src = "/build/img/svgs/check.svg";
        } else {
            inputEdit.prop("disabled", true);
            e.target.src = "/build/img/svgs/edit1.svg";
        }
    });

    // $(".checkboxRemoveFotoCat").each(function(index, value) {

        $( ".checkboxRemoveFotoCat" ).click(function(e) {
            const parent = $( this ).parent();
            const pathSvg = parent.find("#pathBasura");
            pathSvg.toggleClass("redTrash");
        });
    // })
}