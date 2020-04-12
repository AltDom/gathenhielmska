"use_strict";

const venuesForm = () => {

  const bookButtons = document.querySelectorAll(".book-button");
  if(bookButtons) {

    const toggleBookingForm = () => {
      const bookingForm = document.querySelector(".booking-form");
      if (bookingForm.style.display !== "flex") {
        bookingForm.style.display = "flex";
        setTimeout(function (){
          setBookingFormClosingListener();
        }, 1);
      } else if (bookingForm.style.display == "flex") {
        bookingForm.style.display = "none";
      }
    }

    bookButtons.forEach(bookButton => {
      bookButton.addEventListener('click', toggleBookingForm, false);
    });

    const setBookingFormClosingListener = () => {

      const clickedBody = function(event) {
        event.preventDefault();
        const bookingForm = document.querySelector(".booking-form");
        const isClickedOutside = !bookingForm.contains(event.target);
        if (isClickedOutside) {
          bookingForm.style.display = "none";
          body.style.opacity = 1;
          body.removeEventListener('click', clickedBody, false);
        }
      }

      const body = document.querySelector("body")
      body.style.opacity = 0.5;
      body.addEventListener('click', clickedBody, false);
    }

  }
};

export default venuesForm;
