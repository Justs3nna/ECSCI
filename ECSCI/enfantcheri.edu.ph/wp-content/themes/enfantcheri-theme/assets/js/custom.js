  var rellax = new Rellax('.rellax');
       AOS.init({
        easing: 'ease-out-back',
        duration: 1000
    });






$('.carousel-item').first().addClass('active');

const mySiema = new Siema();
document.querySelector('.prev').addEventListener('click', () => mySiema.prev());
document.querySelector('.next').addEventListener('click', () => mySiema.next());

