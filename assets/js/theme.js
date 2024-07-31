const icon = document.querySelector("#icon");
const moon = document.querySelector("#moon");
const body = document.querySelector("body");

icon.onclick = ()=>{
    body.classList.toggle("light-theme");
    if (body.classList.contains("light-theme")) {
        icon.innerHTML = '<i class="fa fa-moon-o" id="moon"></i>'

    } else {
        icon.innerHTML = '<i class="fa fa-sun-o" id="moon"></i>'
        
    }
}