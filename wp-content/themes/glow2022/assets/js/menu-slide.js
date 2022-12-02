//Home Slider
var menuSlide = (function () {

    const menuAvailable = document.querySelector( '.mobile-menu-icon' );
    const mainMenu = document.querySelector( '#mobile-navbar' );
   // const closeMainMenu = document.querySelector( '.close-menu' );
    const overlay = document.querySelector( '#overlay' );

    function init() {

        if (menuAvailable) {
          bindUI();
        }
      }
      
      function bindUI() {

        console.log(mainMenu);
        menuAvailable.addEventListener('click', bindEvents, false);
        //closeMainMenu.addEventListener('click', closeMenu, false);
        overlay.addEventListener('click', closeMenu, false);
    
      }

      function bindEvents() {

        console.log('Event happens');
        // toggle class to show the menu
        mainMenu.classList.add("mobile-open");
        document.body.classList.add('lock-body');
        //overlay.classList.add("active");
        document.getElementById("overlay").style.display = "block";
        //toggle class to show the menu animation
        //burgerMenu.classList.toggle("change");

      }

      function closeMenu() {

        // toggle class to show the menu
        mainMenu.classList.remove("mobile-open");
        document.getElementById("overlay").style.display = "none";
        document.body.classList.remove('lock-body');
        //toggle class to show the menu animation
        //burgerMenu.classList.toggle("change");

      }

      

      
      init();

      return self;

}());