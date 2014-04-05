<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riot API</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom-theme.css" rel="stylesheet">
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Shiroi's Riot API</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">Account</a></li>
            <li><a href="#contact">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>

        <div id="summonerInfo" class="jumbotron">
        </div>

        <form class="form-signin" role="form">
          <h2 class="form-signin-heading">Let's stalk somebody ;)</h2>
          <input type="text" class="form-control" placeholder="Summoner's Name" id="searchInput" required autofocus>
          <button class="btn btn-lg btn-primary btn-block" type="submit" id="searchButton">Search</button>
        </form>

      </div>




    </div><!-- /.container -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" >

	   	 var devKey = "8ec9659a-7f32-4840-a37f-e7420cb3906c";
       var realm = "euw";
       var summonerName = "";
	   	 

    $("#searchButton").click(function() {
      //Cogemos el nombre del invocador y llamamos a la API.
      var summonerName = $("#searchInput").val();
      var riotAPI = "http://prod.api.pvp.net/api/lol/"+realm+"/v1.4/summoner/by-name/"+summonerName+"?api_key="+devKey;
   
      //Preparamos la salida
	   	$.getJSON( riotAPI, function( data ) {
  			var output = "";
        var keyword = summonerName.toLowerCase();

  			output += "<p class='small'>id : " + data[keyword].id + "</p>";
  			output += "<p class='small'>name : " + data[keyword].name + "</p>";
  			output += "<p class='small'>profileIconId : " + data[keyword].profileIconId + "</p>";
  			output += "<p class='small'>revisionDate : " + data[keyword].revisionDate + "</p>";
  			output += "<p class='small'>summonerLevel : " + data[keyword].summonerLevel + "</p>";

        $("#summonerInfo").empty();
  			$("#summonerInfo").append(output);
	   	});

    });

	    
	</script>
  </body>
</html>