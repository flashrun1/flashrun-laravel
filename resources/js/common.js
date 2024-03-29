//***video-bg***
const tag = document.createElement('script');
const firstScriptTag = document.getElementsByTagName('script')[0];
const videoID = document.querySelector('.video-bg-player').getAttribute('data-video');
const videoOverlay = document.querySelector('.video-bg-overlay');
const playerOptions = {
    autohide: 1,
    autoplay: 1,
    controls: 0,
    disablekb: 1,
    enablejsapi: 1,
    iv_load_policy: 3,
    loop: 1,
    modestbranding: 1,
    mute: 1,
    playlist: videoID,
    rel: 0,
    showinfo: 0
};

tag.src = "https://www.youtube.com/iframe_api";
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
let ytPlayer;
function onYouTubeIframeAPIReady() {
    ytPlayer = new YT.Player('yt-player', {
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        },
        height: '720',
        playerVars: playerOptions,
        width: '1280',
        videoId: videoID
    });
}
function onPlayerReady(event) {
    event.target.playVideo();
    const videoDuration = event.target.getDuration();
    setInterval(function() {
        const videoCurrentTime = event.target.getCurrentTime();
        const timeDifference = videoDuration - videoCurrentTime;
        if (2 > timeDifference > 0) {
            event.target.seekTo(0);
        }
    }, 1000);
}
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING) {
        videoOverlay.classList.add('video-bg-overlay--fadeOut');
    }
}


//***ISOTOPE***
// imageloaded for isotope
imagesLoaded( document.querySelector('.grid'), function( instance ) {
    const elem = document.querySelector('.grid');
    // init Isotope
    const iso = new Isotope( elem, {
        itemSelector: '.grid-item',
        layoutMode: 'masonry'
    });
});

// up btn scroll
// document.querySelector('#up-btn').onclick = function() {
//     window.scrollTo({ top: 0, left: 0, behavior: 'smooth' });
// }
// menu scroll
// window.addEventListener('load', () => {
//     document.querySelectorAll('.nav-link').forEach((element) => {
//       element.addEventListener('click', () => {
//         event.preventDefault();
//         let anchor = element.getAttribute('href');
//         window.scrollTo({ top: document.querySelector(anchor).offsetTop, left: 0, behavior: 'smooth' });
//       })
//     })
// });

// modal without jquery
function closeModal(modal) {
    const backdrop = document.querySelector('.modal-backdrop.fade.show');
    modal.setAttribute('aria-hidden', 'true');
    backdrop.classList.remove('show');
    setTimeout(() => {
      modal.classList.remove('show');
    });
    setTimeout(() => {
      modal.style.display = 'none';
      document.body.classList.remove('modal-open');
      backdrop.remove();
    }, 500);
}
function openModal(modal) {
    const backdrop = document.createElement('div');
    backdrop.classList.add('modal-backdrop', 'fade');
    document.body.classList.add('modal-open');
    document.body.appendChild(backdrop);
    modal.style.display = 'block';
    modal.setAttribute('aria-hidden', 'false', 'show');
    setTimeout(() => {
      modal.classList.add('show');
      backdrop.classList.add('show');
    });
}

window.addEventListener('load', () => {
    document.querySelectorAll('[data-toggle=modal]').forEach((element) => {
      element.addEventListener('click', () => {
        const target = element.dataset.target;
        const modal = document.querySelector(target);
        if (modal) {
          openModal(modal);
          $(modal).find('.event-subtype').each(function(i, obj){
              // console.log(i, $(obj), $(obj).hasClass('active-brand-color'));
              if ($(obj).hasClass('active-brand-color')) {
                  $(obj).trigger('click');
              }
          });
        }
      });
    });
    document.querySelectorAll('[data-dismiss=modal]').forEach((element) => {
      element.addEventListener('click', () => {
        const modal = document.querySelector('.modal.show');
        if (modal) {
          closeModal(modal);
        }
      });
    });
    document.querySelectorAll('.modal').forEach((modal) => {
      modal.addEventListener('click', (event) => {
        if (event.target === modal) {
          closeModal(modal);
        }
      });
    });
});

// mobile  menu
function displayMenu(event) {
    if (document.getElementById("collapseMenu").classList.contains("show")) {
        document.getElementById("collapseMenu").classList.remove("show")
        document.body.classList.remove('fixed');
        document.getElementById("navbar-toggler").classList.add("collapsed")
    }
    else {
        document.getElementById("collapseMenu").classList.add("show")
        document.body.classList.add('fixed');
        document.getElementById("navbar-toggler").classList.remove("collapsed")
    }
}

$(document).ready(function() {
    // equal height for items in row
    $('.equal-wrap .equal').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
    });

    // $('.nav-menu .nav-link').click(function() {
    //     $('#navbar-toggler').trigger('click');
    // });
});


