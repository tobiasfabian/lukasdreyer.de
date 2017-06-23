(function(){

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

  function initialScroll() {
    const seperatorElement = listElement.querySelector('.event-thumb-seperator');
    if (window.matchMedia('(max-width: 55.5em)').matches) {
      if (element.classList.contains('is-list-only')) {
        const bodyElement = getBody();
        setTimeout(function() {
          bodyElement.scrollTop = seperatorElement.offsetTop + 145;
        }, 500);
      }
    } else {
      listElement.scrollTop = seperatorElement.offsetTop - 185+40;
    }
  }

  const element = document.querySelector('.dates');
  if (element) {

    var listElement = element.querySelector('.dates-list');
    var showElement = element.querySelector('.show');

    updateListHeight();
    initialScroll();

    window.addEventListener('resize', updateListHeight);

  }

})();
