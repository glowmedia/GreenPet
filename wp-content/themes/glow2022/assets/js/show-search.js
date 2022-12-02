var showSearch = (function () {

    const searchBox = document.querySelector(".search-box");
    const searchIcon = document.querySelector(".search-icon");

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

        // toggle class to show the menu
        searchBox.classList.toggle("search-open");

    }

    init();

    return self;

}());
