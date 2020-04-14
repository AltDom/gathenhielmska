"use_strict";

// Functions from venuesForm.js are also used in the Guided Tours page.

const guidedTours = () => {

  const tourDates = document.querySelectorAll(".tour-date");
  if(tourDates) {

    tourDates.forEach(tourDate => {
      let englishDay = tourDate.innerHTML.split(" ")[0];
      let date = tourDate.innerHTML.split(" ")[1];
      let swedishDay = "";
      if(englishDay=="MON") {
        swedishDay="MÅN";
      }
      else if(englishDay=="TUE") {
        swedishDay="TIS";
      }
      else if(englishDay=="WED") {
        swedishDay="ONS";
      }
      else if(englishDay=="THU") {
        swedishDay="TOR";
      }
      else if(englishDay=="FRI") {
        swedishDay="FRE";
      }
      else if(englishDay=="SAT") {
        swedishDay="LÖR";
      }
      else if(englishDay=="SUN") {
        swedishDay="SÖN";
      }
      tourDate.innerHTML = [swedishDay, date].join(" ");
    });

  }
};

export default guidedTours;
