<!DOCTYPE html>

  <?php include('../../db.php') ?>
  

	
	<?php
	
	ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



	$records = mysqli_query($db, "SELECT id,name,ppk,weight
FROM reports");

$calcrecs = mysqli_query($db, "SELECT SUM(ppk) as tppk, SUM(weight) as tweight FROM reports");

?>


<html>
<head>


<head>


<body>

<table class="pure-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Weight (Kg)</th>
            <th>Price (Rs)</th>

        </tr>
    </thead>
    <tbody>
			<?php while ($data = mysqli_fetch_array($records))
{

?>
        <tr class="pure-table-odd">

            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['name']; ?></td>
            <td><?php echo $data['weight']; ?></td>
            <td><?php echo $data['ppk']; ?></td>
        </tr>

<?php
}
?>

			<?php while ($datas = mysqli_fetch_array($calcrecs))
{

?>

        <tr class="pure-table-odd">

            <td></td>
            <th>Total : </th>
            <td><?php echo $datas['tweight']; ?></td>
            <td><?php echo $datas['tppk']; ?></td>
        </tr>

		<?php
}
?>
    </tbody>
</table>

</body>






</html>