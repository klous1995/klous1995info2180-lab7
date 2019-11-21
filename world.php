<?php
$host = getenv('IP');
$username = 'root';
$password = '';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_REQUEST["country"];
$context = $_REQUEST["context"];
if ($context == 0) {
	$coun = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%';");
	$results =$coun->fetchAll(PDO::FETCH_ASSOC);
	?>


	<table>
		<tr>
			<th>Name</th>
    		<th>Continent</th>
    		<th>Independence</th>
    		<th>Head of State</th>
    	</tr>
    	<?php foreach ($results as $row): ?>
    	<tr>
  			<td><?=$row['name'];?></td>
  			<td><?=$row['continent'];?></td>
  			<td><?=$row['independence_year'];?></td>
  			<td><?=$row['head_of_state'];?></td>
		</tr>
		<?php endforeach; ?>
	</table>

<?php
	}elseif ($context == 1) {
		$coun = $conn->query("SELECT cities.name, district, cities.population FROM cities JOIN countries WHERE countries.code = cities.country_code AND countries.name LIKE '%$country%';");
		$results =$coun->fetchAll(PDO::FETCH_ASSOC);
		?>


		<table>
			<tr>
				<th>Name</th>
    			<th>District</th>
    			<th>population</th>
    		</tr>
    		<?php foreach ($results as $row): ?>
    		<tr>
  				<td><?=$row['name'];?></td>
  				<td><?=$row['district'];?></td>
  				<td><?=$row['population'];?></td>
			</tr>
			<?php endforeach; ?>
		</table>
<?php
	}
?>

    © 2019 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Help

    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

