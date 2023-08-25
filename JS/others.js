$(document).ready(function(){
    const other_users_list = $(".other-users-list"); 

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../backend/others.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            console.log(data);
            other_users_list.html(data);
          }
      }
    xhr.send();
  }, 500);

});