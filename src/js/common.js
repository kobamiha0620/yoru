

let vw = window.innerWidth;
//ウィンドウの高さを取得
const setFillHeight = function ()  {
  const vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', vh + 'px');
}

const changeVideoSrc = function(e, video) {
  const isPc = e.matches;
  if (video) {
    video.src = isPc ? video.dataset.pcSrc : video.dataset.spSrc;
  }
}

class MovieModal {
  constructor() {
    this.createModalElement();
    this.loadApi();
    this.player;
  }
  createModalElement() {
    const modalStr = `
      <div id="movie-overlay" class="modal-movie-bg"></div>
      <div id="movie-dialog" class="modal-movie-dialog">
        <div id="movie-player"></div>
      </div>
    `;
    $('body').append(modalStr);

    this.overlay = document.getElementById('movie-overlay');
    this.movie = document.getElementById('movie-dialog');
    this.closeModal();
  }
  loadApi() {
    const tag = document.createElement('script');
    const firstScriptTag = document.getElementsByTagName('script')[0];

    tag.src = 'https://www.youtube.com/iframe_api';
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
  }
  onYouTubeIframeAPIReady(id) {
    this.player = new YT.Player('movie-player', {
      videoId: id,
      playerVars: {
        'autoplay': 1,
        'controls': 1
      }
    });
  }
  openModal(id) {
    const timer = this.player ? 500 : 0;

    this.overlay.classList.add('is-open');
    this.movie.classList.add('is-open');

    if (this.player) {
      setTimeout(() => {
        this.player.playVideo();
      }, timer);
    } else {
      this.onYouTubeIframeAPIReady(id);
    }
  }
  closeModal() {
    this.overlay.addEventListener('click', () => {
      this.player.pauseVideo();
      this.overlay.classList.remove('is-open');
      this.movie.classList.remove('is-open');
    });
  }
}

// 初期化
setFillHeight();

window.addEventListener('DOMContentLoaded', () => {
  // MagicGrid
  let isTab = vw > 768;

  $('.worklist').imagesLoaded(function() {
    if (this.elements.length === 0) return;

    let msnry = new Masonry(this.elements[0], {
      itemSelector: '.worklist__blc',
      // gutter: 12,
      percentPosition: true,  

    });
  });

  const headerMenu = document.getElementById('header-menu');
  const menuOpen = document.getElementById('open-menu');
 const header = document.getElementById('g-header');
 const movieModalBtn = document.getElementById('open-movie-modal');
 const movieModalBtnPc = document.getElementById('open-movie-modal-pc');
 const movieModalBtnAbout = document.getElementById('open-movie-modal-about');


  const movieModal = new MovieModal();

  headerMenu.addEventListener('click', function(){
    if(headerMenu.classList.contains('active')){
      headerMenu.classList.remove('active');
      menuOpen.classList.remove('panelactive');
      // headerMenu.style.pointerEvents = 'auto';
      header.classList.remove('-menu-open');
  　　 $('html, body').removeAttr('style'); 

    }else{
      console.log('no');

      headerMenu.classList.add('active');
      menuOpen.classList.add('panelactive');
      // headerMenu.style.pointerEvents = 'none';
      header.classList.add('-menu-open');
      $('html, body').css('overflow', 'hidden');
    }

  });

  movieModalBtnPc.addEventListener('click', function(e) {
    movieModal.openModal(e.target.dataset.movieId);
  });

  movieModalBtn.addEventListener('click', function(e) {
    movieModal.openModal(e.target.dataset.movieId);
  });

  if (movieModalBtnAbout) {
    movieModalBtnAbout.addEventListener('click', function(e) {
      movieModal.openModal(e.target.dataset.movieId);
    });
  }


  $('.menu-links').click(function(e){
    if (!e.target.dataset && !e.target.dataset.movieId) {
      $('#open-menu').fadeOut();
      headerMenu.style.pointerEvents = 'auto';
      header.classList.remove('-menu-open');
      headerMenu.innerHTML = 'Menu';
     $('html, body').removeAttr('style');
    }
   });

  mqList.addEventListener('change', function(e) {
    changeVideoSrc(e, heroVideo);
  });

  changeVideoSrc(mqList, heroVideo);
});

$(window).on('load', function(){
  setTimeout(function(){
    $('.loading').fadeOut('fast');
  },500);
});

window.addEventListener('resize', function () {
  const mqList = window.matchMedia('(min-width:768px)');
  const headerMenu = document.getElementById('header-menu');
  const menuOpen = document.getElementById('open-menu');
  const heroVideo = document.getElementById('hero-video');
  const movieModalBtn = document.getElementById('open-movie-modal');
  const movieModalBtnPc = document.getElementById('open-movie-modal-pc');
  const movieModalBtnAbout = document.getElementById('open-movie-modal-about-pc');
  const movieModalBtnAboutPc = document.getElementById('open-movie-modal-about');
  const header = document.getElementById('g-header');

  if (vw === window.innerWidth) {
  　// 画面の横幅にサイズ変動がないので処理を終える
    return;
  }
  // 画面の横幅のサイズ変動があった時のみ高さを再計算する
  vw = window.innerWidth;
  if(headerMenu.classList.contains('active')){
    
    headerMenu.classList.remove('active');
    menuOpen.classList.remove('panelactive');
    // headerMenu.style.pointerEvents = 'auto';
    header.classList.remove('-menu-open');
　　 $('html, body').removeAttr('style'); 
  }
  setFillHeight();
});


// window.onload = function() {
//   const headerMenu = document.getElementById('header-menu');

//   headerMenu.addEventListener('click', function(){
  

//     // headerMenu.style.pointerEvents = 'none';
//     // header.classList.add('-menu-open');
//     // headerMenu.innerHTML = 'close';
//     // $('html, body').css('overflow', 'hidden');
//   });
  
  
// }




// var elem = document.querySelector('.worklist__inner');
// var msnry = new Masonry( elem, {
//   // options
//   itemSelector: '.worklist__blc'
// });

