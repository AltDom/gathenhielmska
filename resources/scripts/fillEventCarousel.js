"use_strict";
import createEventCard from "./functions/createEventCard";
import activateEventCarousel from "./functions/activateEventCarousel";

//för den på single event, lägg dens id och category i en hidden input.
// /wordpress/wp-json/wp/v2/event?category=3,4&compare=>&order=asc&per_page=5&exclude=22
// problemet är async tror jag.

const fillEventCarousel = () => {
  const eventCarousel = document.querySelector(".eventCarousel");
  if (eventCarousel != null) {
    fetch("/wordpress/wp-json/wp/v2/event?compare=>&order=asc&per_page=5")
      .then((res) => res.json())
      .then((res) => {
        res.forEach((event) => {
          const eventCard = createEventCard(event);
          const carouselItem = document.createElement("div");
          carouselItem.classList.add("eventCarousel__item");
          carouselItem.appendChild(eventCard);
          eventCarousel.appendChild(carouselItem);
        });
        activateEventCarousel();
      });
  }
};

export default fillEventCarousel;
