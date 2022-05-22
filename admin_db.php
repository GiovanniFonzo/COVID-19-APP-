<?php
	include('../../includes/db_connect.php');

// for admin login
if(isset($_POST['admin_login']))
{
session_start();
$userid = $_POST['userid'];
$password = $_POST['password'];

   if($userid=='admin' && $password=='admin@123')
   {
      $_SESSION['username']=$userid;
      header('location:../dashboard.php');
   }
   else
   {
     header('location:../../loginfail.html');
   }
}


// ==================================================COVID==================================
// add covid record
if(isset($_POST['add_country'])){

	$co_code=$_POST['add_countrycode_c'];
	$co_name=$_POST['add_countryname'];
	$continent = $_POST['add_continent'];
	$population = $_POST['add_population'];
	$indicator = $_POST['add_indicator'];
	$weeklycount = $_POST['add_weeklycount'];
	$yearweek = $_POST['add_yearweek'];
	$rate14day = $_POST['add_rate_14_day'];
	$cumulative = $_POST['add_cumulative_count'];
	$source = $_POST['add_source'];
	$note = $_POST['add_note'];
	

	$query="INSERT INTO covid_table(country_code, country, continent, population, indicator, weekly_count, year_week, rate_14_day, cumulative_count, source, note) VALUES ('$co_code','$co_name','$continent','$population','$indicator','$weeklycount','$yearweek','$rate14day', '$cumulative', '$source', '$note')";
	$data=mysqli_query($con,$query);

	if($data)
	{
		
		echo"<script>window.alert('data inserted successfully')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../country.php">
		<?php
	}
	else
	{
	echo"<script>window.alert('Failed insert data')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../covid.php">
	<?php	
	}
}


// for deleting entries
if (isset($_POST['country_covid_delete']))
{
	$id_delete=$_POST['id'];
	$query="DELETE FROM covid_table WHERE id='$id_delete'";
	$data=mysqli_query($con,$query);
if($data)
{
	
	echo"<script>window.alert('The record is successfully deleted')</script>";
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../covid.php">
	<?php
}
else
{
 echo"<script>window.alert('Failed to delete the record')</script>";
 ?>
 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=../covid.php">
 <?php	
}
}

?>
