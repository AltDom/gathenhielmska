"use_strict";


const mediaSelection = () => {

  const toggleMedia = () => {
    const mediaSelect = document.querySelector(".mediaSelect");
    const pictures = mediaSelect.querySelector(".pictures");
    const videos = mediaSelect.querySelector(".videos");
    pictures.classList.toggle("active");
    videos.classList.toggle("active");
  };

  const setMediaEventListener = () => {
    const mediaSelect = document.querySelector(".mediaSelect");
    const pictures = mediaSelect.querySelector(".pictures");
    const videos = mediaSelect.querySelector(".videos");
    const instagramPictures = document.getElementById("sb_instagram");
    if (mediaSelect.querySelector(".videos.active")) {
      instagramPictures.classList.add("display-none");
      const newVideos = videos.cloneNode(true);
      newVideos.classList.add("active");
      videos.parentNode.replaceChild(newVideos, videos);
      pictures.addEventListener("click", () => {
        toggleMedia();
        setMediaEventListener();
      });
    }
    if (mediaSelect.querySelector(".pictures.active")) {
      instagramPictures.classList.remove("display-none");
      const newPictures = pictures.cloneNode(true);
      newPictures.classList.add("active");
      pictures.parentNode.replaceChild(newPictures, pictures);
      videos.addEventListener("click", () => {
        toggleMedia();
        setMediaEventListener();
      });
    }
  };

  const seeMore = document.querySelector(".sbi_btn_text");
  seeMore.classList.add("seeMoreStyling");
  seeMore.innerHTML = `se fler    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 1L11 11L21 1" stroke="black"/>
    </svg>`;



  setMediaEventListener();
};

export default mediaSelection;
