const linkGenre = document.querySelector('.genre');
const modalGenre = document.querySelector('.section__genre');
const arrow = document.querySelector('.arrow');
const classGenre = document.querySelectorAll('.class__genre');

linkGenre.addEventListener('click', function(e) {
  e.preventDefault();
  e.stopPropagation();
  // Check if the modal is already open
  if (!modalGenre.classList.contains('none') ) {
    modalGenre.classList.add('none');
    arrow.classList.remove('arrow__upper');
  } else {
    modalGenre.classList.remove('none');
    arrow.classList.add('arrow__upper');
  }
});

window.addEventListener('click', function (e) {
  if (e.target.closest('.section__genre') === null && e.target.closest('.genre') === null) {
    modalGenre.classList.add('none');
    arrow.classList.remove('arrow__upper');
  }
});
