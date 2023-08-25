$(document).ready(function(){
    const clubs_list = $(".joined-clubs-list"); 
    //var info = $(".other-users-list .frnd .info");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "../backend/joined_clubs.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState == 4 && xhr.status){
            let data = xhr.response;
            //console.log(info.text());
            //if(info == "No new users available"){
              //friends_list.css("display","none");
            //}
            //else{
            //console.log(data)
            clubs_list.html(data);
            //}
          }
      }
    xhr.send();
  }, 500);

});