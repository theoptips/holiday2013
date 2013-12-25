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


	<section class="box" id="profile_box">
		<div><h1>Merry Xmas ! Dear</h1></div>
	</section>
	<section class="box" id="moment_2"></section>
	<section class="box" id="moment_3"></section>
	<section class="box" id="message"></section>
	<section class="box"></section>
	<script type="text/javascript">
		$(document).ready(function(){
			// snowFall.snow($("section"), {
	  //       minSize: 1,
	  //       maxSize: 8,
	  //       round: true,
	  //       minSpeed: 1,
	  //       maxSpeed: 3,
	  //       flakeCount: 120
		 //    });



			 $.getJSON( "data.json")
		        .done(function( json ) {
			        // console.log( "success" ); //debug
			        // console.log(json); //debug
			        // var jsonData = json;
			      	// var items = [];
					$.each(json, function(count){
					// addPersonToPage(json[count]);
					});

					var profileParam = getQueryVariable("profile");
					// handles e.g. http://localhost:8888?profile=Kathleen
					console.log(profileParam); //test

					if (profileParam) {
						var personJsonParam = $.grep(json, function(obj){
							// console.log(JSON.stringify(obj)) //test
							// console.log(obj.name); //test
					  		return obj.name == profileParam;
					  	});
						console.log(JSON.stringify(personJsonParam[0].name)); //test
						// addjQueryMobilePage("true",personJsonParam[0]);
						// e.preventDefault();

						// combine to an add data function
						addNameToHeader(personJsonParam[0].name);
						appendImg(personJsonParam,"profile_img_url","profile_box");
						appendImg(personJsonParam,"img_url_2","moment_2");
						appendImg(personJsonParam,"img_url_3","moment_3");
						prependHeader(personJsonParam,"img_caption_2","moment_2");
						prependHeader(personJsonParam,"img_caption_3","moment_3");
						appendMessage(personJsonParam);
					};
		        })
			      .fail(function( jqxhr, textStatus, error ) {
		          var err = textStatus + ", " + error;
		          console.log( "Request Failed: " + err );
		          alert('404 something went wrong. Please contact Dilys');
		        });


			// params feature dependency
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

			function appendImg(personJsonObj,imageName, destination){
				var selection, personJsonObjFirstItem;
				var img = $('<img>');
				selection = '#'+ destination;
				personJsonObjFirstItem = personJsonObj[0];
				img.attr('src', personJsonObjFirstItem[imageName]);
				$(selection).append(img);
			}

			function addNameToHeader(name){
				var textTemp = $('#profile_box h1').text();
				textTemp += ' ';
				textTemp += name;
				$('#profile_box h1').text(textTemp);
			}

			function prependHeader(personJsonObj,headerName, destination){
				var selection = '#'+ destination;
				var personJsonObjFirstItem = personJsonObj[0];
				var div = $('<div></div>');
				var header = $('<h1></h1>');
				header.text(personJsonObjFirstItem[headerName]);
				div.append(header);
				$(selection).prepend(div);
			}

			function appendMessage(personJsonObj){
				var personJsonObjFirstItem = personJsonObj[0];
				var paragraph = $('<p></p>')
				paragraph.text(personJsonObjFirstItem["message"]);
				$('#message').append(paragraph);
			}

			
		});
	</script>
</body>
</html>