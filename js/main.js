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

  const slider = document.querySelector("[data-slider]");
  if (slider) {
    const slides = Array.from(slider.querySelectorAll(".hero-slide"));
    const dots = Array.from(slider.querySelectorAll(".slider-dot"));
    const label = slider.querySelector("[data-slide-label]");
    const labels = slides.map((_, i) => {
      const map = [
        "Silky. Strong. Unstoppable.",
        "Pakistan ke baalon ki pehchaan",
        "Premium herbal care",
        "400 ml · Rs 1,890",
        "Luxury daily restore",
        "Soft. Light. Ready.",
        "Order online · COD",
      ];
      return map[i] || "";
    });
    let index = 0;
    let timer;

    const goTo = (next) => {
      slides[index]?.classList.remove("is-active");
      dots[index]?.classList.remove("is-active");
      index = (next + slides.length) % slides.length;
      slides[index]?.classList.add("is-active");
      dots[index]?.classList.add("is-active");
      if (label) {
        label.style.opacity = "0";
        window.setTimeout(() => {
          label.textContent = labels[index] || "";
          label.style.opacity = "1";
        }, 180);
      }
    };

    const play = () => {
      window.clearInterval(timer);
      timer = window.setInterval(() => goTo(index + 1), 5500);
    };

    slider.querySelector(".slider-prev")?.addEventListener("click", () => {
      goTo(index - 1);
      play();
    });
    slider.querySelector(".slider-next")?.addEventListener("click", () => {
      goTo(index + 1);
      play();
    });
    dots.forEach((dot) => {
      dot.addEventListener("click", () => {
        goTo(Number(dot.dataset.goto || 0));
        play();
      });
    });

    slider.addEventListener("mouseenter", () => window.clearInterval(timer));
    slider.addEventListener("mouseleave", play);
    play();
  }
});
