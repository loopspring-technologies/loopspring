document.addEventListener("DOMContentLoaded", function () {
  const fadeToLeft = document.querySelectorAll(".fadeInLeft");
  const fadeToLeft1 = document.querySelectorAll(".fadeInLeft1");
  const fadeToRight = document.querySelectorAll(".fadeInRight");
  const fadeToUp = document.querySelectorAll(".fadeup");
  const fadeToDown = document.querySelectorAll(".fadedown");
  const paragraphs = document.querySelectorAll(".fadeInRightLinear div");
  const fadeInUpLinear = document.querySelectorAll(".fadeInUpLinear");

  handleScroll();
  function handleScroll() {
    var scrollPosition = window.scrollY;
    fadeToLeft.forEach(function (element) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-in-left")
      ) {
        element.classList.add("fade-in-left");
      }
    });
    fadeToRight.forEach(function (element) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-in-right")
      ) {
        element.classList.add("fade-in-right");
      }
    });
    fadeToLeft1.forEach(function (element) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-in-left")
      ) {
        element.classList.add("fade-in-left");
      }
    });

    fadeToUp.forEach(function (element) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-up")
      ) {
        element.classList.add("fade-up");
      }
    });
    fadeToDown.forEach(function (element) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-down")
      ) {
        element.classList.add("fade-down");
      }
    });

    paragraphs.forEach(function (element, index) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-in-right")
      ) {
        setTimeout(() => {
          element.classList.add("fade-in-right");
        }, index * 300);
      }
    });
    fadeInUpLinear.forEach(function (element, index) {
      if (
        scrollPosition > element.offsetTop - window.innerHeight &&
        !element.classList.contains("fade-up")
      ) {
        setTimeout(() => {
          element.classList.add("fade-up");
        }, index * 500);
      }
    });
  }

  window.addEventListener("scroll", handleScroll);
});
