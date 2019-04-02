var options = { weekday: 'short', year: 'numeric', month: 'short', day: 'numeric' };
var dt = new Date();
document.getElementById("date").innerHTML = dt.toLocaleDateString("en-GB", options);