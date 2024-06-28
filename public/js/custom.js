// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();


// slide
var slideShow = document.getElementById('slide-show');
var slides = document.getElementsByClassName('slide');
var indexSlide = 0;

function slideBox(){
    indexSlide = (indexSlide+1)%slides.length;
    var translateX = -indexSlide * slides[0].offsetWidth;
    slideShow.style.transform = "translate3d("+translateX+"px,0px,0px)";
}

setInterval(slideBox,5000);


