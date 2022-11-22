//Home Slider
var menuSlide = (function () {

    const menuAvailable = document.querySelector( '.main-menu-btn' );
    const mainMenu = document.querySelector( '.menu-slide-container' );
    const closeMainMenu = document.querySelector( '.close-menu' );
    const overlay = document.querySelector( '#overlay' );

    function init() {

        if (menuAvailable) {
          bindUI();
        }
      }
      
      function bindUI() {

        //console.log('bindUI');
        menuAvailable.addEventListener('click', bindEvents, false);
        closeMainMenu.addEventListener('click', closeMenu, false);
        overlay.addEventListener('click', closeMenu, false);
    
      }

      function bindEvents() {

        console.log('Event happens');
        // toggle class to show the menu
        mainMenu.classList.add("active");
        document.body.classList.add('lock-body');
        //overlay.classList.add("active");
        document.getElementById("overlay").style.display = "block";
        //toggle class to show the menu animation
        //burgerMenu.classList.toggle("change");

      }

      function closeMenu() {

        console.log('Event closes');
        // toggle class to show the menu
        mainMenu.classList.remove("active");
        //overlay.classList.remove("active");
        document.getElementById("overlay").style.display = "none";
        document.body.classList.remove('lock-body');
        //toggle class to show the menu animation
        //burgerMenu.classList.toggle("change");

      }

      

      
      init();

      return self;

}());