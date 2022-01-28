/* ======================================================================================
!PROJECT NAME: Login Page(Front End / Back End task 1)
!DATE CREATED: 19 / SEPT / 2019
!CREATED BY: ADAMU FURA SULEIMAN
!File Name: main.js(Main JS File)
!DEVELOPED BY => adamufura98@gmail.com
!AN INTERN @Hotelsng
========================================================================================= */

function show_sign_up() {
  var hideSignIn = document.getElementById("container_login_id");
  hideSignIn.style.display = "none";
  var showSignUp = document.getElementById("container_sign_up_id");
  showSignUp.style.display = "block";
}

function show_log_in() {
  var hideSignUp = document.getElementById("container_sign_up_id");
  hideSignUp.style.display = "none";
  var showLogIn = document.getElementById("container_login_id");
  showLogIn.style.display = "block";
}

function mobile_log_in() {
  var hideWelcome = document.getElementById("container_welcome_id");
  hideWelcome.style.display = "none";
  var showLogInMobile = document.getElementById("container_login_id");
  showLogInMobile.style.display = "block";
}