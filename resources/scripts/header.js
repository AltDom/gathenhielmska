"use_strict";


const header = () => {

  if (document.querySelector(".page-template-home")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "GATHENHIELMSKA";
  } else if (document.querySelector(".single-event")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "EVENT";
  } else if (document.querySelector(".page-template-contact")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "KONTAKT";
  } else if (document.querySelector(".page-template-events")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "PROGRAM";
  } else if (document.querySelector(".page-template-news")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "ARTIKLAR";
  } else if (document.querySelector(".single-post")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "ARTIKLAR";
  }

  const navSlide = () => {
    const header = document.querySelector("header");

    const hamburger = header.querySelector(".hamburger");
    const nav = header.querySelector(".menu");
    const close = header.querySelector(".close");
    const navLinks = header.querySelectorAll(".menu li");
    // const languages = header.querySelector(".languages");

    hamburger.addEventListener("click", () => {
      // Make nav and close button active. Close button resets the nav.
      nav.classList.add("nav-active");
      close.classList.add("nav-active");
      close.addEventListener("click", () => {
        nav.classList.remove("nav-active");
        // languages.classList.remove("nav-active");
        close.classList.remove("nav-active");
        navLinks.forEach(link => {
          link.style.animation = "";
        });
      });

      // Make languages active and set event listener for toggling
      // languages.classList.toggle("nav-active");
      // setLanguageEventListener();

      nav.style.animation = `navFade 250ms ease`;

      //Animate Links
      navLinks.forEach((link, index) => {
        if (link.style.animation) {
          link.style.animation = "";
        } else {
          link.style.animation = `navLinkFade 0.4s ease forwards ${index / 7 +
            0.2}s`;
        }
      });
    });
  };

  navSlide();

};

export default header;
