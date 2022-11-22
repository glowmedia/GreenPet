//Yoast Faq Code
var yoastfaq = (function () {
  const faqExists = document.querySelector( '.schema-faq-section' );

  function init() {

    if (faqExists) {
      bindUI(faqExists);
    }
  }

  function bindUI() {
    const faqQuestions = document.querySelectorAll('.schema-faq-question');
    faqQuestions[0].addEventListener('click', bindEvents(faqQuestions), false);

  }
    
  function bindEvents(faqQuestions) {
    faqQuestions.forEach(el => el.addEventListener('click', event => {
      event.target.classList.toggle('faq-active');
      event.target.nextElementSibling.classList.toggle('faq-active');
    }))
  }

  init();

  return self;


}());