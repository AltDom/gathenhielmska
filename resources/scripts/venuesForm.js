"use_strict";

const venuesForm = () => {

  const bookButtons = document.querySelectorAll(".book-button");
  if(bookButtons) {

    const toggleBookingForm = () => {
      const bookingForm = document.querySelector(".booking-form");
      if (bookingForm.style.display !== "flex") {
        bookingForm.style.display = "flex";
        bookingForm.style.setProperty('opacity', '1', 'important');
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
        console.log(isClickedOutside)
        const bookingForm = document.querySelector(".booking-form");
        const isClickedOutside = !bookingForm.contains(event.target);
        if (isClickedOutside) {
          bookingForm.style.display = "none";
          opacityDiv.style.display = "none";
          opacityDiv.removeEventListener('click', clickedBody, false);
        }
      }
      const opacityDiv = document.querySelector(".opacity-div");
      opacityDiv.style.display = "block";
      opacityDiv.addEventListener('click', clickedBody, false);
    }

  }
};

export default venuesForm;
