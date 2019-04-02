<!DOCTYPE html>
<html>
<head>
	<title>superceLL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width initial-scale=1">
	<link rel="stylesheet" type="" href="{{asset('css/cartStylePayment.css')}}">
</head>
<body>
	<div class="top" >
		<div id="img1">
			<li><a href="memberPage"><img src="picture/logo.jpg"></a></li>
		</div>
		<!-- <div class="header-menu">
			<ul>
				<li>
					<a href="updateProfile">Update Profile</a>
				</li>
				<li>
					<a href="#">Phone List</a>
				</li>
				<li>
					
				</li>
				<li><a href="transactionHistory">Transaction History</a></li>
			</ul>
		</div> -->
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
			@foreach($query as $item)
			<p><h1>{{$item->name}}</h1><br><p>
			<div class="pic">
			<img src="{{asset('image/'.$item->image)}}" height="200" width="200">
			<div class="apl">
			Brand: {{$item->brand}} | Price: Rp.{{$item->afterDiscPrice}},- | Stock: {{$item->stock}} <br><br>
			</div>
			Description:<br>
			{{$item->description}}
			<br>
			<br>
			<form action="{{URL::to('/addPayment')}}" method="POST">
			{{@csrf_field()}}
			<input type="hidden" name="idUser" value="{{Auth::user()->id}}">
			<input type="hidden" name="idItem" value="{{$item->id}}">
			Qty:   <input type="number" name="qty"><br><br><br>
			<textarea name="comment" form="usrform" rows="4" cols="60" placeholder="Your Comment Here"></textarea><br>
			<h4><button id="btnAdd">Add to Cart</button></a></h4>
			</form>
			</div>
			@endforeach
		

	<div class="footer" style="margin-top: 5%">
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