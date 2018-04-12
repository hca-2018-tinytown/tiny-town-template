'use strict';

const modal = document.getElementById('emailModal');
const closeBtn = document.getElementById('close-btn');
const noThanks = document.getElementById('no-thanks');

// Close the modal when you click on the x button
closeBtn.onclick = function () {
  modal.style.display = "none";
}

// Close the modal when you click on 'no thanks'
noThanks.onclick = function () {
  modal.style.display = "none";
}

// Close the modal when you click anywhere outside the modal
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
