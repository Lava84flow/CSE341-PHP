// JavaScript Document

function clickButton(node) {
    node.innerHTML = 'Clicked!';
    alert('Clicked!');
}

$(document).ready(function() {

    
    $("#ColorSwitcher").click(function(){
//        alert("Value: " + $("#ColorIn").val());
        var newColor = $("#ColorIn").val();
        $("#UserColor").css("background-color", newColor);
    });

});

/*function changeColor(choice, node) {
    color = document.getElementById(choice.id).value;
    
    document.getElementById(node.id).style.backgroundColor = color;

}*/