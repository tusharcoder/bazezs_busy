<?php session_start();?>
<!DOCTYPE html>
<head>
	<?php 
    error_reporting(E_ALL);
		include "header_links.php";
		include "database.php";
		if(!isset($_SESSION['admin_id'])){
			header("location:login.php");
			echo '<script> window.location.href = "login.php"; </script>';
			exit();
		} 
		$admin_id = intval($_SESSION['admin_id']);
        

		
	?>
    <style type="text/css">
        /*
    Max width before this PARTICULAR table gets nasty. This query will take effect for any screen smaller than 760px and also iPads specifically.
    */
    @media
      only screen 
    and (max-width: 760px), (min-device-width: 768px) 
    and (max-device-width: 1024px)  {

        /* Force table to not be like tables anymore */
        table, thead, tbody, th, td, tr {
            display: block;
        }

        /* Hide table headers (but not display: none;, for accessibility) */
        thead tr {
            position: absolute;
            top: -9999px;
            left: -9999px;
        }

    tr {
      margin: 0 0 1rem 0;
    }
      
    tr:nth-child(odd) {
      background: #ccc;
    }
    
        td {
            /* Behave  like a "row" */
            border: none;
            border-bottom: 1px solid #eee;
            position: relative;
            padding-left: 50%;
        }

        td:before {
            /* Now like a table header */
            position: absolute;
            /* Top/left values mimic padding */
            top: 0;
            left: 6px;
            width: 45%;
            padding-right: 10px;
            white-space: nowrap;
        }

        /*
        Label the data
    You could also use a data-* attribute and content for this. That way "bloats" the HTML, this way means you need to keep HTML and CSS in sync. Lea Verou has a clever way to handle with text-shadow.
        */
        td:nth-of-type(1):before { content: "Id"; }
        td:nth-of-type(2):before { content: "Promotional Code"; }
        td:nth-of-type(3):before { content: "Type (% / fixed val)"; }
        td:nth-of-type(4):before { content: "Value"; }
    }

    </style>
</head>
<body>
<section id="container">
	<?php 
		include "sidebar.php";	
		include "header.php";	
	?>
<section id="main-content">

    
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
    VIEW PROMOTIONAL CODES
            </header><br>
            <div class="panel-body">
                <?php

$q = "SELECT * FROM promotional_code";
$result = mysqli_query($con, $q);
 ?>
        <div class="row">
            <div class="col-lg-12">
                <h3></h3>
                 <table role="table">
  <thead role="rowgroup">
    <tr role="row">
      <th role="columnheader">Id</th>
      <th role="columnheader">Promotional Code</th>
      <th role="columnheader">Type (% / fixed val)</th>
      <th role="columnheader">Value</th>
      <th role="columnheader">Limit by usage</th>
      <th role="columnheader">Number of usage times allowed</th>
      <th role="columnheader">Start Date</th>
      <th role="columnheader">Start time</th>
      <th role="columnheader">Limit usage by time</th>
      <th role="columnheader">End Date</th>
      <th role="columnheader">End Time</th>
      <th role="columnheader">Edit</th>
      <th role="columnheader">Delete</th>
    </tr>
  </thead>
  <tbody role="rowgroup">
    <?php while($rec = mysqli_fetch_array($result)){?>
    <tr role="row">
      <td role="cell"><?php echo $rec['id']; ?></td>
      <td role="cell"><?php echo $rec['promotional_code']; ?></td>
      <td role="cell"><?php echo $rec['type']; ?></td>
      <td role="cell"><?php echo $rec['value']; ?></td>
      <td role="cell"><?php echo $rec['limit_usage']; ?></td>
      <td role="cell"><?php echo $rec['limit_usage_number_of_times']; ?></td>
      <td role="cell"><?php echo $rec['start_date']; ?></td>
      <td role="cell"><?php echo $rec['start_time']; ?></td>
      <td role="cell"><?php echo $rec['limit_by_time']; ?></td>
      <td role="cell"><?php echo $rec['end_date']; ?></td>
      <td role="cell"><?php echo $rec['end_time']; ?></td>
      <td role="cell">
          
          <form method="post">
              <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">

              <input type="submit" name="edit_code" value="Edit" class="btn btn-primary">
          </form>
      </td>
      <td role="cell">
          <form method="post" action="operations.php" onsubmit="return confirm('Are you sure to delete ?')">
              <input type="hidden" name="id" value="<?php echo $rec['id']; ?>">

              <input type="submit" name="delete_code" value="Delete" class="btn btn-danger">
          </form>
      </td>
    </tr>
<?php } ?>
    </tr>
  </tbody>
</table>
            </div>
        </div>
            </div>
        </section>
            </div>

</section>
<?php include "footerlinks.php"; ?>
<script type="text/javascript">
    
    $("input[name=limit_usage]").on("change",function(){
        if($(this).prop("checked")){
            $("input[name=limit_usage_number_of_times]").prop("disabled",false);
        }else{
            $("input[name=limit_usage_number_of_times]").prop("disabled",true);
        }
        
    });

    $("input[name=limit_by_time]").on("change",function(){
        if($(this).prop("checked")){
            $("input[name=end_date]").prop("disabled",false);
            $("input[name=end_time]").prop("disabled",false);
        }else{
            $("input[name=end_date]").prop("disabled",true);
            $("input[name=end_time]").prop("disabled",true);
        }
        
    });

</script>
</body>
</html>
