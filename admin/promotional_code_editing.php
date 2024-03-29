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

    $q = "SELECT * FROM `promotional_code` WHERE id=".$_POST['id'].";";
    $result = mysqli_query($con, $q);
    $rec = mysqli_fetch_array($result);
    $promotional_code = $rec['promotional_code'];
    $type = $rec['type'];
    $value = $rec['value'];
    $id = $_POST['id'];
    # new fields
    $limit_usage = $rec['limit_usage'];
    $limit_usage_number_of_times = $rec['limit_usage_number_of_times'];
    $limit_by_time = $rec['limit_by_time'];
    $start_date = $rec['start_date'];
    $start_time = $rec['start_time'];
    $end_date = $rec['end_date'];
    $end_time = $rec['end_time'];


} else {
    $id = "";
    $promotional_code = "";
    $type = "";
    $value = "";
    # new fields
    $limit_usage = "";
    $limit_usage_number_of_times = "";
    $limit_by_time = "";
    $start_date = "";
    $start_time = "";
    $end_date = "";
    $end_time = "";
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
                                <label class="checkbox-inline"><input class="checkbox" type="checkbox" name="limit_usage" value="true"<?php if ($limit_usage) {
                                    ?>
                                    checked
                                    <?php
                                }?>/> Limit number of times this discount can be used in total.</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="limit_usage_number_of_times" value="<?php echo $limit_usage_number_of_times; ?>" <?php if (!$limit_usage) {
                                    ?>
                                    disabled
                                    <?php
                                }?> />
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
                                <input type="date" name="start_date"  placeholder="start date" value="<?php echo $start_date; ?>" />
                            </div>

                            <div class="col-sm-6">
                                <label>Start Time</label>
                                <input type="time" name="start_time"  placeholder="start time" value="<?php echo $start_time; ?>" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label><input type="checkbox" name="limit_by_time" value="true" <?php if ($limit_by_time) {
                                    # code...?> checked <?php 
                                }?>> Set End Date</label>
                            </div>
                        </div>

                          <div class="form-group row">
                            <div class="col-sm-6">
                                <label>End Date</label>
                                <input type="date" name="end_date"  placeholder="end date" value="<?php echo $end_date; ?>" <?php if (!$limit_by_time) {
                                    # code...?> disabled <?php 
                                }?> />
                            </div>

                            <div class="col-sm-6">
                                <label>End Time</label>
                                <input type="time" name="end_time"  placeholder="end time" value="<?php echo $end_time; ?>" <?php if (!$limit_by_time) {
                                    # code...?> disabled <?php 
                                }?> />
                            </div>
                        </div>
                    </fieldset>

                    <!-- <div class="form-group row">
                        <div class="offset-sm-9 col-sm-3">
                            
                        </div>
                    </div> -->
					
                    <?php if (isset($_POST['edit_code'])){ ?>
                        <div class="form-group row">
                        <div class="col-sm-3 offset-sm-9">
                            <button type="submit" name="update_promotional_codes_edit" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>
                    <?php }else {?>
                    <div class="form-group row">
                        <div class="col-sm-3 offset-sm-9">
                            <button type="submit" name="update_promotional_codes" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>
                    <?php }?>
                </form>
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
