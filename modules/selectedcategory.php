<?php
function iseci ($txt, $duzina=25)
		{	
			if(strlen($txt) > $duzina){$txt =  substr($txt, 0, $duzina).'...';}
			return $txt;
		}
$id = $_GET['cid'];
$row = mysqli_query($konekcija, "select * from filmovi where id in(select movie_id from movie_categories where categorie_id= {$id})");
while ($niz = mysqli_fetch_object($row)){

	echo "<div class='petlja' >
			<a href='index.php?str=6&id={$niz->id}'>
			<h2 class='title'>".iseci($niz->ime)."</h2><br></a>
		 <div class='levo'>	
			<p><a href='index.php?str=6&id={$niz->id}'><img class='img-rounded' border='0' width='95px' height='150px' src='images/{$niz->slika}' alt=''></a></p>
		 </div>
		 <section class='tekst'>{$niz->opis}</section>					
		</div>";
}
	echo "<div class=clear; ><br><br><a href='index.php?str=4'><h2><&ndash;&ndash;Go back to select a new category</h2></a><br><br></div>"
?>