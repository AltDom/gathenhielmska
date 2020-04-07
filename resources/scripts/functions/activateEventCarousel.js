"use_strict";

const activateEventCarousel = () => {
  const eventCarousel = document.querySelector(".eventCarousel");
  if (eventCarousel != null) {
    if (eventCarousel.children.length === 0) {
      console.log(
        "activateEventCarousel.js row 7, add something here for handeling no events of same category available and carousel is empty"
      );
    }

    const carouselChildren = Array.from(eventCarousel.children);

    if (eventCarousel.children.length == 1) {
      carouselChildren.push(carouselChildren[0]);
    }

    //add copies to the ends
    eventCarousel.appendChild(carouselChildren[0].cloneNode(true));
    eventCarousel.appendChild(carouselChildren[1].cloneNode(true));
    eventCarousel.prepend(
      carouselChildren[carouselChildren.length - 1].cloneNode(true)
    );
    eventCarousel.prepend(
      carouselChildren[carouselChildren.length - 2].cloneNode(true)
    );

    const carouselItems = eventCarousel.children;
    const itemWidth = carouselItems[0].offsetWidth;

    //set the starting position of scroll
    eventCarousel.scrollLeft =
      itemWidth + (itemWidth - (window.innerWidth - itemWidth) / 2);

    //looping effect
    const handleScroll = e => {
      const offset = itemWidth - (window.innerWidth - itemWidth);
      let minScroll = itemWidth + offset;
      let maxScroll =
        itemWidth * (carouselItems.length - 1) - window.innerWidth;

      if (e.target.scrollLeft <= minScroll) {
        e.target.scrollLeft = maxScroll - 1;
      } else if (e.target.scrollLeft >= maxScroll) {
        e.target.scrollLeft = minScroll + 1;
      }
    };

    eventCarousel.addEventListener("scroll", handleScroll);
  }
};

export default activateEventCarousel;
