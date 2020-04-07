"use_strict";
import formatEventValues from "./formatEventValues";

const createEventCard = event => {
  const values = formatEventValues(event);

  const eventCard = document.createElement("div");
  eventCard.classList.add("eventCard");
  eventCard.innerHTML = `<h2>${values.title}</h2>
  <p>${values.month}</p>
  <a href=${values.eventLink}>Läs mer</a>`;
  return eventCard;
};

export default createEventCard;
