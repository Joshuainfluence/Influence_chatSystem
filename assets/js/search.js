const searchBar = document.querySelector("#searchBar"),
usersList = document.querySelector(".chats");

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;

    let xhr = new XMLHttpRequest();

    xhr.open("POST", "include/search.include.php", true);
    xhr.onload = ()=>{
        if (xhr.readyState == XMLHttpRequest.DONE) {
            if (xhr.status == 200) {
                let data = xhr.response;
                usersList.innerHTML = data; // Update the user list with the search results
                // console.log(data);
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + encodeURIComponent(searchTerm));
}