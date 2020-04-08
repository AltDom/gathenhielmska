"use_strict";
import createEventCard from "./functions/createEventCard";
import activateEventCarousel from "./functions/activateEventCarousel";

const fillEventCarousel = () => {
  const eventCarousel = document.querySelector(".eventCarousel");
  if (eventCarousel != null) {
    let uri = "/wordpress/wp-json/wp/v2/event?compare=>&order=asc&per_page=5";
    const singleEvent = document.querySelector(".singleEvent");

    if (singleEvent) {
      const eventId = document.querySelector(".eventId").value;
      const categoryIds = document.querySelector(".categoryIds").value;
      uri = `/wordpress/wp-json/wp/v2/event?category=${categoryIds}&compare=>&order=asc&per_page=5&exclude=${eventId}`;
    }

    fetch(uri)
      .then(res => res.json())
      .then(res => {
        res.forEach(event => {
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
