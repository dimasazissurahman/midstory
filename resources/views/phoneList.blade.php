<!DOCTYPE html>
<html>
<head>
	<title>Phone List</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="" href="css/phoneList.css">
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous"> -->
</head>
<body onload="renderTime();">
	<div class="top">
		<ul class="header">
			<div class="logo">
				<li><a href="memberPage"><img src="picture/logo.jpg"></a></li>
			</div>
			<div id="date">
				<li>
				</li>
			</div>
				<li id="date"></li>
				<a id="clockDisplay"></a>
				<li id="userpengguna">Hi, {{Auth::user()->name}}</li>
            <li><a href="/logout">Logout</a></li>
		</ul>
	</div>

	<div class="container">
		<div>
			<hr>
		</div>
		<h2>Phone List</h2>
		<div class="search">
			<div class="search-bar">
	        	<input placeholder="test" id="x"/>
	        	<label for="x"> <i class="fa fa-user"></i> </label>
     	 	</div>
	     	<div class="search-button">
	     	 	<input type="submit" name="" value="Search">
	     	</div>
		</div>

		<div class="card-container">
			@foreach($items as $item)
			<div class="card">
			  <img src="{{'image/'.$item->image}}" height="100" width="200">
			  <div class="">
			    <h3 id="">Name: {{$item->name}}</h3> 
			    <p>Price: Rp.{{$item->price}},-</p> 
			    <p>Disc: {{$item->discount}}%</p>
			    <p>After Disc: Rp.{{$item->afterDiscPrice}},-</p>
			    <form action="{{URL::to('/addToCart/'.$item->id)}}" method="POST">
			    	{{@csrf_field()}}
			    <button type="submit">Buy</button>
			    </form>
			  </div>
			</div>
			@endforeach
		</div>
		<script src="date.js"></script>
	</div>


	<div class="footer">
		<h4>superceLL &copy; 2018|your daily dose|follow us|<img src="picture/fb.png"><img src="picture/gp.png"><img src="picture/ig.png"><img src="picture/twitter.png"><img src="picture/gh.png"></h4>
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