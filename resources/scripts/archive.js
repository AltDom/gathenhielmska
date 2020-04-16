"use_strict";

const mediaSelection = () => {
  const mediaSelect = document.querySelector(".mediaSelect");
  if(mediaSelect) {

    const pictures = mediaSelect.querySelector(".pictures");
    const videos = mediaSelect.querySelector(".videos");
    const divider = mediaSelect.querySelector(".divider");
    pictures.style.margin = "20px 0 10px 100px";
    videos.style.margin = "20px 100px 10px 0";
    divider.style.margin = "20px 0 10px 0";

    const toggleMedia = () => {
      const mediaSelect = document.querySelector(".mediaSelect");
      const pictures = mediaSelect.querySelector(".pictures");
      const videos = mediaSelect.querySelector(".videos");
      pictures.classList.toggle("active");
      videos.classList.toggle("active");
    };

    // insert container with floral divider and text
    function insertAfter(element, referenceNode) {
      referenceNode.parentNode.insertBefore(element, referenceNode.nextSibling);
    }
    const htmlContent = document.createElement('div');
    htmlContent.classList.add("news-container");
    htmlContent.innerHTML = `<img src="/themes/gathenhielmska_theme/assets/images/floral-divider.png" alt="floral-divider">
    <p>På vår youtube finns även en livefunktion om möjlighet inte finns att besöka oss. Här ser ni våra senaste uppladdningar.</p>`;
    insertAfter(htmlContent, mediaSelect);

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
    seeMore.innerHTML = `SE FLER    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1 1L11 11L21 1" stroke="black"/>
      </svg>`;

    const seeMoreVideos = document.querySelector(".sby_btn_text");
    seeMoreVideos.classList.add("seeMoreStyling");
    seeMoreVideos.innerHTML = `SE FLER    <svg width="22" height="12" viewBox="0 0 22 12" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M1 1L11 11L21 1" stroke="black"/>
      </svg>`;
    seeMoreVideos.addEventListener("click", () => {
      setTimeout(function (){
        const youtubeItems = document.querySelectorAll(".sby_item");
        youtubeItems.forEach(youtubeItem => {
          youtubeItem.style.setProperty('width', '90%', 'important');
          youtubeItem.style.margin = '15px 20px 15px 20px';
        });
      }, 200);
    })
    const youtubeItems = document.querySelectorAll(".sby_item");
    youtubeItems.forEach(youtubeItem => {
      youtubeItem.style.setProperty('width', '90%', 'important');
      youtubeItem.style.margin = '15px 20px 15px 20px';
    });
    const youtubeVideos = document.querySelector(".sb_youtube");
    youtubeVideos.style.setProperty('width', '90%', 'important');
    youtubeVideos.style.padding = "0 0 16px 0";

    setMediaEventListener();
  };
};

export default mediaSelection;
