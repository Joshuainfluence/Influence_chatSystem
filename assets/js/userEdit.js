setInterval(() => {
    let xhr = new XMLHttpRequest(); //creating XML object
    // xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                return data;
                // console.log(data);
                // if (!searchBar.classList.contains("active")) { // if active active not contains in search bar then add this active
                //     usersList.innerHTML = data;

                // } 
            }
        }
    }
    xhr.send();
}, 500); //this function will run frequently after 500ms