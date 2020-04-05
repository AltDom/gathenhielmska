"use_strict";

const searchForm = () => {
  const searchForm = document.querySelector(".searchForm");
  if (searchForm != null) {
    const categoryBtn = searchForm.querySelector(
      ".searchForm__options__categoryBtn"
    );
    const orderBtn = searchForm.querySelector(".searchForm__options__orderBtn");
    const categoryList = searchForm.querySelector(".searchForm__categoryList");
    const orderList = searchForm.querySelector(".searchForm__orderList");

    categoryBtn.addEventListener("click", () => {
      categoryList.classList.toggle("hidden");
      orderList.classList.add("hidden");
    });

    orderBtn.addEventListener("click", () => {
      orderList.classList.toggle("hidden");
      categoryList.classList.add("hidden");
    });

    const getURI = (form) => {
      const inputs = form.querySelectorAll("input");
      let postType = "";
      let category = "";

      Array.from(inputs).forEach((input) => {
        console.log(input);
        if (input.name === "type") {
          postType += input.value;
        }
        if (input.name === "category" && input.checked === true) {
          if (category === "") {
            category += `?category=${input.value}`;
          } else {
            category += `,${input.value}`;
          }
        }
      });

      const testUri =
        "testURI: /wordpress/wp-json/wp/v2/" + postType + category;
      console.log(testUri);

      //uri for posts example
      ///wordpress/wp-json/wp/v2/posts?category=3,2&order=desc&per_page=5&page=2

      //search verkar vara slug
      return "/wordpress/wp-json/wp/v2/event?category=3&compare=>&order=asc&per_page=2&page=1&search=rock";
    };

    const handleResponse = (res) => {
      console.log(res);
    };

    searchForm.addEventListener("submit", (e) => {
      e.preventDefault();
      const uri = getURI(searchForm);
      fetch(uri)
        .then((res) => res.json())
        .then((res) => handleResponse(res));
    });
  }
};

export default searchForm;
