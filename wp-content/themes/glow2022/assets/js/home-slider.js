//Home Slider
var homeSlider = (function () {
    const sliderExists = document.querySelector( '.home-banner' );
    const slides = document.getElementsByClassName("slide-wrapper");
    //const nextSlide = document.getElementsByClassName("next-slide");
    //const prevSlide = document.getElementsByClassName("prev-slide");
    let slideIndex = 0;
    function init() {

        if (sliderExists) {
          //bindUI();
        }
      }
      
      function bindUI() {

        /*
        nextSlide[0].addEventListener("click", function() {
          plusSlides(1);
        });

        prevSlide[0].addEventListener("click", function() {
          plusSlides(-1);
        });
        */
        //prevSlide[0].addEventListener('click', plusSlides(-1), false);

        showSlides();
        
    
      }

      // next prev buttons
      function plusSlides(n) {
        console.log(n, "Move slides");
        showSlides(slideIndex += n);
      }

      function showSlides() {

        let i;

        for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 8000); // Change image every 2 seconds

        //let slides = document.getElementsByClassName("slide-wrapper");
        /*
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
 
        slides[slideIndex-1].style.display = "block";  
        
        setTimeout(showSlides(n), 8000);
        */
        /*
        
        if (n > slides.length) {slideIndex = 1} 
        if (n < 1) {slideIndex = slides.length}

        for (i = 0; i < slides.length; i++) {
            //slides[i].style.display = "none";
            slides[i].classList.add("hide-slide");
            slides[i].classList.remove("show-slide");
        }
        slideIndex++;

        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex-1].classList.remove("hide-slide");
        slides[slideIndex-1].classList.add("show-slide");
        //slides[slideIndex-1].style.display = "block";
        setTimeout(showSlides, 8000);

       */
    
      }

      
      init();

      return self;

}());