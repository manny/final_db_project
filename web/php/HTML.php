<?php
function heading() {
	echo "<table style=\"width:100%\">";
	echo "<tr>";
    echo "<td>Title</td>";
    echo "<td>Date</td>";
    echo "<td>Web_rating</td>";
    echo "<td>User_Rating</td>";
    echo "<td>Developer</td>";
    echo "<td>Publisher</td>";
    echo "<td>Genres</td>";
    echo "<td>ESRB</td>";
	echo "</tr>";

}
function toHTML($row) {
	echo "<tr>";
    echo "<td>".$row['title']."</td>";
    echo "<td>".$row['release_date']."</td>";
    echo "<td>".$row['web_rating']."</td>";
    echo "<td>".$row['user_rating']."</td>";
    echo "<td>".$row['developer']."</td>";
    echo "<td>".$row['publisher']."</td>";
    echo "<td>".$row['genre']."</td>";
    echo "<td>".$row['esrb']."</td>";
	echo "</tr>";
}
function endTable() {
	echo "</table>";
}
