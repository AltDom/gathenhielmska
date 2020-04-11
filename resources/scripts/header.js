"use_strict";


const header = () => {

  // const toggleLanguage = () => {
  //   const header = document.querySelector("header");
  //   const swedish = header.querySelector(".swedish");
  //   const english = header.querySelector(".english");
  //   swedish.classList.toggle("active");
  //   english.classList.toggle("active");
  // };

  // const setLanguageEventListener = () => {
  //   const header = document.querySelector("header");
  //   const swedish = header.querySelector(".swedish");
  //   const english = header.querySelector(".english");
  //   if (header.querySelector(".english.active")) {
  //     const newEnglish = english.cloneNode(true);
  //     newEnglish.classList.add("active");
  //     english.parentNode.replaceChild(newEnglish, english);
  //     swedish.addEventListener("click", () => {
  //       toggleLanguage();
  //       setLanguageEventListener();
  //     });
  //   }
  //   if (header.querySelector(".swedish.active")) {
  //     const newSwedish = swedish.cloneNode(true);
  //     newSwedish.classList.add("active");
  //     swedish.parentNode.replaceChild(newSwedish, swedish);
  //     english.addEventListener("click", () => {
  //       toggleLanguage();
  //       setLanguageEventListener();
  //     });
  //   }
  // };
  if (document.querySelector(".page-template-home")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "GATHENHIELMSKA";
  } else if (document.querySelector(".single-event")) {
    const nav = document.querySelector("nav");
    nav.childNodes[2].textContent = "EVENT";
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
