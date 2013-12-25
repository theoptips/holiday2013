<html>
<head>
	<title>Dilys' Holiday '13</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="data.json"></script>
	<!--<script src="http://cacpg.herokuapp.com/js/demos/snowfall.min.js"></script>-->
	<script type="text/javascript" src="snowfall.min.js"></script>
</head>
<body>
	<!-- static -->
	<section class="box">
		<div><h1>'Tis the Holiday Season . . .  </h1></div>
		<img src="http://farm6.staticflickr.com/5489/11544209786_ae2d1b9500_h.jpg">
	</section>


	<section class="box">
		<div><h1>Dear Kathleen</h1></div>
		<div><h1>Merry Xmas!</h1></div>
		<img src="http://farm8.staticflickr.com/7421/11544448535_b9df2433a6_n.jpg">
	</section>
	<section class="box">
		<div><h1>Sushi was delicious!</h1></div>
		<img src="http://farm8.staticflickr.com/7331/11356775695_b6a97cfdf7_h.jpg">
	</section>
	<section class="box">
		<div><h1>Giraffes loved us!</h1></div>
		<img src="http://farm4.staticflickr.com/3821/11544958656_8cabed668e_h.jpg">
	</section>
	<section class="box">
		<p>Another year raced by. Our journey together has been incredibly rich, 
			though we have only met for a short while. Thank you for making a special
			trip to San Francisco, and showing me a brand new San Diego. Each year, we
			create so many memories, exchange so many emotional moments! I love it!
			It's been an honor to be on this journey with you. Congratulations on completing
			STEP exams. Congrats on making strides towards fulfilling a special dream
			of becoming a doctor. Graduation is almost here. I wonder where would you choose to
			complete your residency. Should it be the bay area. It would be absolutely
			incredible! San Francisco loves you. xoxo
		</p>
	</section>
	<section class="box"></section>
	<script type="text/javascript">
		$(document).ready(function(){
			snowFall.snow($("section"), {
	        minSize: 1,
	        maxSize: 8,
	        round: true,
	        minSpeed: 1,
	        maxSpeed: 3,
	        flakeCount: 120
		    });



			 $.getJSON( "data.json")
		        .done(function( json ) {
			        // console.log( "success" ); //debug
			        // console.log(json); //debug
			        // var jsonData = json;
			      	// var items = [];
							$.each(json, function(count){
							// addPersonToPage(json[count]);
							});
		        })
			      .fail(function( jqxhr, textStatus, error ) {
		          var err = textStatus + ", " + error;
		          console.log( "Request Failed: " + err );
		          alert('404 something went wrong. Please contact Dilys');
		        });
			      
			function getQueryVariable(variable) { //jquery url
			    var query = window.location.search.substring(1);
			    var vars = query.split('&');
			    for (var i = 0; i < vars.length; i++) {
			        var pair = vars[i].split('=');
			        if (decodeURIComponent(pair[0]) == variable) {
			            return decodeURIComponent(pair[1]);
			        }
			    }
			    console.log('Query variable %s not found', variable);
			}

			var profileParam = getQueryVariable("profile");
			console.log(profileParam);
			// if (profileParam) {
			// 	var personJsonParam = $.grep(json, function(obj){
			// 		// console.log(JSON.stringify(obj))
			// 		// console.log(obj.name);
			// 	  		return obj.name.split(" ")[0].toLowerCase() == profileParam;

			//   	});
			// 	console.log(JSON.stringify(personJsonParam[0].name));

			// 	addjQueryMobilePage("true",personJsonParam[0]);
			// 	window.location = "#"+profileParam+"";
			// 	e.preventDefault();
			// 	// $('.hide').hide();

				
			// 	// return;

			// };
		});
	</script>
</body>
</html>