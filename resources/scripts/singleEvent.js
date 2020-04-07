"use_strict";
import formatEventValues from "./functions/formatEventValues";

const singleEvent = () => {
  const singleEvent = document.querySelector(".singleEvent");
  if (singleEvent != null) {
    const eventId = document.querySelector(".eventId").value;
    const uri = `/wordpress/wp-json/wp/v2/event/${eventId}`;

    fetch(uri)
      .then(res => res.json())
      .then(res => {
        const categoryNames = document.querySelector(".categoryNames").value;
        const values = formatEventValues(res);

        singleEvent.innerHTML = `<h2>${values.title}</h2>
        <p>${categoryNames}</p>
        <p>${values.month}</p>`;
      });
  }
};

export default singleEvent;
