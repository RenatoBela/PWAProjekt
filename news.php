<?php
	echo '
	<p>Choose news type:</p>
	<form name="rega" method="POST">
	<select name="tip" id="tip">
	<option value="music">Music news</option>
	<option value="event">Events</option>
	<option value="all" selected="selected">All</option>
	</select>
	<input type="submit" value="Search">
	</form>
	';
	if(!isset($_POST['tip'])){
		$_POST['tip']='all';
	}
	if (isset($action) && $action != '') {
		$query  = "SELECT * FROM news";
		$query .= " WHERE id=" . $_GET['action'];
		$result = @mysqli_query($MySQL, $query);
		$row = @mysqli_fetch_array($result);
			print '
			<div class="';
			if($row['tip']=='music')
			{
				echo "news";
			}elseif($row['tip']=='event')
			{echo "event";
			};
			 print '">
				<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
				<h2>' . $row['title'] . '</h2>
				<p>'  . $row['description'] . '</p>
				<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
				<hr>
			</div>';
	}
	else {
		
		if($_POST['tip']=='all'){
			print '<h1>NEWS</h1>';
			$query  = "SELECT * FROM news";
			$query .= " WHERE archive='N'";
			$query .= " ORDER BY date DESC";
			$result = @mysqli_query($MySQL, $query);
			while($row = @mysqli_fetch_array($result)) {
				print '
				<div class="';
				if($row['tip']=='music')
				{
					echo "news";
				}elseif($row['tip']=='event')
				{echo "event";
				};
				 print '">
					<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
					<h2>' . $row['title'] . '</h2>';
					if(strlen($row['description']) > 300) {
						echo substr(strip_tags($row['description']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">More</a>';
					} else {
						echo strip_tags($row['description']);
					}
					print '
					<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
					<hr>
				</div>';
			}
		}elseif($_POST['tip']=='music'){
			print '<h1>NEWS</h1>';
			$query  = "SELECT * FROM news";
			$query .= " WHERE archive='N' AND tip='music'";
			$query .= " ORDER BY date DESC";
			$result = @mysqli_query($MySQL, $query);
			while($row = @mysqli_fetch_array($result)) {
				print '
				<div class="';
				if($row['tip']=='music')
				{
					echo "news";
				}elseif($row['tip']=='event')
				{echo "event";
				};
				 print '">
					<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
					<h2>' . $row['title'] . '</h2>';
					if(strlen($row['description']) > 300) {
						echo substr(strip_tags($row['description']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">More</a>';
					} else {
						echo strip_tags($row['description']);
					}
					print '
					<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
					<hr>
				</div>';
			}
		}elseif($_POST['tip']=='event'){
			print '<h1>NEWS</h1>';
			$query  = "SELECT * FROM news";
			$query .= " WHERE archive='N' AND tip='event'";
			$query .= " ORDER BY date DESC";
			$result = @mysqli_query($MySQL, $query);
			while($row = @mysqli_fetch_array($result)) {
				print '
				<div class="';
				if($row['tip']=='music')
				{
					echo "news";
				}elseif($row['tip']=='event')
				{echo "event";
				};
				 print '">
					<img src="news/' . $row['picture'] . '" alt="' . $row['title'] . '" title="' . $row['title'] . '">
					<h2>' . $row['title'] . '</h2>';
					if(strlen($row['description']) > 300) {
						echo substr(strip_tags($row['description']), 0, 300).'... <a href="index.php?menu=' . $menu . '&amp;action=' . $row['id'] . '">More</a>';
					} else {
						echo strip_tags($row['description']);
					}
					print '
					<time datetime="' . $row['date'] . '">' . pickerDateToMysql($row['date']) . '</time>
					<hr>
				</div>';
			}
		}
		
	}
?>