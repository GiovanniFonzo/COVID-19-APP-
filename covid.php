<?php include('partials/admin-nav.php');?>
<?php include('partials/states_insert.php');?>
<?php include('partials/countrys_insert.php');?>
<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `covid_table` WHERE  CONCAT(`country`,`country_code`) LIKE '%".$valueToSearch."%' order by id LIMIT 100";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `covid_table` order by id LIMIT 100";
        $search_result = filterTable($query);
    }
// function to connect and execute the query
    function filterTable($query)
    {
        include('../includes/db_connect.php');
        $filter_Result = mysqli_query($con, $query);
        return $filter_Result;
    }

?>
<div id="countrystatus">
    

    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>Covid Status</h3></a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary ml-1" name="add_country" data-toggle="modal" data-target="#AdddistrictModal" data-whatever="@mdo">Add Entry</button>
        </form>

        <!-- Add district modal -->
        <div class="modal fade" id="AdddistrictModal" tabindex="-1" role="dialog" aria-labelledby="AdddistrictModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="partials/admin_db.php">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">County Code(IN for India):</label>
                        <input type="text" class="form-control" name="add_countrycode_c" id="country-code">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Country Name:</label>
                        <input type="text" class="form-control" name="add_countryname" id="country-name">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Continent:</label>
                        <input type="text" class="form-control" name="add_continent" id="continent">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Population:</label>
                        <input type="text" class="form-control" name="add_population" id="population">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Indicator:</label>
                        <input type="text" class="form-control" name="add_indicator" id="indicator">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Weekly Count:</label>
                        <input type="text" class="form-control" name="add_weeklycount" id="weeklycount">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Year Week:</label>
                        <input type="text" class="form-control" name="add_yearweek" id="yearweek">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Rate 14 day:</label>
                        <input type="text" class="form-control" name="add_rate14_day" id="rate14day">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Cumulative Count:</label>
                        <input type="text" class="form-control" name="add_cumulative_count" id="cumulativecount">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Source:</label>
                        <input type="text" class="form-control" name="add_source" id="source">
                    </div>

                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Note:</label>
                        <input type="text" class="form-control" name="add_note" id="note">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="add_country">Add Entry</button>
                </div>
            </form>
            </div>
        </div>
        </div>


        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn btn-primary ml-2" type="submit" name="search">Search</button>
        </form>
    </nav>

	<label class="text-primary font-weight-bold"> Select No.of.rows to display :</label>
	<select class="form-control" name="state" id="maxRows">
		<option value="5000">Show ALL Rows</option>
		<option value="5">5</option>
		<option value="10">10</option>
		<option value="15">15</option>
		<option value="20">20</option>
		<option value="50">50</option>
		<option value="70">70</option>
		<option value="100">100</option>
    </select>
    <div class="table-responsive">
        <table class="content-table table" id="table-id">
            <thead>
                <tr>
                    <th>COUNTRY_CODE</th>
                    <th>COUNTRY</th>
                    <th>CONTINENT</th>
                    <th>POPULATION</th>
                    <th>WEEKLY COUNT</th>
                    <th>YEAR WEEK</th>
                    <th>RATE 14 DAY</th>
                    <th>CUMULATIVE COUNT</th>
                    <th> Action </th>
                </tr>
            </thead>

            <?php 
            
            while($row = mysqli_fetch_array($search_result)):
           
            ?>

                <tr>
                    <td><?php echo $row['country_code']?></td>
                    <td><?php echo $row['country']?></td>
                    <td><?php echo $row['continent']?></td>
                    <td><?php echo $row['population']?></td>
                    <td><?php echo $row['weekly_count']?></td>
                    <td><?php echo $row['year_week']?></td>
                    <td><?php echo $row['rate_14_day']?></td>
                    <td><?php echo $row['cumulative_count']?></td>
                <td>
                <div class="d-flex">
                        <form method="POST" action='partials/admin_db.php'>
                            <input type='hidden' name='id' value='<?php echo $row['id'] ?>'/>
                            <?php
                            echo "<input  class='btn btn-danger ml-2 btn-sm' type='submit' style='outline:none;' name='country_covid_delete'  onclick='return Delete_covid();' value='Delete' />";
                            ?>
                        </form>
                    </div>   
                </td>
            </tr>
                <?php endwhile; ?>
        </table>
    </div>
    
     <div class='pagination-container mt-2'>
            <nav>
                <ul class="pagination">
                   <li class="page-item" style="cursor:pointer;" data-page="prev" ><span class="page-link"> < <span class="sr-only">(current)</span></span></li>
                   <!--	Here the JS Function Will Add the Rows -->
                    <li class="page-item" style="cursor:pointer;"  data-page="next" id="prev"><span class="page-link"> > <span class="sr-only">(current)</span></span></li>
                </ul>
            </nav>
        </div>

</div>

<script>
	function Delete_covid(){
		return confirm('Are You Sure You Want Delete this country');
	}
	</script>
<?php include('partials/admin-footer.php');?>
