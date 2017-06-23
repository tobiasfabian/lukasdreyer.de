(function(){

  function handleScroll() {
    window.requestAnimationFrame(updateHeader);
  }

  function updateHeader() {
    const y = window.scrollY / 2 < maxY ? window.scrollY / 2 : maxY;
    headerElement.style.transform = 'translateY(-'+y+'px)';
  }

  function updateMaxY() {
    if (window.matchMedia('(max-width: 27.75em)').matches) {
      maxY = 102;
    } else {
      if (headerImgElement.offsetWidth > 0) {
        const headerImgWidth = headerImgElement.offsetWidth;
        maxY = 0.08173076923 * headerImgWidth;
      } else {
        headerImgElement.addEventListener('load', function() {
          const headerImgWidth = headerImgElement.offsetWidth;
          maxY = 0.08173076923 * headerImgWidth;
        });
      }
    }
    window.requestAnimationFrame(updateHeader);
  }

  const headerElement = document.querySelector('.header');
  const headerImgElement = headerElement.querySelector('img');
  let maxY = 85;

  updateMaxY();

  window.addEventListener('resize', updateMaxY);
  window.addEventListener('scroll', handleScroll);

})();
