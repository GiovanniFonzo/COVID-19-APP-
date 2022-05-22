<?php include('partials/admin-nav.php');?>

<?php
    if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        // search in all table columns
        // using concat mysql function
        $query = "SELECT * FROM `user_reg` WHERE CONCAT(fullname,email) LIKE '%".$valueToSearch."%'";
        $search_result = filterTable($query);
    }
    else {
        $query = "SELECT * FROM `user_reg` ";
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
<div id="newuser">

    <nav class="navbar navbar-light">
        <a class="navbar-brand text-primary font-weight-bold" href="#"><h3>Users</h3></a>
        <form class="d-flex"  action="" method="POST" autocomplete="off">
            <input class="form-control me-2" type="search" name="valueToSearch" placeholder="Value To Search" aria-label="Search">
            <button class="btn ml-2 btn-primary" type="submit" name="search">Search</button>
        </form>
    </nav>
    <label class="text-primary font-weight-bold"> Select No.of.rows to display :</label>
    <select class ="form-control" name="state" id="maxRows">
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
                    
                    <th>FULLNAME</th>
                    <th>EMAIL</th>
                    <th>PHONENUMBER</th>
                </tr>
            </thead>

            <?php 
           
            while($row = mysqli_fetch_array($search_result)):
           
            ?>
                <tr>
                    
                    <td><?php echo $row['fullname']?></td>
                    <td><?php echo $row['email']?></td>
                    <td><?php echo $row['phoneno']?></td>
                </tr>
                <?php endwhile;?>
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

<?php include('partials/admin-footer.php');?>
