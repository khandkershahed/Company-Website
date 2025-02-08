
$(document).ready(function () {
  $(".slider-product").slick({
    slidesToShow: 4,
    slidesToScroll: 4,
    infinite: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 10000,
    dots: false,
    prevArrow: ".hero-slider__button--prev",
    nextArrow: ".hero-slider__button--next",
    responsive: [
      {
        breakpoint: 1024, // Adjust the breakpoint for tablets or small desktops
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 768, // Adjust the breakpoint for tablets
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 480, // Adjust the breakpoint for mobile devices
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true, // Enable dots navigation on smaller screens if desired
        },
      },
    ],
  });
});


$(document).ready(function () {
  $(".hero-slider__wrapper").slick({
    slidesToShow: 1,
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 10000,
    draggable: true,
    prevArrow: ".hero-slider__button--prev",
    nextArrow: ".hero-slider__button--next",
  });
});


document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
  anchor.addEventListener("click", function (e) {
    e.preventDefault();
    const targetSection = document.querySelector(
      this.getAttribute("href")
    );

    targetSection.scrollIntoView({
      behavior: "smooth",
    });
  });
});
