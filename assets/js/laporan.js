
function autocomplet() {

	var keyword = $('#tb1').val();
if(keyword == "user"){
   document.getElementById('nis').style.display = "block";
   document.getElementById('poin').style.display = "none";
  
}else if(keyword == "poin") {
    document.getElementById('poin').style.display = "block";
    document.getElementById('nis').style.display = "none";
  
}
}
