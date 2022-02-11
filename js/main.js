window.alert("Currently not Open");

$('#b1').click(function(){
	$('#para1').show('slow');

});

let mybutton = document.getElementById("btnscroll");
window.onscroll = function () {
  scrollFunction();
};


function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20 // perdoruesi ban scroll 20px prej fillmit dhe shfaqet butoni 
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}



// kur klikohet butoni faqja kthehet ne fillim 

mybutton.addEventListener("click", backToTop);
function backToTop() {

  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
  
}