$(document).ready(function(){
     $(".report .btn").click(function(){
        var form = document.getElementById("report-form");
        var mail = $(".report .mail").val();
        var issue = $(".report .msg").val();

        let xhr = new XMLHttpRequest();
        xhr.open("POST","../backend/report.php",true);
        xhr.onload = ()=>{
            let data = xhr.response;
            console.log(data);
        }
        var Dat  = new FormData(form);
        xhr.send(Dat);
     });
});