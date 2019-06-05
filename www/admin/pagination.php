<?php
$nbPage = $page_element / $page_max + 1;
echo '<div class="pagination">Page : ';
for($i=1; $i < $nbPage; $i++){
	if((!isset($page_cur) && $i == 1) || (isset($page_cur) && $i == $page_cur))
		echo ' '.$i.' ';
	else{
		if($i == 1)
			echo ' <a href="'.$page_lien.'">'.$i.'</a> ';
		else
			echo ' <a href="'.$page_lien.'&amp;limit='.$i.'">'.$i.'</a> ';
	}
}
echo '</div>';
?>