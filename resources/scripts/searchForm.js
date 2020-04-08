("use_strict");
import createEventCard from "./functions/createEventCard";

const searchForm = () => {
  const searchForm = document.querySelector(".searchForm");
  if (searchForm != null) {
    const categoryBtn = searchForm.querySelector(
      ".searchForm__options__categoryBtn"
    );
    //form buttons
    const orderBtn = searchForm.querySelector(".searchForm__options__orderBtn");
    const categoryList = searchForm.querySelector(".searchForm__categoryList");
    const orderList = searchForm.querySelector(".searchForm__orderList");
    const loadMoreBtn = document.querySelector(".loadMoreBtn");
    const noMoreMessage = document.querySelector(".noMoreMessage");
    const eventContainer = document.querySelector(".eventContainer");

    categoryBtn.addEventListener("click", () => {
      categoryList.classList.toggle("hidden");
      orderList.classList.add("hidden");
    });

    orderBtn.addEventListener("click", () => {
      orderList.classList.toggle("hidden");
      categoryList.classList.add("hidden");
    });

    //getting json data
    let uri = "";
    let postType = "";
    let page = 2;

    const createUri = form => {
      const inputs = form.querySelectorAll("input");
      let category = "";
      let order = "";
      let search = "";

      Array.from(inputs).forEach(input => {
        if (input.name === "type") {
          postType = input.value;
        }
      });

      Array.from(inputs).forEach(input => {
        if (input.name === "category" && input.checked === true) {
          if (category === "") {
            category = `category=${input.value}`;
          } else {
            category += `,${input.value}`;
          }
        }

        if (input.name === "order" && input.checked === true) {
          if (postType === "event") {
            if (input.value === "old") {
              order = "compare=<&order=desc";
            } else {
              order = "compare=>&order=asc";
            }
          }
          if (postType === "posts") {
            if (input.value === "old") {
              order = "order=asc";
            } else {
              order = "order=desc";
            }
          }
        }

        if (input.name === "search") {
          if (input.value.length > 0) {
            search = `search=${input.value}`;
          }
        }
      });

      const args = [category, order, search].filter(arg => arg.length > 0);
      const queryString = `${postType}?${args.join("&")}`;

      return `/wordpress/wp-json/wp/v2/${queryString}&per_page=5`;
    };

    const handleResponse = res => {
      if (res.length === 0 || res.length === undefined) {
        loadMoreBtn.classList.add("hidden");
        noMoreMessage.classList.remove("hidden");
        return;
      }
      if (postType === "event") {
        res.forEach(event => {
          const eventCard = createEventCard(event);
          eventContainer.appendChild(eventCard);
        });
      }

      if (postType === "posts") {
        //append posts
      }
    };

    searchForm.addEventListener("submit", e => {
      e.preventDefault();
      uri = createUri(searchForm);
      page = 2;
      eventContainer.innerHTML = "";
      loadMoreBtn.classList.remove("hidden");
      noMoreMessage.classList.add("hidden");

      fetch(uri)
        .then(res => res.json())
        .then(res => handleResponse(res));
    });

    loadMoreBtn.addEventListener("click", () => {
      const nextPage = uri + `&page=${page}`;
      page++;
      console.log(nextPage);

      fetch(nextPage)
        .then(res => res.json())
        .then(res => handleResponse(res));
    });

    //submit form on page load with submit-event
    searchForm.requestSubmit();
  }
};

export default searchForm;
