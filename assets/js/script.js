/* Navbar scroll */
$(document).ready(function() {
  // Transition effect for navbar
  $(window).scroll(function() {
    // checks if window is scrolled more than 500px, adds/removes solid class
    if ($(this).scrollTop() > 750) {
      $(".navbar").addClass("solid");
    } else {
      $(".navbar").removeClass("solid");
    }
  });
});

/* Sign in verification */
function validation(form) {
  let inputs = form.querySelectorAll("input:not([type=file])");
  let returnValue = true;
  inputs.forEach(input => {
    if (input.value.trim().length == 0) {
      input.style.borderBottom = "1px solid red";
      returnValue = false;
    } else {
      input.style.borderBottom = "1px solid grey";
    }
  });
  return returnValue;
}
