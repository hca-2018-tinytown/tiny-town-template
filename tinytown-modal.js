'use strict';

const modal = document.getElementById('emailModal');
const closeBtn = document.getElementById('close-btn');
const noThanks = document.getElementById('no-thanks');
const emailLink = document.getElementById('email-link');
const header = document.getElementById('header');

// Close the modal when you click on the x button
closeBtn.onclick = function () {
  modal.style.display = "none";
  header.style = "";
}

// Close the modal when you click on 'no thanks'
noThanks.onclick = function () {
  modal.style.display = "none";
  header.style = "";
}

// Close the modal when you click anywhere outside the modal
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
    header.style = "";
  }
}

// Open the modal when you click on the email link
emailLink.onclick = function(){
    modal.style.display = "block";
    header.style = "z-index: 0;";
}

// Upon submission, poll for the success or error alerts
// and close the modal accordingly
window.addEventListener("load", function() {
    document.querySelector("input[name='emma_form_submit']").addEventListener("click", function(e) {
        if(document.querySelector(".emma-status")) {
            document.querySelector(".emma-status").remove();
        }

        var pollInterval = window.setInterval(function() {
            console.log("> polling");
            if(document.querySelector(".emma-status.emma-alert")) {
                console.log("> found error message");
                window.clearInterval(pollInterval);
            }
            else if(document.querySelector(".emma-status")) {
                console.log("> found success message");
                window.clearInterval(pollInterval);

                window.setTimeout(function() {
                    modal.style.display = "none";
                    header.style = "";
                }, 2000);
            }
        }, 250);
    });
});