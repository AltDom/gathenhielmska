"use_strict";


const mediaSelection = () => {
  const mediaSelect = document.querySelector(".mediaSelect");
  if(mediaSelect) {

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
      const youtubeVideos = document.querySelector(".sb_youtube");
      if (mediaSelect.querySelector(".videos.active")) {
        instagramPictures.classList.add("display-none");
        youtubeVideos.classList.remove("display-none");
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
        setTimeout(function (){
          youtubeVideos.classList.add("display-none");
        }, 100);
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

    const seeMoreVideos = document.querySelector(".sby_btn_text");
    seeMoreVideos.classList.add("seeMoreStyling");
    seeMoreVideos.innerHTML = `se fler    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1 1L11 11L21 1" stroke="black"/>
      </svg>`;
    seeMoreVideos.addEventListener("click", () => {
      setTimeout(function (){
        const youtubeItems = document.querySelectorAll(".sby_item");
        youtubeItems.forEach(youtubeItem => {
          youtubeItem.style.width = '90%';
          youtubeItem.style.margin = '15px 20px 15px 20px';
          youtubeItem.style.zIndex = '0';
        });
      }, 100);
    })
    const youtubeItems = document.querySelectorAll(".sby_item");
    youtubeItems.forEach(youtubeItem => {
      youtubeItem.style.width = '90%';
      youtubeItem.style.margin = '15px 20px 15px 20px';
      youtubeItem.style.zIndex = '0';
    });
    const youtubeVideos = document.querySelector(".sb_youtube");
    youtubeVideos.style.padding = "0 0 16px 0";

    setMediaEventListener();
  };
};

export default mediaSelection;
