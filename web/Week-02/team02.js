// JavaScript Document

function clickButton(node) {
    node.innerHTML = 'Clicked!';
    alert('Clicked!');
}

$(document).ready(function() {

    $("#ColorSwitcher").click(function(){
        $("#UserColor").css("background-color", "yellow");
    });

});

/*function changeColor(choice, node) {
    color = document.getElementById(choice.id).value;
    
    document.getElementById(node.id).style.backgroundColor = color;

}*/