import './components/_header';
import './components/_dates';
import './components/_infoItems';

function isTouchDevice() {
  try {
    document.createEvent("TouchEvent");
    return true;
  } catch (e) {
    return false;
  }
}


if (isTouchDevice()) {
  document.querySelector('body').classList.add('is-touch');
  document.addEventListener('mousemove', () => {
    document.querySelector('body').classList.remove('is-touch');
  }, {
    passive: true,
    once: true,
  });
}
