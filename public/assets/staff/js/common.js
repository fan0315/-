// 控制根元素字号
(function (doc, win) {
  var docEl = doc.documentElement;

  var resizeEvt = 'orientationchange' in window ?
    'orientationchange' :
    'resize';

  function recalc() {
    var clientWidth = docEl.clientWidth;
    if (!clientWidth) return;
    if (clientWidth >= 750) {
      docEl.style.fontSize = '100px';
    } else {
      docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
    }
  };

  if (!doc.addEventListener) return;

  win.addEventListener(resizeEvt, recalc, false);
  doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

$(function () {
  $('.header img').click(function() {
    window.history.back();
  })
  $('.put-away').click(function() {
    $('.footer').css('bottom', '-100px');
    $('.footer').css('transition', '.3s');
  })
  // 分享功能
  $('.dot').click(function () {
    $(this).find('.more').toggleClass('hidden');
    $(this).find('.tips').toggleClass('hidden');
  })
  $('.dot').click(function () {
    $(this).find('.del').toggleClass('hidden');
    $(this).find('.tips').toggleClass('hidden');
  })
  // 收藏切换功能
  $('.gray-star').click(function () {
    $(this).parent().addClass('active')
  })
  $('.yellow-star').click(function () {
    $(this).parent().removeClass('active')
  })
})
