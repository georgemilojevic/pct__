<?php
    $dbConnection = mysqli_connect("localhost","root","","store");
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
                echo '<div class="show" align="left"><span class="movie_name">'.str_ireplace($search_keyword,$bold_search_keyword,$rowCountries['ime']).'</span></div>'; 	
            }
        }else{
            echo '<div class="show" align="left">No matching records.</div>'; 	
        }
        return;
    }	
?>