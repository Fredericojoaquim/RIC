let count = 1;

document.getElementById('radio1').checked = true;

setInterval(function() {
    nextImage();
}, 2500)

function nextImage() {
    hideSlide();
    count++;
    if (count > 3){
        count = 1;
    }
    showSlider();
}

const slider = document.querySelectorAll('.slide');

function hideSlide() {
    slider.forEach(item => item.classList.remove('first'));
}

function showSlider(){
    slider[count-1].classList.add('first');
    if (count > 3){
        count = 1;
    } else {
        document.getElementById("radio"+count).checked = true;
    }
}
