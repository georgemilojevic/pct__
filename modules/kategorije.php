<?php

$row = mysqli_query($konekcija, "select * from categories");
while($niz = mysqli_fetch_object($row))
{
?>
<div>
<a style="margin:25px padding:25px" href='?str=5&cid=<?=$niz->id?>'><h2><?=$niz->name?></h2></a><br>
</div>
<?php
}

?>