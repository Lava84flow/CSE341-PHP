// JavaScript Document

function changeButton(node) {
    node.innerHTML = 'Clicked!';
    alert('Clicked!');
}

function changeColor(choice, node) {
    color = document.getElementById(choice.id).value;
    
    document.getElementById(node.id).style.backgroundColor = color;

}