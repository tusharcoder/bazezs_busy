<title>Welcome Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="UTF-8">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<!--<link rel="stylesheet" href="css/bootstrap.min.css" >-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="css/monthly.css">
<link rel="icon" href="../images/favicon.ico" type='image/x-icon'>
<!-- //calendar -->
<!-- //font-awesome icons -->

<script src="js/jquery2.0.3.min.js"></script>
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<style>
	html , body {
		background:#fff;
	}
	.header {
		background:none !important;
	}
	.header.fixed-top {
		box-shadow:none !important;
		width:240px !important;
	}
	.wrapper {
		margin-top:0 !important;
	}
	a.logo {
		font-size: 27px;
	}
	.panel-default>.panel-heading {
		font-size: 12px;
	}
	.mypagination {
		display: inline-block;
	}

	.mypagination a {
		color: black;
		float: left;
		padding: 4px 12px;
		text-decoration: none;
		transition: background-color .3s;
		border: 1px solid #ddd;
		margin: 2px 4px;
	}

	.mypagination a.active {
		background-color: #4CAF50;
		color: white;
		border: 1px solid #4CAF50;
	}
	.center {
		text-align:center;
	}
	::placeholder {
		color:#ccc !important;
	}
	.panel-heading {
		background:rgb(27, 147, 225)!important;
		color:white!important;
	}
	.panel-heading {
		background:rgb(79,54,107) !important;
		color:white;
	}
	.btn-primary {
		background:rgb(79,54,107) !important;
		color:white;
		border-color:rgb(79,54,107) !important;
	}
	.btn-success {
		background:rgb(79,54,107) !important;
		color:white;
		border-color:rgb(79,54,107) !important;
	}
</style>
<style>
	::-webkit-scrollbar {
		width:10px;
	}
	::-webkit-scrollbar-thumb {
		background:rgb(73,180,212);
	}
	@media (max-width: 479px){
		body {
			margin-top: 45px !important;
		}
	}
</style>
<style>
	#radioBtn .notActive{
		color: #3276b1;
		background-color: #fff;
	}
</style>
<style>
.funkyradio div {
  clear: both;
  overflow: hidden;
}

.funkyradio label {
  width: 100%;
  border-radius: 3px;
  border: 1px solid #D1D3D4;
  font-weight: normal;
}

.funkyradio input[type="radio"]:empty,
.funkyradio input[type="checkbox"]:empty {
  display: none;
}

.funkyradio input[type="radio"]:empty ~ label,
.funkyradio input[type="checkbox"]:empty ~ label {
  position: relative;
  line-height: 2.5em;
  text-indent: 3.25em;
  margin-bottom: 15px;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
}

.funkyradio input[type="radio"]:empty ~ label:before,
.funkyradio input[type="checkbox"]:empty ~ label:before {
  position: absolute;
  display: block;
  top: 0;
  bottom: 0;
  left: 0;
  content: '';
  width: 2.5em;
  background: #D1D3D4;
  border-radius: 3px 0 0 3px;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
  color: #888;
}

.funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
.funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #C2C2C2;
}

.funkyradio input[type="radio"]:checked ~ label,
.funkyradio input[type="checkbox"]:checked ~ label {
  color: #777;
}

.funkyradio input[type="radio"]:checked ~ label:before,
.funkyradio input[type="checkbox"]:checked ~ label:before {
  content: '\2714';
  text-indent: .9em;
  color: #333;
  background-color: #ccc;
}

.funkyradio input[type="radio"]:focus ~ label:before,
.funkyradio input[type="checkbox"]:focus ~ label:before {
  box-shadow: 0 0 0 3px #999;
}

.funkyradio-default input[type="radio"]:checked ~ label:before,
.funkyradio-default input[type="checkbox"]:checked ~ label:before {
  color: #333;
  background-color: #ccc;
}

.funkyradio-primary input[type="radio"]:checked ~ label:before,
.funkyradio-primary input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #337ab7;
}

.funkyradio-success input[type="radio"]:checked ~ label:before,
.funkyradio-success input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5cb85c;
}

.funkyradio-danger input[type="radio"]:checked ~ label:before,
.funkyradio-danger input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #d9534f;
}

.funkyradio-warning input[type="radio"]:checked ~ label:before,
.funkyradio-warning input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #f0ad4e;
}

.funkyradio-info input[type="radio"]:checked ~ label:before,
.funkyradio-info input[type="checkbox"]:checked ~ label:before {
  color: #fff;
  background-color: #5bc0de;
}
</style>
<style>
	.brand {
		background:rgb(79,54,107) !important;
	}
	#sidebar {
		background:rgb(42,46,55) !important;
	}
	.sidebar-toggle-box {
		background:rgb(79,54,107) !important;
	}
	.sidebar-toggle-box:hover {
		background:rgb(79,54,107) !important;
	}
	ul.sidebar-menu li a {
		background:rgb(42,46,55) !important;
	}
	ul.sidebar-menu li a:hover {
		background:rgb(79,54,107) !important;
	}
	ul.sidebar-menu li a .fa, ul.sidebar-menu li a.active .fa {
		color:rgb(73,180,212);
	}
	.header {
		background:rgb(246,246,246);
	}
</style>