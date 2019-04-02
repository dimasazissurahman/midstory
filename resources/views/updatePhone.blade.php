<!DOCTYPE html>
<html>
<head>
	<title>superceLL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="" href="css/styleUpdateProfile.css">
	<link rel="stylesheet" type="" href="css/stlyeInsertPhone.css">
</head>
<body onload="renderTime();">
	<div class="top" >
		<div id="img1">
			<li><a href="adminPage"><img src="picture/logo.jpg"></a></li>
		</div>
			<div id="date">
				<li>
				</li>
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
				<h1>Update Phone</h1>
				<form action="{{URL::to('/updatePhone')}}" method="POST">
					{{@csrf_field()}}
					<input type="file" name="image" id="fileToUpload">
					<input type="text" name="name" placeholder="Name">
					
					<select name="brand">
						@foreach($brands as $brand)
							<option>{{$brand->name}}</option>
						@endforeach
					</select>
					
					<input type="textarea" name="description" placeholder="Description">
					<div class="test">
						<input type="text" name="price" id="test" placeholder="Input Price">
						<input type="text" name="discount" id="test" placeholder="Discount">
						<input type="text" name="stock" id="test" placeholder="Stock">
					</div>
					<input type="submit" name="" value="Update Phone">
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