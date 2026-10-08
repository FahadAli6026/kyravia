document.addEventListener("DOMContentLoaded", () => {
  const nav = document.querySelector(".site-nav");
  const toggle = document.querySelector(".nav-toggle");
  const primaryNav = document.querySelector(".primary-nav");
  const reveals = document.querySelectorAll(".reveal");

  const onScroll = () => {
    if (!nav) return;
    nav.classList.toggle("is-scrolled", window.scrollY > 24);
  };

  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  if (toggle && primaryNav) {
    toggle.addEventListener("click", () => {
      const open = primaryNav.classList.toggle("is-open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
      document.body.classList.toggle("nav-open", open);
    });
  }

  const show = (el) => el.classList.add("is-visible");

  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            show(entry.target);
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.08, rootMargin: "0px 0px -20px 0px" }
    );

    reveals.forEach((el) => {
      if (el.getBoundingClientRect().top < window.innerHeight * 0.92) {
        show(el);
      } else {
        observer.observe(el);
      }
    });
  } else {
    reveals.forEach(show);
  }
});
