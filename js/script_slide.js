var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("custom-slider");
    var dots = document.getElementsByClassName("dot");
    if (n > slides.lenght) {slideIndex = 1}
    if (n < 1) (slideIndex = slides.length)
    for (i = 0; i < slides.length; i++) {
        slides[1].computedStyleMap.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[1].className = dots[1].className.replace("active", "");
    }
    slides[slideIndex-1].computedStyleMap.display - "block";
    dots[slideIndex-1].className += "active";
}