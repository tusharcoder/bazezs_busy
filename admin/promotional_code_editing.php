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

    <?php 
    
/* for edit functionality */
if(isset($_POST['edit_code'])){

    $q = "SELECT `id`, `promotional_code`, `type`, `value` FROM `promotional_code` WHERE id=".$_POST['id'].";";
    $result = mysqli_query($con, $q);
    $rec = mysqli_fetch_array($result);
    $promotional_code = $rec['promotional_code'];
    $type = $rec['type'];
    $value = $rec['value'];
        $id = $_POST['id'];

} else {
    $id = "";
    $promotional_code = "";
    $type = "";
    $value = "";
}
    ?>
	<section class="wrapper">
	<div class="form-w3layouts">
        <!-- page start-->
        <!-- page start-->
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                CREATE DISCOUNT CODE
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
                        
                            <div class="col-sm-3">
                                <label class="control-label"><b>Enter the Promotional code:</b></label>
                            </div>
                            <div class="col-sm-9">
                            <input type="text" name="promotional_code" value="<?php echo $promotional_code; ?>" class="form-control" required>
                        </div>
                    </div>
                    <fieldset>
                        <legend>Options</legend>
                        <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="control-label"><b>Type</b></label>
                            <select name="type" required class="form-control">
                                <option value="">Select type</option>
                                <option value="percentage" <?php if ($type==="percentage"){?> selected = selected <?php } ?> value="percentage">Percentage</option>
                                <option value="fixed_value" <?php if ($type==="fixed_value"){?> selected = selected <?php } ?> value = "fixed_value">Fixed Amount</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="control-label"><b>Value:</b></label>
                            <input type="number" name="value" value="<?php echo $value; ?>" class="form-control" step="any" min="0" required>
                        </div>
                    </div> 
                        
                    </fieldset>
                    <fieldset>
                        <legend>
                            Usage Limits
                        </legend>
                        <div class="form-group row">
                            <div class="col-sm-12 input-group">
                                <label class="checkbox-inline"><input class="checkbox" type="checkbox" value=""/> Limit number of times this discount can be used in total.</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="" />
                            </div>
                                 
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>
                            Active Dates
                        </legend>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Start Date</label>
                                <input type="date" name=""  placeholder="start date" />
                            </div>

                            <div class="col-sm-6">
                                <label>Start Time</label>
                                <input type="time" name=""  placeholder="start time" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label><input type="checkbox" name=""> Set End Date</label>
                            </div>
                        </div>

                          <div class="form-group row">
                            <div class="col-sm-6">
                                <label>End Date</label>
                                <input type="date" name=""  placeholder="end date" />
                            </div>

                            <div class="col-sm-6">
                                <label>End Time</label>
                                <input type="time" name=""  placeholder="end time" />
                            </div>
                        </div>
                    </fieldset>
					
                    <?php if (isset($_POST['edit_code'])){ ?>
                        <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="update_promotional_codes_edit" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>
                    <?php }else {?>
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="update_promotional_codes" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>
                    <?php }?>
                </form>
            </div>
        </section>
            </div>


<?php

// $q = "SELECT * FROM promotional_code";
// $result = mysqli_query($con, $q);
 ?>
   <!--      <div class="row">
            <div class="col-lg-12">
                <h3>Promotional Codes</h3>
    -->            <!--  <table role="table">
  <thead role="rowgroup">
    <tr role="row">
      <th role="columnheader">Id</th>
      <th role="columnheader">Promotional Code</th>
      <th role="columnheader">Type (% / fixed val)</th>
      <th role="columnheader">Value</th>
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
</table> -->
            </div>
        </div>
</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
