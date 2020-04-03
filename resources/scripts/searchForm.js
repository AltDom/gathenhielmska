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

      return "/wordpress/wp-json/wp/v2/event?category=3,4";
    };

    const handleResponse = (res) => {
      console.log(res);
    };

    searchForm.addEventListener("submit", (e) => {
      e.preventDefault();
      // const form = new FormData(searchForm);
      const uri = getURI(searchForm);
      fetch(uri)
        .then((res) => res.json())
        .then((res) => handleResponse(res));
    });
  }
};

export default searchForm;
