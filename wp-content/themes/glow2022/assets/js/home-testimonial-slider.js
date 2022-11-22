//Home Slider
var homeTestimonalSlider = (function () {
    const sliderExists = document.querySelector( '.home-testimonials-slider' );
    const slides = document.getElementsByClassName("home-testimonial");
    let slideIndex = 1;
    let slideTimer;

    function init() {

        if (sliderExists) {
          bindUI();
        }
      }
      
      function bindUI() {
        
        showDots();
        showSlides();
    
      }

      function showDots() {
        //var list = document.createElement('ul');

        for (i = 0; i < slides.length; i++) {

            var div = document.createElement('div');
            div.className = "dot";
            var dots = document.querySelector('.testimonial-dots');
            dots.appendChild(div);

        }

        //Check if a dot is clicked
        const dotClicked = document.querySelectorAll('.dot');



            for (i =0; i < dotClicked.length; i++) {
                dotClicked[i].addEventListener('click', ((j) => {

      
                    return function() {
                        updateDot(j);
                        slideIndex = (j+1);
                        clearTimeout(slideTimer);
                        showSlides()
                        console.log(j + ' dot clicked');
                        
                        
                    }

                    
                })(i))
            }




        

      }

      function showSlides() {

        let i;
        //let slides = document.getElementsByClassName("home-testimonial");

        for (i = 0; i < slides.length; i++) {
            slides[i].classList.add("hide-testimonial");
            slides[i].classList.remove("show-testimonial");
        }

        

        if (slideIndex > slides.length) {slideIndex = 1}
        updateDot(slideIndex-1);
        slides[slideIndex-1].classList.remove("hide-testimonial");
        slides[slideIndex-1].classList.add("show-testimonial");
        
        slideIndex++;

       // updateDot(slideIndex);


        

        
        slideTimer = setTimeout(showSlides, 8000); // Change image every 8 seconds

        
    
      }

      function updateDot(whichDot) {

        console.log(whichDot + ' which dot!!!');

        let newActiveDot = document.querySelectorAll('.dot');
       // console.log(newActiveDot[0] + ' dottt');

        let dotClicked = document.querySelectorAll('.dot');
            for (i =0; i < dotClicked.length; i++) {
                dotClicked[i].classList.remove('active-dot');
            }

            //return slideIndex = (whichDot+1);
            newActiveDot[whichDot].classList.add('active-dot');

          //  updateSlides(whichDot);

            
            //Change Slide
            


        //slideIndex = 
      }

  

      
      init();

      return self;

}());