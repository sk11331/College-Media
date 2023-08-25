$(document).ready(function () {
    const searchBar = $(".search-bar input");
    const search_list = $(".search-clubs-list");
    //console.log('hi');
    searchBar.keyup(function () {
        let searchTerm = searchBar.val();
        console.log(searchTerm);

        if (searchTerm.trim() == "") {
            search_list.css("display", "none");
        }
        else {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "../backend/club_search.php", true);
            xhr.onload = () => {
                //let msg = "No results found";
                let data = xhr.response;
                search_list.css("display", "block");
                search_list.html(data);
                //console.log(data);
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("searchTerm=" + searchTerm);
        }
    });
});