function getBody() {
  document.documentElement.scrollTop += 1;
  const body = (document.documentElement.scrollTop !== 0) ? document.documentElement : document.body;
  document.documentElement.scrollTop -= 1;
  return body;
}

function updateListHeight() {
  if (showElement && showElement.offsetHeight > listElement.offsetHeight) {
    const height = showElement.offsetHeight + element.offsetTop;
    listElement.style.maxHeight = height+'px';
  }
}

const element = document.querySelector('.dates');
if (element) {

  var listElement = element.querySelector('.dates-list');
  var showElement = element.querySelector('.show');
  var datesListScrollTop = sessionStorage.getItem('datesListScrollTop');

  updateListHeight();

  if (datesListScrollTop) {
    listElement.scroll({
      top: datesListScrollTop,
    });
  }

  window.addEventListener('resize', updateListHeight, {passive: true});
  listElement.addEventListener('scroll', () => {
    sessionStorage.setItem('datesListScrollTop', listElement.scrollTop);
  }, {passive: true});
}
