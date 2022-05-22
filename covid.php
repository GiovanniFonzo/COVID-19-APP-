<?php include('partials/user-nav.php');?>
<?php include('../admin/partials/states_insert.php');?>
<?php include('../admin/partials/countrys_insert.php');?>
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
       

        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn btn-primary ml-2" type="submit" name="search">Search</button>
        </form>
    </nav>
      <label class="text-primary font-weight-bold"> Select No.of.rows to display :</label>
    <select class="form-control" name="state" id="maxRows">
		<option value="5000">Show ALL Rows</option>
		<option value="5" selected>5</option>
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

<?php include('partials/user-footer.php');?>
