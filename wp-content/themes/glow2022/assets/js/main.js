var showMobileMenu = (function () {

    const burgerMenu = document.querySelector(".mobile-menu-icon");
    const MainMenu = document.querySelector("#mobile-navbar");

    //console.log(MainMenu);

    function init() {

        var mmenu_exists = document.getElementsByClassName('mobile-menu-icon');

        if (mmenu_exists) {
            bindUI(mmenu_exists);
        }     
      
    }

    function bindUI(mobile_menu) {

        //mobile_menu[0].addEventListener('click', bindEvents, false);
        

    }

    function bindEvents() {
        // toggle class to show the menu
        MainMenu.classList.toggle("mobile-open");
        //toggle class to show the menu animation
        burgerMenu.classList.toggle("change");

    }

    init();

    return self;

}());

var MobileMenuSubs = (function () {

    function init() {
       
       var OpenSubMenu = document.querySelectorAll(".open-submenu");

       for (var i = 0; i < OpenSubMenu.length; ++i) {
           console.log(i.nextElementSibling);
           OpenSubMenu[i].addEventListener('click', bindEvents, false);
       }
      
    }

    function bindEvents() {

        this.nextElementSibling.classList.toggle("opened-menu");
        this.classList.toggle("sub-opened");

    }

    init();

    return self;


}());
