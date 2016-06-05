<div class="row">
<?php 

$row = mysqli_query($konekcija, "select * from top_movies ORDER BY id DESC LIMIT 1");
while ($res = mysqli_fetch_object($row)){
echo    "<div class='6u'>
			<div class='mobileUI-main-content' id='content'>
				<section>
					<div class='post'>
						<h2>Editors Choice No.1</h2>
				
						<p><a href='?str=1&art=2&movid={$res->movieno1}'>
						<img class='img-thumbnail' src='images/pics06.jpg' height='300' width='588' alt=''></a><br>
						{$res->description_no1}</p>
						<p class='button-style2'><a href='#'>Read Full Article</a></p>
					</div>
				</section>
			</div>
		</div>
		<div class='3u' id='sidebar1'>
			<section>
				<h2>Runners Up!</h2>
				<ul class='style2'>
					<li class='first'>
						<p><a href='?str=1&art=2&movid={$res->movieno2}'>
						<img class='img-rounded' src='images/pics07.jpg' height='80' width='80' alt=''><h4>TOP MOVIE OF THE MONTH IN SCI FI</h4></a><br>{$res->description_no2}</p>
						
					</li>
					<li>
						<p><a href='?str=1&art=2&movid={$res->movieno3}'><img class='img-rounded' src='images/pics08.jpg' height='80' width='80' alt=''><h4>TOP MOVIE OF THE MONTH IN COMEDY</h4></a><br>{$res->description_no3}</p>
					</li>
					<li>
						<p><a href='?str=1&art=2&movid={$res->movieno4}'><img class='img-rounded' src='images/pics09.jpg' height='80' width='80' alt=''><h4>TOP MOVIE OF THE MONTH IN HORROR</h4></a><br>{$res->description_no4}</p>
					</li>
					<li>
						<p><a href='?str=1&art=2&movid={$res->movieno5}'><img class='img-rounded' src='images/pics10.jpg' height='80' width='80' alt=''><h4>TOP MOVIE OF THE MONTH IN DRAMA</h4></a><br>{$res->description_no5}</p>
					</li>
				</ul>
			</section>
	</div>";
	}
?>
	<div class="3u">
		<div id="sidebar2">
			<section>
				<div class="sbox1">
					<h2>News</h2>
					<ul class="style1">
						<li class="first"><a href="http://www.politika.rs/sr/clanak/349875/Koji-film-je-prvi-prikazan-na-Festu">Politika.rs</a></li>
						<li><a href="http://www.b92.net/kultura/vodic/bioskopi.php">B92.net</a></li>
						<li><a href="https://www.yahoo.com/movies/">Yahoo!</a></li>
						<li><a href="https://www.reddit.com/r/movies/">Reddit</a></li>
						<li><a href="http://www.beforeafter.rs/tag/filmovi/">BeforeAfter.rs</a></li>
					</ul>
				</div>
			</section>
			<section>
				<div class="sbox2">
					<h2>Upcoming Movies</h2>
					<ul class="style1">
						<li class="first"><a href="#">Most Anticipated Movie in 2016</a></li>
						<li><a href="#">1st of May</a></li>
						<li><a href="#">1st of June</a></li>
						<li><a href="#">4th of July</a></li>
						<li><a href="#">Thanksgiving Weekend</a></li>
						<li><a href="#">Christmas Weekend</a></li>
					</ul>
				</div>
			</section>
		</div>
	</div>
</div>	
<?php
	$row = mysqli_query($konekcija, "select * from top_movies");
		while ($month = mysqli_fetch_object($row)){
			echo "<span>
					<ul class='pagination pagination-large'>
					<li>
						<a href='?str=1&art=3&artid={$month->id}'>
						<h2>{$month->month}</h2></a>
					</li>
					</ul>
				</span>";
		}
?>
</div>