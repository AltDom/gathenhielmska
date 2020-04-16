"use_strict";

const createNewsBox = post => {
  const newsBox = document.createElement("div");
  newsBox.classList.add("news-post-box");

  const date = new Date(post.date);
  const day = date.getDate();
  const month = ("0" + (date.getMonth() + 1)).slice(-2);
  const year = date
    .getFullYear()
    .toString()
    .substr(-2);

  const fullDate = `${day}/${month}-${year}`;

  newsBox.innerHTML = `<div class="news-post-box">
  <img class="news-img" src="${post.acf.image}" alt="">
  <div class="news-title-date">
      <a href="${post.link}">
          <h2 class="news-title">${post.title.rendered}</h2>
      </a>
      <p class="news-date">${fullDate}</p>
  </div>
  <p class="news-tagline"><b>${post.acf.tagline}</b></p>
  <p class="news-text">${post.acf.description}</p>
    <a class="readMoreContainer" href="${post.link}">
      <h2 class="readMoreLink">LÄS MER HÄR</h2>
    </a>
</div>`;

  return newsBox;
};

export default createNewsBox;
