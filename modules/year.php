<?php 
$konekcija = Db::getConnection();
	function seckaj ($txt, $duzina=25)
	{	
		if(strlen($txt) > $duzina){$txt =  substr($txt, 0, $duzina).'...';}
		return $txt;
	}
		
		/*if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		$start_from = ($page-1) * 12;  */
		$res=mysqli_query($konekcija, "select * from filmovi ORDER BY ime DESC");
		while ($niz = mysqli_fetch_object($res))
		{
		echo "<div class='petlja' >
						<a href='private.php?id={$niz->id}'>
						<h2 class='title'>".seckaj($niz->ime)."</h2></a>
				<div class='levo'>	
						<p><a href='private.php?id={$niz->id}'><img class='img-rounded' border='0' width='95px' height='150px' src='images/{$niz->slika}' alt=''></a></p>
				</div>
				<section class='tekst'>".($niz->opis)."
				</section>
			  </div>";
		}
		/*$pagesnumber = mysqli_query($konekcija, "SELECT COUNT(id) FROM filmovi"); 
			$row = mysqli_fetch_row($pagesnumber); 
			$resultsnumber = $row[0]; 
			$pages = ceil($resultsnumber / 12); 
			  
			for ($i=1; $i<=$pages; $i++)
				{ 
					  echo "<span id='stranicenje'>
							<ul class='pagination pagination-large'>
							<li><a href='homepage.php?page=".$i."'>".$i."</a></li>
							</ul>
							</span>"; 
				}*/
?>