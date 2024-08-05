const form = document.querySelector(".login-col form"),
    continueBtn = form.querySelector(".form-content .button"),
    errorText = form.querySelector(".error-txt");

let audio = document.querySelector('#audio');

form.onsubmit = (e) => {
    e.preventDefault(); //preventing form from submitting
}

continueBtn.onclick = () => {
    console.log("clicked");
    // starting AJAX
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "include/signup.include.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                    location.href = "home.php";
                } else {
                    // errorText.textContent = data;
                    console.log("Big Error");
                    audio.classList.add("on");

                    // errorText.style.display = "block";

                }
            }
        }
    }
    // we have to send the form data through AJAX to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData); //sending thr formData to php
}
