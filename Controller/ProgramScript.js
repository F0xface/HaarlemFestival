date_buttons = window.document.getElementsByClassName("date_buttons");
elements = window.document.getElementsByClassName("event");
LandingButton();

function normal_dates(){
    for(const btn of date_buttons) {btn.style.backgroundColor = "white"}
    for(const btn of date_buttons) {btn.style.color = "black"}
    for(const el of elements) {el.style.display = "none"}
}

function color_buttons(date_button){
    normal_dates();
    document.getElementById(date_button).style.backgroundColor='black';
    document.getElementById(date_button).style.color='white';
    var events = document.getElementsByClassName(date_button);
    for (var i = 0; i < events.length; i++) {
        events[i].style.display = 'flex';
    }
}

function LandingButton(){
    var firstButton = document.getElementsByClassName("first_button")[0].id;
    color_buttons(firstButton);
}
