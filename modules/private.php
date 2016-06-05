<?php

		$id = $_GET['id']; 
		$r=mysqli_query($konekcija,"select * from filmovi where id=$id");
		while($niz = mysqli_fetch_object($r))
		{
		echo 	
		"<h2><strong>{$niz->ime}</strong></h2><br><br>
		<div class='container'>
				  <ul class='nav nav-tabs'>
					<li><a data-toggle='tab' href='#home'>{$niz->ime} - Synopsis</a></li>
					<li><a data-toggle='tab' href='#menu1'>Trailer</a></li>
					<li><a data-toggle='tab' href='#menu2'>Fotografije</a></li>
					<li><a data-toggle='tab' href='#menu3'>Linkovi</a></li>
				  </ul>			
		</div>
		<div class='tab-content' id='desno'>
					<div id='home' class='tab-pane fade in active' >{$niz->opis}</div>
					<div id='menu1' class='tab-pane fade'>
						<h3>{$niz->youtube}</h3>
					</div>
				
					<div id='menu2' class='tab-pane fade'>
						<a href='#'><img src='images/{$niz->slika}' alt=''></a>
					</div>
				
					<div id='menu3' class='tab-pane fade'><br>
						<a href='{$niz->imdb}' class='linkovi'>IMDB</a>
					</div>
		</div>";
		}
?>