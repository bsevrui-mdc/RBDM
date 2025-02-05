var refreshButton = document.getElementById("refreshCaptcha");
var img = document.getElementById("captchaImage");

refreshButton.onclick = function() {
    img.src = '../includes/captcha.php?'+Date.now();
}