<div class="row">
<?php 
$movieid = $_GET['movid'];
$row = mysqli_query($konekcija, "select * from top_movies WHERE id=$movieid");
while ($res = mysqli_fetch_object($row)){
echo    "<div class='6u'>
			<div class='mobileUI-main-content' id='content'>
				<section>
					<div class='post'>
						<h2>Editors Choice No.1</h2>
				
						<p><a href='?str=1&art=2&movie_id={$res->movieno1}><img class='img-thumbnail' src='images/pics06.jpg' height='300' width='588' alt=''></a><br>
						{$res->description_no1}</p>
						<p class='button-style2'><a href='#'>Read Full Article</a></p>
					</div>
				</section>
			</div>
		</div>";
}
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