"use_strict";

const searchForm = () => {
  const searchForm = document.querySelector(".search-form");
  if (searchForm != null) {
    const categoryBtn = searchForm.querySelector(".options .category-options");
    const categories = searchForm.querySelector(".categories");

    categoryBtn.addEventListener("click", () => {
      categories.classList.toggle("hidden");
    });
  }
};

export default searchForm;
