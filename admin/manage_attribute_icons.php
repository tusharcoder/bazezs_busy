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
    <?php
    //icons script
    $q = "Select * from user_strength;";
    $mysqliquery = mysqli_query($con, $q);
    $results = mysqli_fetch_all($mysqliquery);
    $data = [];
    foreach($results as $row){
        $data[$row[1]] = $row[2];
    }
     ?>
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
                Manage Attribute Icons
            </header><br>
            <div class="panel-body">
                <form action="operations.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group row">
						<div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Agreeable Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C4" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Agreeable"])){
                                $icon = "../icons/attributes/".$data["Agreeable"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
					
					<div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Ambitious Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C8" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Ambitious"])){
                                $icon = "../icons/attributes/".$data["Ambitious"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>

                     <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Brutal Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C9" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Brutal"])){
                                $icon = "../icons/attributes/".$data["Brutal"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Charisma Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C5" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Charisma"])){
                                $icon = "../icons/attributes/".$data["Charisma"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Creative Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C1" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Creative"])){
                                $icon = "../icons/attributes/".$data["Creative"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Elegant Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C12" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Elegant"])){
                                $icon = "../icons/attributes/".$data["Elegant"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Leadership Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C7" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Leadership"])){
                                $icon = "../icons/attributes/".$data["Leadership"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Loyal Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C11" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Loyal"])){
                                $icon = "../icons/attributes/".$data["Loyal"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Openness Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C3" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Openness"])){
                                $icon = "../icons/attributes/".$data["Openness"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Sneaky Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C6" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Sneaky"])){
                                $icon = "../icons/attributes/".$data["Sneaky"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Strong Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C2" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Strong"])){
                                $icon = "../icons/attributes/".$data["Strong"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Trusting Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="C10" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Trusting"])){
                                $icon = "../icons/attributes/".$data["Trusting"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div> 
                    
                    
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="manage_attribute_icons" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
                        </div>
                    </div>

                    <?php if (isset($_SESSION['success_message'])) { ?>
                    	<div class="alerts alert-success">
                    	<?php echo $_SESSION['success_message']; unset($_SESSION['success_message']);?>
                    </div>
                    <?php } ?>
                    
                </form>
            </div>
        </section>
            </div>


</section>
<?php include "footerlinks.php"; ?>
</body>
</html>
