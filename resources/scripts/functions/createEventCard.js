"use_strict";

const createEventCard = (event) => {
  const date = new Date(`${event.acf.date}`);
  const time = `${date.getHours()}:${String(date.getMinutes()).padStart(
    2,
    "0"
  )}`;

  const eventCard = document.createElement("div");
  eventCard.classList.add("eventCard");
  eventCard.innerHTML = `<h2>${event.title.rendered}</h2>`;
  return eventCard;
};

export default createEventCard;
