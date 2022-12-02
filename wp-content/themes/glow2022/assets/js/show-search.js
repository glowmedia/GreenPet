var showSearch = (function () {

    const searchBox = document.querySelector(".search-box");
    const searchIcon = document.querySelector(".search-icon");

    console.log(searchIcon);

    function init() {

        var search_exists = document.getElementsByClassName('search-icon');

        if (search_exists) {

            bindUI();
        }     
      
    }

    function bindUI() {

       searchIcon.addEventListener('click', bindEvents, false);
        

    }

    function bindEvents() {

        console.log('search clicked');
        // toggle class to show the menu
        searchBox.classList.toggle("search-open");
        //toggle class to show the menu animation
        //burgerMenu.classList.toggle("change");

    }

    init();

    return self;

}());
