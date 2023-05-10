var dropdowns = document.getElementsByClassName('dropdown-toggle');

$(document).ready(function() {
    dropdowns.array.forEach(element => element.addEventListener("mouseover", function(event){
        console.log(event);
    }));
});