"use_strict";

const searchForm = () => {
  const searchForm = document.querySelector(".searchForm");
  if (searchForm != null) {
    const categoryBtn = searchForm.querySelector(
      ".searchForm__options__categoryBtn"
    );
    const orederBtn = searchForm.querySelector(
      ".searchForm__options__orderBtn"
    );
    const categoryList = searchForm.querySelector(".searchForm__categoryList");

    categoryBtn.addEventListener("click", () => {
      categoryList.classList.toggle("hidden");
    });
  }
};

export default searchForm;
