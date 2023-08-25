$(document).ready(function(){
    const other_clubs_list = $(".other-clubs-list"); 

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../backend/other_clubs.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            console.log(data);
            other_clubs_list.html(data);
          }
      }
    xhr.send();
  }, 200);

});