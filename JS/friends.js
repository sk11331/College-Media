$(document).ready(function(){
    const friends_list = $(".friends-list"); 
    //var info = $(".other-users-list .frnd .info");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../backend/friends.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            friends_list.html(data);
          }
      }
    xhr.send();
  }, 500);

});