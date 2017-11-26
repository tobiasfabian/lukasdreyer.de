(function(){
  function handleTouchStart() {
    if (this.dataset.i === '1' || this.dataset.i === '4') {
      this.classList.add('is-visible');
    } else if (this.dataset.i === '2' || this.dataset.i === '3') {
      this.classList.add('is-invisible');
    }
  }
  function handleTouchEnd() {
    if (this.dataset.i === '1' || this.dataset.i === '4') {
      this.classList.remove('is-visible');
    } else if (this.dataset.i === '2' || this.dataset.i === '3') {
      this.classList.remove('is-invisible');
    }
  }
  const infoItemElements = document.querySelectorAll('.info__item');
  [...infoItemElements].forEach((element, i) => {
    element.dataset.i = i + 1;
    element.addEventListener('touchstart', handleTouchStart, {passive: true});
    element.addEventListener('touchend', handleTouchEnd, {passive: true});
    element.addEventListener('touchcancel', handleTouchEnd, {passive: true});
  });
})();
