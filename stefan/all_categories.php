<?php

$categories = Categories::getAll();
foreach ($categories as $cats )
{
?>
<div>
<a style="margin:25px padding:25px" href='?str=5&cid=<?=$cats->id?>'><h2><?=$cats->name?></h2></a><br>
</div>
<?php
}

?>