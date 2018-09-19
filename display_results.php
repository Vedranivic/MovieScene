<?php
$poster = $_REQUEST["poster"];
$title = $_REQUEST["title"];
$year = $_REQUEST["year"];
$imdbID = $_REQUEST["imdbID"];

echo "<td class=\"col-sm-4\" style=\"margin-top:1rem;\">
            <div class=\"text-center\">
				<h6 style=\"color:white;margin-top:5px;\">".$title." (".$year.")</h6>
				<img src=\"".$poster."\" class=\"movie-thumbnail hover-thumbnail\" onclick=\"movieSelected('".$imdbID."')\">
            </div>
          </td>";

?>