document.addEventListener("DOMContentLoaded", function () {
  var nav = document.querySelector(".site-nav");
  var toggle = document.querySelector(".nav-toggle");
  var primaryNav = document.querySelector(".primary-nav");
  var reveals = document.querySelectorAll(".reveal");

  function onScroll() {
    if (!nav) return;
    nav.classList.toggle("is-scrolled", window.scrollY > 24);
  }

  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  if (toggle && primaryNav) {
    toggle.addEventListener("click", function () {
      var open = primaryNav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      document.body.classList.toggle("nav-open", open);
    });
  }

  function show(el) {
    el.classList.add("is-visible");
  }

  if ("IntersectionObserver" in window) {
    var observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            show(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -20px 0px" }
    );

    reveals.forEach(function (el) {
      if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
        show(el);
      } else {
        observer.observe(el);
      }
    });
  } else {
    reveals.forEach(show);
  }

  var slider = document.querySelector("[data-slider]");
  if (!slider) return;

  var track = slider.querySelector(".hero-slider-track");
  var slides = slider.querySelectorAll(".hero-slide");
  var dots = slider.querySelectorAll(".slider-dot");
  var prevBtn = slider.querySelector(".slider-prev");
  var nextBtn = slider.querySelector(".slider-next");
  var index = 0;
  var timer = null;
  var total = slides.length;

  function goTo(next) {
    index = ((next % total) + total) % total;
    if (track) {
      track.style.transform = "translate3d(" + -index * 100 + "%, 0, 0)";
    }
    for (var i = 0; i < slides.length; i++) {
      slides[i].classList.toggle("is-active", i === index);
    }
    for (var d = 0; d < dots.length; d++) {
      dots[d].classList.toggle("is-active", d === index);
    }
  }

  function play() {
    if (timer) window.clearInterval(timer);
    timer = window.setInterval(function () {
      goTo(index + 1);
    }, 4500);
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function (e) {
      e.preventDefault();
      goTo(index - 1);
      play();
    });
  }
  if (nextBtn) {
    nextBtn.addEventListener("click", function (e) {
      e.preventDefault();
      goTo(index + 1);
      play();
    });
  }
  for (var i = 0; i < dots.length; i++) {
    (function (dotIndex) {
      dots[dotIndex].addEventListener("click", function (e) {
        e.preventDefault();
        goTo(dotIndex);
        play();
      });
    })(i);
  }

  // Touch swipe
  var startX = 0;
  slider.addEventListener(
    "touchstart",
    function (e) {
      startX = e.changedTouches[0].screenX;
    },
    { passive: true }
  );
  slider.addEventListener(
    "touchend",
    function (e) {
      var diff = e.changedTouches[0].screenX - startX;
      if (Math.abs(diff) < 40) return;
      if (diff < 0) goTo(index + 1);
      else goTo(index - 1);
      play();
    },
    { passive: true }
  );

  slider.addEventListener("mouseenter", function () {
    if (timer) window.clearInterval(timer);
  });
  slider.addEventListener("mouseleave", play);

  goTo(0);
  play();
});
