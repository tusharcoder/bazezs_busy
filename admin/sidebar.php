<?php 
	$pagename = basename($_SERVER['REQUEST_URI']);
?>
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.php" <?php if($pagename=='index.php') echo 'style="background:black !important;"'; ?>>
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="service.php" <?php if($pagename=='service.php') echo 'style="background:black !important;"'; ?>>
                        <i class="fas fa-handshake"></i>
                        <span>Manage Service Prices</span>
                    </a>
                </li>
                <li>
                    <a class="active" href="promotional_code_editing.php" <?php if($pagename=='promotional_codes.php') echo 'style="background:black !important;"'; ?>>
                        <i class="fas fa-bullhorn"></i>
                        <span>Manage Promotional codes</span>
                    </a>
                </li>
				<li>
                    <a class="active" href="manage_orders.php" <?php if($pagename=='manage_orders.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-tasks"></i>
                        <span>Manage orders</span>
                    </a>
                </li>

                <li>
                    <a class="active" href="manage_human_orc_icon.php" <?php if($pagename=='manage_human_orc_icon.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-user"></i>
                        <span>Manage icons</span>
                    </a>
                </li> 
                 <li>
                    <a class="active" href="manage_personality_icons.php" <?php if($pagename=='manage_personality_icons.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-user"></i>
                        <span>Manage Personality Icons</span>
                    </a>
                </li>
                 <li>
                    <a class="active" href="manage_attribute_icons.php" <?php if($pagename=='manage_attribute_icons.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-user"></i>
                        <span>Manage Attribute Icons</span>
                    </a>
                </li>
				<li>
                    <a class="active" href="admin_email.php" <?php if($pagename=='admin_email.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-envelope"></i>
                        <span>Manage Email Setting</span>
                    </a>
                </li>
				<li>
                    <a class="active" href="admin_user.php" <?php if($pagename=='admin_user.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-users"></i>
                        <span>Manage Admin User</span>
                    </a>
                </li>
				<li>
                    <a class="active" href="admin_result.php" <?php if($pagename=='admin_result.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-bolt"></i>
                        <span>Manage Result</span>
                    </a>
                </li>
				<li>
                    <a class="active" href="admin_stripe.php" <?php if($pagename=='admin_stripe.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-key"></i>
                        <span>Manage Payment Settings</span>
                    </a>
                </li>
				<li>
                    <a href="settings.php" <?php if($pagename=='settings.php') echo 'style="background:rgb(79,54,107) !important"'; ?>>
                        <i class="fas fa-cog"></i>
                        <span>Settings </span>
                    </a>
                </li>
				<li>
                    <a href="logout.php">
                        <i class="fas fa-key"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<script>
setTimeout(function(){
	$('#ascrail2000 > div').css({
		'width':'10px',
		'background':'rgb(73,180,212)'
	});
},2000);
	
</script>