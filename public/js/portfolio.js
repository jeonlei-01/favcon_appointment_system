let bar = document.querySelector('.bar')
let topBtn = document.querySelector('.topBtn')
let btn = document.querySelector('.topBtn i')
let contactBtn = document.querySelector('.btn')
let btn2 = document.querySelector('.btn a')
let nav = document.querySelector('nav ul')


bar.addEventListener('click', () => {
  bar.classList.toggle('active')
  nav.classList.toggle('active')
})

topBtn.addEventListener('click', () => {
  btn.click()
})
contactBtn.addEventListener('click', () => {
  btn2.click()
})


var options = {
  strings: ['Favio Jasso'],
  typeSpeed: 100,
  backSpeed: 100,
  loop: false
};

var typed = new Typed('.typing1', options);
// var typed = new Typed('.typing2', options);

ScrollOut({
  targets: '.img, .aboutText , .box, div.left, div.right'
})
ScrollOut({
  targets: '.header',
  offset: 50
})



// ============= for the carousel ==============

const carousel = document.querySelector('.carousel');
const prevButton = document.getElementById('left');
const nextButton = document.getElementById('right');

nextButton.addEventListener('click', () => {
  carousel.appendChild(carousel.firstElementChild);
});

prevButton.addEventListener('click', () => {
  carousel.insertBefore(carousel.lastElementChild, carousel.firstElementChild);
});


// ============= for the services read more ==============
const spanElement = document.querySelector('.click-span');
const modal = document.querySelector('.modal');
const closeBtn = document.querySelector('.close-btn');

spanElement.addEventListener('click', function () {
  modal.style.display = 'block';
});

closeBtn.addEventListener('click', function () {
  modal.style.display = 'none';
});

window.addEventListener('click', function (event) {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});


const spanElementTest = document.querySelector('.click-test');
const test = document.querySelector('.test');
const closeTest = document.querySelector('.close-test');

spanElementTest.addEventListener('click', function () {
    test.style.display = 'block';
});

closeTest.addEventListener('click', function () {
    test.style.display = 'none';
});

window.addEventListener('click', function (event) {
    if (event.target === test) {
        test.style.display = 'none';
    }
});

const spanElementThird = document.querySelector('.click-third');
const third = document.querySelector('.third');
const closeThird = document.querySelector('.close-third');

spanElementThird.addEventListener('click', function () {
  third.style.display = 'block';
});

closeThird.addEventListener('click', function () {
  third.style.display = 'none';
});

window.addEventListener('click', function (event) {
    if (event.target === third) {
      third.style.display = 'none';
    }
});

const spanElementFourt = document.querySelector('.click-fourt');
const fourt = document.querySelector('.fourt');
const closeFourt = document.querySelector('.close-fourt');

spanElementFourt.addEventListener('click', function () {
  fourt.style.display = 'block';
});

closeFourt.addEventListener('click', function () {
  fourt.style.display = 'none';
});

window.addEventListener('click', function (event) {
    if (event.target === fourt) {
      fourt.style.display = 'none';
    }
});
// ------ for the language ----------

document.addEventListener('DOMContentLoaded', function() {
  const currentLanguageButton = document.querySelector('.current-language');
  const languageList = document.querySelector('.language-list');
  const languageItems = document.querySelectorAll('.language-list li');

  currentLanguageButton.addEventListener('click', function() {
    languageList.classList.toggle('active');
  });

  languageItems.forEach(item => {
    item.addEventListener('click', function() {
      const selectedLanguage = item.getAttribute('data-lang');
      const flagImage = item.querySelector('img').cloneNode(true);
      const languageText = item.textContent.trim();

      currentLanguageButton.innerHTML = '';
      currentLanguageButton.appendChild(flagImage);
      currentLanguageButton.innerHTML += languageText;

      languageList.classList.remove('active');
    });
  });
});