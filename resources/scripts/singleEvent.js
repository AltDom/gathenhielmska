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

        singleEvent.innerHTML = `<img class="singleEvent__image" src="${values.image}" alt="event image">
        <div class="singleEvent__textWrapper">
            <div class="singleEvent__textWrapper__titleContainer">
              <p>${categoryNames}</p>
              <h1>${values.title}</h1>
              <p>${values.performer}</p>
            </div>
            <hr>
            <div class="singleEvent__textWrapper__dateTimeContainer">
                <div>
                    <p>${values.weekDay}</p>
                    <h1>${values.fullDate}</h1>
                </div>
                <div>
                    <p>TID</p>
                    <h1>${values.time}</h1>
                </div>
            </div>
            <div class="singleEvent__textWrapper__ticketLink">
                <a href="${values.ticketLink}"><h1>KÖP VIA BILETTO</h1></a>
            </div>
            <p>${values.description}</p>`;
      });
  }
};

export default singleEvent;
