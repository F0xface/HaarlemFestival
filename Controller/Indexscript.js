
    // Set the date we're counting down to
    var countDownDate = new Date("Jan 8, 2021 10:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var weeks = Math.floor(distance / (1000 * 60 * 60 * 24 * 7));
    var days = Math.floor((distance % (1000 * 60 * 60 * 24 * 7)) / (1000 * 60 * 60  * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60  * 24)) / (1000 * 60 * 60));

    // Output the result in an element with id="demo"
    document.getElementById("weeks").innerHTML = weeks + "<br>WEEKS";
    document.getElementById("days").innerHTML = days + "<br>DAYS";
    document.getElementById("hours").innerHTML = hours + " <br>HOURS ";

    // If the count down is over, write some text
    if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
}
}, 1000);