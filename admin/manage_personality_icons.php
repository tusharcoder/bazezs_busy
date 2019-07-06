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
    $q = "Select * from user_personality;";
    $mysqliquery = mysqli_query($con, $q);
    $results = mysqli_fetch_all($mysqliquery);
    $data = [];
    foreach($results as $row){
        $data[$row[1]] = $row[2];
    }
    var_dump($data);
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
                        <label class="col-sm-3 control-label"><b>Sages Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B1" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Sages"])){
                                $icon = "../icons/personality/".$data["Sages"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
					
					<div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Warrior Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B2" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Warrior"])){
                                $icon = "../icons/personality/".$data["Warrior"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>

                     <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>War Hero Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B3" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["War Hero"])){
                                $icon = "../icons/personality/".$data["War Hero"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Mystic Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B4" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Mystic"])){
                                $icon = "../icons/personality/".$data["Mystic"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Paladin Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B5" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Paladin"])){
                                $icon = "../icons/personality/".$data["Paladin"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Rogue Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B6" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Rogue"])){
                                $icon = "../icons/personality/".$data["Rogue"];
                            }else{
                                $icon = "";
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Miner Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B7" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Miner"])){
                                $icon = "../icons/personality/".$data["Miner"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Heretic Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B8" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Heretic"])){
                                $icon = "../icons/personality/".$data["Heretic"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Artisan Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B9" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Artisan"])){
                                $icon = "../icons/personality/".$data["Artisan"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Priest Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B10" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Priest"])){
                                $icon = "../icons/personality/".$data["Priest"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Assasin Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B11" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Assasin"])){
                                $icon = "../icons/personality/".$data["Assasin"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <label class="col-sm-3 control-label"><b>Death Knight Icon:</b></label>
                        <div class="col-sm-6">
                            <input type="file" name="B12" >
                        </div>
                        <div class="col-sm-2">

                            <?php if (isset($data["Death Knight"])){
                                $icon = "../icons/personality/".$data["Death Knight"];
                            }
                             ?>

                            <img src="<?php echo $icon; ?>" height="60" width="60" />
                        </div>
                    </div> 
                    
                    
                    <div class="form-group row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-6 offset-sm-2">
                            <button type="submit" name="manage_personality_icons" class="btn btn-primary" style="background:#007bff!important;border:#007bff!important">Save Changes</button>
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
