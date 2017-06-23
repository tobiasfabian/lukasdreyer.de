// @codekit-prepend 'components/_header.js'
// @codekit-prepend 'components/_dates.js'
// @codekit-prepend 'components/_infoItems.js'

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
}
