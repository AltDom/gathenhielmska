"use_strict";
import formatEventValues from "./formatEventValues";

const createEventCard = event => {
  const values = formatEventValues(event);

  const eventCard = document.createElement("div");
  eventCard.classList.add("eventCard");
  eventCard.innerHTML = `<div class="eventCard__imageContainer">
  <img class="eventCard__imageContainer__image" src="${values.image}">
  <div class="eventCard__imageContainer__dateContainer">
      <p>${values.month}</p>
      <p>${values.weekDay}</p>
      <h1 class="dateContainer__dayOfMonth">${values.dayOfMonth}</h1>
      <h2 class="dateContainer__time">${values.time}</h2>
  </div>
</div>
<div class="eventCard__textContainer">
  <h2>${values.title}</h2>
  <p>${values.performer}</p>
</div>
<div class="eventCard__links">
  <div>
      <a href="${values.eventLink}">
          <h2>LÄS MER</h2>
      </a>
  </div>
  <div>
      <a href="${values.ticketLink}">
          <h2>KÖP VIA BILETTO</h2>
      </a>
  </div>
</div>`;

  return eventCard;
};

export default createEventCard;
