<?php
require ("config.php");
require ("classes/Db.class.php");
?>
<!DOCTYPE HTML>
<html>
<head>
		<title>POPCORN TIME By George & Stefan</title>
		<link rel="stylesheet" href="forms/form.css"> 
		<link href="http://fonts.googleapis.com/css?family=Oswald:400,300" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		<noscript>
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<meta name="viewport" content="width=device-width, initial-scale=1">	
		</noscript>
		
</head>
<body class="homepage">
	

	<div class="container"><br>
		<div class="row">
			<div class="col-lg-3">
				<div class="input-group">
					<script type="text/javascript" src="//code.jquery.com/jquery-1.8.0.min.js"></script>
<script type="text/javascript">
$(function(){
$(".search_keyword").keyup(function() 
{ 
    var search_keyword_value = $(this).val();
    var dataString = 'search_keyword='+ search_keyword_value;
    if(search_keyword_value!='')
    {
        $.ajax({
            type: "POST",
            url: "modules/search.php",
            data: dataString,
            cache: false,
            success: function(html)
                {
                    $("#result").html(html).show();
                }
        });
    }
    return false;    
});
 
$("#result").live("click",function(e){
    var $clicked = $(e.target);
    var $name = $clicked.find('.country_name').html();	
    var decoded = $("<div/>").html($name).text();
    $('#search_keyword_id').val(decoded);
});
 
$(document).live("click", function(e) { 
    var $clicked = $(e.target);
    if (! $clicked.hasClass("search_keyword")){
        $("#result").fadeOut(); 
    }
});
 
$('#search_keyword_id').click(function(){
    $("#result").fadeIn();
});
});
</script>
<?php
    $dbConnection = new mysqli("localhost","root","","store");
    if(isset($_POST['search_keyword']))
    {
        $search_keyword = $dbConnection->real_escape_string($_POST['search_keyword']);
        $sqlCountries="SELECT ime FROM filmovi WHERE ime LIKE '%$search_keyword%'";
        $resCountries=$dbConnection->query($sqlCountries);
 
        if($resCountries === false) {
            trigger_error('Error: ' . $dbConnection->error, E_USER_ERROR);
        }else{
            $rows_returned = $resCountries->num_rows;
        }
 
	$bold_search_keyword = '<strong>'.$search_keyword.'</strong>';
	if($rows_returned > 0){
            while($rowCountries = $resCountries->fetch_assoc()) 
            {		
                echo '<div class="show" align="left"><span class="country_name">'.str_ireplace($search_keyword,$bold_search_keyword,$rowCountries['ime']).'</span></div>'; 	
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 	
        }
    }	
?>
 
<body>
    <div class='web'>
        <input type="text" class="search_keyword" id="search_keyword_id" placeholder="Country Search" />
        <div id="result"></div>
    </div>
					
					
					
					
					
				</div>
	<!-- Trigger the modal with a button -->
	<?php
		//javascript register form
	include ("js/register.js");
		if(!Session::get('status'))			
		{
			require ("forms/loginform.php");
		}
		else
		{
		echo '<div class="dropdown">
			<button class="btn btn-primary" dropdown-toggle" type="button" data-toggle="dropdown">'.Session::get('status').'
			<span class="caret"></span></button>
			<ul class="dropdown-menu">
			  <li><a href="profile.php">Your Profile</a></li>
			  <li><a href="purchases.php">Your Cart</a></li>
			  <li><a href="forms/logout.php">Log Out</a></li>
			</ul>
		</div>';
		}
		?>
		
		<div class="container">
			<div id="header">
				<div id="logo">
					<h1><a href="#">POPCORN TIME</a></h1>
					<span id="paragraf">by George & Stefan</span>
				</div>
				<nav id="nav">
				<script>
					$(function(){
						$('a').each(function(){
							if ($(this).prop('href') == window.location.href) {
							$(this).addClass('current_page_item'); $(this).parents('li').addClass('current_page_item');
							}
						});
					});
					</script>
					<ul>
						<li><a href="index.php">Homepage</a></li>
						<li><a href="?str=3">Top Movies/Month</a></li>
						<li><a href="?str=2">Top Movies/Year</a></li>
						<li><a href="?str=4">Categories</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>
		
	<div class="container">
		<div class="row">
			<div id="banner" class="12u">
					<!-- slider starts here -->		
					<link rel="stylesheet" href="slider/css/normalize.css">
					<link rel="stylesheet" href="slider/ideal-image-slider.css">
					<link rel="stylesheet" href="slider/themes/default/default.css">
					
					<div id="slider">
		<?php
		$db = Db::getInstance();
		$konekcija = $db->getConnection();
		$r=mysqli_query($konekcija,"select * from filmovi");
			while ($niz=mysqli_fetch_object($r))	
			{
				echo "<a href='?str=6&id={$niz->id}'><img src='images/{$niz->slajder}' alt='{$niz->ime}' /></a>";
			}
		?>	
					
					</div>

					<script src="slider/ideal-image-slider.js"></script>
					<script src="slider/iis-captions.js"></script>
					<script>
					var slider = new IdealImageSlider.Slider('#slider');
					slider.start();
					slider.addCaptions();
					</script>
			</div>
		</div>
	</div>
	<!--slider ends here-->
		<div id="wrapper">
			<div class="container" id="marketing">
				<div class="row divider">
	<?php  
		
		$default_page = (isset($_GET['str']))?$_GET['str']:1; 
		$pages = array(
				"1"=>"filmovi.php",
				"2"=>"year.php",
				"3"=>"month.php",
				"4"=>"kategorije.php",
				"5"=>"selectedcategory.php",
				"6"=>"private.php"
		    ); 
		if(isset($pages[$default_page]))
		{
			include "modules/" . $pages[$default_page];
		}
	 ?> 

				</div>
			</div>
			<div class="container" id="page">
	<?php  
		
		$default_artpage = (isset($_GET['art']))?$_GET['art']:1; 
		$artpages = array(
				"1"=>"articles.php",
				"2"=>"topmovie.php",
				"3"=>"topmonth.php"
		    ); 
		if(isset($artpages[$default_artpage]))
		{
			include "modules/" . $artpages[$default_artpage];
		}
	 ?> 
		</div>
		<div id="featured-area">
			<div class="container">
				<div class="row divider">
					<div class="4u">
						<section>
							<div class="box-style"> <a href="#"><img class="img-thumbnail" src="images/pics04.jpg" alt=""></a>
								<h3>Born Today:&nbsp;Male</h3>
								<p>Find out which actors were born on this day. </p>
								<p class="button-style2"><a href="#">More</a></p>
							</div>
						</section>
					</div>
					<div class="4u">
						<section>
							<div class="box-style"> <a href="#"><img class="img-thumbnail" src="images/pics03.jpg" alt=""></a>
								<h3>Born Today:&nbsp;Female</h3>
								<p>Find out which actresses were born on this day. </p>
								<p class="button-style2"><a href="#">More</a></p>
							</div>
						</section>
					</div>
					<div class="4u">
						<section>
							<div class="box-style"> <a href="#"><img class="img-thumbnail" src="images/pics05.jpg" alt=""></a>
								<h3>Todays Horoscope</h3>
								<p>Your daily dose of astrology. Work, Love, Health... </p>
								<p class="button-style2"><a href="#">More</a></p>
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="row" id="footer-content">
					<div class="3u" id="box1">
						<section>
							<h2>Quote of the day!</h2>
							<div class="balloon">
							<?php 
							$row = mysqli_query($konekcija, "select * from movie_quotes ORDER BY RAND() LIMIT 1");
							while ($quote = mysqli_fetch_object($row)){
								echo "<blockquote>&ldquo;&nbsp;&nbsp;{$quote->quote}&nbsp;&nbsp;&rdquo;<br>
								<br>
								<strong>&ndash;&nbsp;&nbsp;{$quote->name}&nbsp;({$quote->year})</strong></blockquote>";
								}
							?>
							</div>
							<div class="ballon-bgbtm">&nbsp;</div>
							<p></p>
						</section>
					</div>
					<div class="3u" id="box2">
						<section>
							<h2>Social Media Updates</h2>
							<ul class="style6">
								<li class="first">
									<h3>Twitter #movies</h3>
									<p><a href="#">Twitter accounts goes here...Twitter accounts go here...Twitter accounts go here...</a></p>
								</li>
								<li>
									<h3>Tumblr #bestmoviegifs</h3>
									<p><a href="#">Tumblr posts goes here...Tumblr posts go here...Tumblr posts go here...</a></p>
								</li>
								<li>
									<h3>Instagram #netflixandchill</h3>
									<p><a href="#">Instagram search goes here...Instagram search goes here...Instagram search goes here...</a></p>
								</li>
							</ul>
						</section>
					</div>
					<div class="3u" id="box3">
						<section>
							<h2>Movies Stock Market</h2>
							<ul class="style1">
								<li class="first"><a href="#">Buy and Sell DVD's</a></li>
								<li><a href="#">Blueray editions</a></li>
								<li><a href="#">DVD's on bulk</a></li>
								<li><a href="#">VHS giveaway</a></li>
								<li><a href="#">Movies soundtracks</a></li>
								<li><a href="#">Movie posters</a></li>
								<li><a href="#">Movie memorabilia</a></li>
							</ul>
						</section>
					</div>
					<div class="3u" id="box4">
						<section>
							<h2>Blog Conversations</h2>
							<p><strong>Start a topic or ask our members for advice, suggestion or that movie you can't remember the name</strong></p>
							<p>&nbsp;</p>
							<p>Blog post with most hits... Short description of the blog post with most hits... </p>
							<p>&nbsp;</p>
							<p>2nd most popular blog conversation... Short description of the last update...Short description of the last update...</p>
							<p>&nbsp;</p>
							<p>3rd most popular blog conversation... Short description of the last update...Short description of the last update...</p>
							<p>&nbsp;</p>
						</section>
					</div>
				</div>
			</div>
		</div>
		<div id="copyright" class="container">
		Design: <a href="georgeandbubonjaportfolio.com">George & Stefan</a><br><br> Images: <a href="#">Free Image Source</a> (<a href="#"></a>)
		</div>
	</body>
</html>