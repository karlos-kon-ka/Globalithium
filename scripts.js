document.addEventListener('DOMContentLoaded', function() {
    // Agregar animaciones, interacciones o funcionalidades adicionales aquí si es necesario
    console.log('¡La página se ha cargado completamente!');
});


document.addEventListener('scroll', function () {
    handleScroll();
});


window.addEventListener('scroll', function () {
    scrollFunction();
});

function handleScroll() {
    var headerHeight = document.querySelector('header').offsetHeight; // Calcular la altura del encabezado cada vez que se llame a handleScroll
    var scrollPosition = window.scrollY || window.pageYOffset;
    var opacity = 1 - (scrollPosition / headerHeight);
    opacity = Math.min(1, Math.max(0, opacity));
    document.querySelector('header').style.opacity = opacity;
}





window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollToTopBtn").style.display = "block";
  } else {
    document.getElementById("scrollToTopBtn").style.display = "none";
  }
}



document.getElementById("scrollToTopBtn").onclick = function() {
    scrollToTop();
  };
  
  function scrollToTop() {
    const scrollStep = -window.scrollY / (1000 / 15);
    const scrollInterval = setInterval(function() {
      if (window.scrollY !== 0) {
        window.scrollBy(0, scrollStep);
      } else {
        clearInterval(scrollInterval);
      }
    }, 15);
  }






