
function display($element){
  $element.empty(); //表示の初期化
}

function modalToggle(){
  $('.modal-area,.modal-bg').addClass('is-open');
  //クリックしたモーダルボタンと同じ番目のモーダルを表示する。addClassでis-openクラスを追加して表示する
　$('html, body').css('overflow', 'hidden');
  // overflow:hidden;の追加で背景のスクロール禁止に
}

function htmlDecode(input) {
  var doc = new DOMParser().parseFromString(input, "text/html");
  return doc.documentElement.textContent;
}

function fetch(url) {
  return $.ajax({
    type: 'GET',
    url: url,
    dataType: 'json'
  });
}

function createHtml(json) {
  var title = json.title.rendered;
  var artist = json.acf && json.acf.artist_name;
  var content = json.content.rendered;
  var cat = json.category_name.join(',&nbsp;');
  var h1 = $.trim(artist) ? artist  + ' / ' + title : title;

  var html = '';
  html += '<h1 class="entry-header">' + htmlDecode(h1)  + '</h1>';
  html += '<div class="entry-catecory">'+ cat + '</div>';
  html += '<div class="work-single-body">';
  html += '<div class="work-single-content">' + content + '</div>';
  html += '</div>';

  return html;
}

$(function () {
  const documentTitleArray = document.title.split('-').map(function(item) {
    return item.trim();
  });
  const documentTitle = documentTitleArray[documentTitleArray.length - 1];

  const api = '/wp-json/wp/v2/posts';
  const $inner = $('.work-entry-inner');

  $('.postitem-text').click(function() {
    var postId = $(this).attr('id') //クリックした投稿のid取得

    fetch(api + '/' + postId).done(function(json) {
      var postTitle = json.title.rendered;
      var artist = json.acf && json.acf.artist_name;
      var documentTitleArtist = artist ? artist + ' / ' : '';
      var html = createHtml(json);

      $inner.append(html);
      history.pushState('', '', '/' + postId + '/');
      document.title = document.title = documentTitleArtist + htmlDecode(postTitle) + ' - '  + documentTitle;;
    }).fail(function(json) {
      $inner.append("Sorry! this post is He's not home :(");
    });

    display($inner);
    modalToggle();
  });


  $('.closeModal, .modal-bg, .modal-close').click(function() { //closeModalかmodalBgをクリックした時に
    history.go(-1);
    document.title = documentTitle;
    $('.modal-area, .modal-bg').addClass('close-anime');

    setTimeout(function(){
      $('.modal-area, .modal-bg').removeClass('is-open');
      $('.modal-area, .modal-bg').removeClass('close-anime');
      $('html, body').removeAttr('style');
      display($inner);
    },1000);

    //モーダルを非表示にする。removeClassでis-openクラスを削除して非表示にする
    //追加したoverflow:hidden;を削除
    return false;
  });

});

$(function() {
  const userAgent = window.navigator.userAgent.toLowerCase();
  const hoverIn = function(){$(this).find('.postitem-text').css({'opacity':'1','transform': 'translateY(0%)'});}
  const hoverOut = function(){ $(this).find('.postitem-text').css({'opacity':'0','transform': 'translateY(100%)'});}
  $('.work-postitem').hover(hoverIn,hoverOut);

  if(userAgent === navigator.userAgent.indexOf('iPhone') > 0 ||
  navigator.userAgent.indexOf('iPod') > 0 ||
  (navigator.userAgent.indexOf('Android') > 0 &&
  navigator.userAgent.indexOf('Mobile') > 0) ||
  navigator.userAgent.indexOf('iPad') > 0 ||
  navigator.userAgent.indexOf('Android') > 0 ||
  navigator.userAgent.indexOf('Safari') > 0 &&
  navigator.userAgent.indexOf('Chrome') == -1 &&
  typeof document.ontouchstart !== 'undefined'){
    $('.work-postitem').bind('touchstart', hoverIn);
    $('.work-postitem').bind('touchend', hoverOut);
  }
})
