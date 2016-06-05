<?php
		function iseci ($txt, $duzina=25)
		{	
			if(strlen($txt) > $duzina){$txt =  substr($txt, 0, $duzina).'...';}
			return $txt;
		}
			if (isset($_GET["page"])) 
			{ 
				$page  = $_GET["page"]; 
			} 
			else 
			{ 
				$page=1; 
			}; 
			$start_from = ($page-1) * 12;  
			$r=mysqli_query($konekcija, "select * from filmovi ORDER BY ime ASC LIMIT $start_from, 12");
			while($niz = mysqli_fetch_object($r))
			{
			echo "<div class='petlja'>
							<a href='?str=6&id={$niz->id}'>
							<h2 class='title'>".iseci($niz->ime)."</h2></a>
					<div class='levo'>	
							<p><a href='?str=6&id={$niz->id}'><img class='img-rounded' onmouseover='bigImg(this)' onmouseout='normalImg(this)'  width='auto' height='auto' src='images/{$niz->slika}' alt=''></a></p>
					</div>
					<section class='tekst'>".($niz->opis)."
					</section>
				  </div>";
			}
			$pagesnumber = mysqli_query($konekcija, "SELECT COUNT(id) FROM filmovi"); 
			$row = mysqli_fetch_row($pagesnumber); 
			$resultsnumber = $row[0]; 
			$pages = ceil($resultsnumber / 12); 
			  
			for ($i=1; $i<=$pages; $i++)
				{ 
					  echo "<span>
							<ul class='pagination pagination-large'>
							<li><a href='?str=1&page=".$i."'>".$i."</a></li>
							</ul>
							</span>"; 
				}
?>