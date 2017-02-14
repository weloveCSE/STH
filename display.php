<?php
echo "<script>
	function showMovies(movies) {
 alert(movies.length);

 return false;
}
</script>";
 $movies = array("Bloodsport", "Kickboxer", "Cyborg", "Timecop", "Universal Soldier", "In Hell", "The Quest");
echo "
<input type='submit' value='Test Javascript' onclick='showMovies(<?php echo $movies; ?>);' />";
?>