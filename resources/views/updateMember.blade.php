<!DOCTYPE html>
<html>
<head>
	<title>superceLL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="" href="css/styleUpdateProfile.css">
</head>
<body onload="renderTime();">
	<div class="top" >
		<div id="img1">
			<li><a href="memberPage"><img src="picture/logo.jpg"></a></li>
		</div>
		<div class="header">
			<ul>
				<li id="date"></li>
				<a id="clockDisplay"></a>
				<li id="userpengguna">Hi, {{Auth::user()->name}}</li>
            <li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</div>

	<div class="body_content">
		<div class="container">
			<div class="loginbox">
				<h1>Update Member</h1>
				<img src="picture/kelvin.jpg">
				<form action="{{URL::to('/updateMember')}}" method="POST">
					{{@csrf_field()}}
					<input type="text" name="name" placeholder="Name">
					<input type="Email" name="email" placeholder="Email">
					<!-- <input type="password" name="" placeholder="Password">
					<input type="password" name="" placeholder="Retype Password"> -->
					<input type="file" name="file" id="fileToUpload">
					<input type="radio" name="gender" value="male"> Male
					<input type="radio" name="gender" value="female"> Female
					<input type="date" name="birthday" placeholder="dd/mm/yyyy">
					<textarea name="address" cols="90" rows="5" placeholder="Address"></textarea>
					<input type="submit" name="" value="Update Member">
				</form>
			</div>
		</div>
		<script src="date.js"></script>
	</div>

	<div class="footer">
		<h4>superceLL &copy; 2018 | your daily dose | follow us | <img src="picture/fb.png"> <img src="picture/gp.png"> <img src="picture/ig.png"> <img src="picture/twitter.png"> <img src="picture/gh.png"></h4>
	</div>

</body>
<script type="text/javascript">
		function renderTime(){
			var mydate = new Date();
			var year = mydate.getYear();
			if (year < 1000) {
				year += 1900
			}
			var day = mydate.getDay();
			var month = mydate.getMonth();
			var daym = mydate.getDate();
			var dayArray = new Array("Sunday", "Monday", "Tuesday", "Wednesday","Thursday","Friday","Saturday");
			var monthArray = new Array("Januray","February","March","April","May","June","July","Agustus","September","October","November","December");

			var currentTime = new Date();
			var h = currentTime.getHours();
			var m = currentTime.getMinutes();
			var s = currentTime.getSeconds();

			if (h == 24) {
				h=0;
			}
			else if(h > 12){
				h = h - 0;
			}
			if(h < 10){
				h = "0" + h;
			}
			if(m < 10){
				m = "0" + m;
			}
			if (s < 10) {
				s = "0" + s;
			}

			var myClock = document.getElementById("clockDisplay");
			myClock.textContent = "" +dayArray[day]+ " " +daym+ " " +monthArray[month]+ " " +year+ " | " +h+ ":" +m+ ":" +s;
			myClock.innerText = "" +dayArray[day]+ " " +daym+ " " +monthArray[month]+ " " +year+ " | " +h+ ":" +m+ ":" +s;
			setTimeout("renderTime()", 1000);

		}
		renderTime();
	</script>
</html>