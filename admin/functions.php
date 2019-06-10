<?php
	function get_business_unit_name($con,$business_unit_id){
		$lu_business_unit_res = mysqli_query($con, "SELECT business_unit_name FROM lu_business_unit WHERE business_unit_id=$business_unit_id");
		if(mysqli_num_rows($lu_business_unit_res)>0){
			$row = mysqli_fetch_array($lu_business_unit_res);
			return htmlspecialchars($row['business_unit_name']);
		} else {
			return "";
		}
	}
	function get_cost_category_name($con,$cost_category_id){
		$lu_cost_category_res = mysqli_query($con, "SELECT cost_category_name FROM lu_cost_category WHERE cost_category_id=$cost_category_id");
		if(mysqli_num_rows($lu_cost_category_res)>0){
			$row = mysqli_fetch_array($lu_cost_category_res);
			return htmlspecialchars($row['cost_category_name']);
		} else {
			return "";
		}
	}
	function get_cost_element_name($con,$cost_element_id){
		$lu_cost_element_res = mysqli_query($con, "SELECT cost_element_name FROM lu_cost_element WHERE cost_element_id=$cost_element_id");
		if(mysqli_num_rows($lu_cost_element_res)>0){
			$row = mysqli_fetch_array($lu_cost_element_res);
			return htmlspecialchars($row['cost_element_name']);
		} else {
			return "";
		}
	}
	function get_country_name($con,$country_id){
		$lu_country_res = mysqli_query($con, "SELECT country_name FROM lu_country WHERE country_id=$country_id");
		if(mysqli_num_rows($lu_country_res)>0){
			$row = mysqli_fetch_array($lu_country_res);
			return htmlspecialchars($row['country_name']);
		} else {
			return "";
		}
	}
	function get_currency_name($con,$currency_id){
		$lu_currency_res = mysqli_query($con, "SELECT currency_name FROM lu_currency WHERE currency_id=$currency_id");
		if(mysqli_num_rows($lu_currency_res)>0){
			$row = mysqli_fetch_array($lu_currency_res);
			return htmlspecialchars($row['currency_name']);
		} else {
			return "";
		}
	}
	function get_impact_name($con,$impact_id){
		$lu_impact_res = mysqli_query($con, "SELECT impact_name FROM lu_impact WHERE impact_id=$impact_id");
		if(mysqli_num_rows($lu_impact_res)>0){
			$row = mysqli_fetch_array($lu_impact_res);
			return htmlspecialchars($row['impact_name']);
		} else {
			return "";
		}
	}
	function get_issue_category_name($con,$issue_category_id){
		$lu_issue_category_res = mysqli_query($con, "SELECT issue_category_name FROM lu_issue_category WHERE issue_category_id=$issue_category_id");
		if(mysqli_num_rows($lu_issue_category_res)>0){
			$row = mysqli_fetch_array($lu_issue_category_res);
			return htmlspecialchars($row['issue_category_name']);
		} else {
			return "";
		}
	}
	function get_likelihood_name($con,$likelihood_id){
		$lu_likelihood_res = mysqli_query($con, "SELECT likelihood_name FROM lu_likelihood WHERE likelihood_id=$likelihood_id");
		if(mysqli_num_rows($lu_likelihood_res)>0){
			$row = mysqli_fetch_array($lu_likelihood_res);
			return htmlspecialchars($row['likelihood_name']);
		} else {
			return "";
		}
	}
	function get_parent_org_name($con,$parent_org_id){
		$lu_parent_org_res = mysqli_query($con, "SELECT parent_org_name FROM lu_parent_org WHERE parent_org_id=$parent_org_id");
		if(mysqli_num_rows($lu_parent_org_res)>0){
			$row = mysqli_fetch_array($lu_parent_org_res);
			return htmlspecialchars($row['parent_org_name']);
		} else {
			return "";
		}
	}
	function get_people_name($con,$people_id){
		$lu_people_res = mysqli_query($con, "SELECT people_name FROM lu_people WHERE people_id=$people_id");
		if(mysqli_num_rows($lu_people_res)>0){
			$row = mysqli_fetch_array($lu_people_res);
			return htmlspecialchars($row['people_name']);
		} else {
			return "";
		}
	}
	function get_pl_category_name($con,$pl_category_id){
		$lu_pl_category_res = mysqli_query($con, "SELECT pl_category_name FROM lu_pl_category WHERE pl_category_id=$pl_category_id");
		if(mysqli_num_rows($lu_pl_category_res)>0){
			$row = mysqli_fetch_array($lu_pl_category_res);
			return htmlspecialchars($row['pl_category_name']);
		} else {
			return "";
		}
	}
	function get_program_name($con,$program_id){
		$lu_program_res = mysqli_query($con, "SELECT program_name FROM lu_program_name WHERE program_id=$program_id");
		if(mysqli_num_rows($lu_program_res)>0){
			$row = mysqli_fetch_array($lu_program_res);
			return htmlspecialchars($row['program_name']);
		} else {
			return "";
		}
	}
	function get_region_name($con,$region_id){
		$lu_region_res = mysqli_query($con, "SELECT region_name FROM lu_region WHERE region_id=$region_id");
		if(mysqli_num_rows($lu_region_res)>0){
			$row = mysqli_fetch_array($lu_region_res);
			return htmlspecialchars($row['region_name']);
		} else {
			return "";
		}
	}
	function get_response_name($con,$response_id){
		$lu_response_res = mysqli_query($con, "SELECT response_name FROM lu_response WHERE response_id=$response_id");
		if(mysqli_num_rows($lu_response_res)>0){
			$row = mysqli_fetch_array($lu_response_res);
			return htmlspecialchars($row['response_name']);
		} else {
			return "";
		}
	}
	function get_risk_category_name($con,$risk_category_id){
		$lu_risk_category_res = mysqli_query($con, "SELECT risk_category_name FROM lu_risk_category WHERE risk_category_id=$risk_category_id");
		if(mysqli_num_rows($lu_risk_category_res)>0){
			$row = mysqli_fetch_array($lu_risk_category_res);
			return htmlspecialchars($row['risk_category_name']);
		} else {
			return "";
		}
	}
	function get_stage_name($con,$stage_id){
		$lu_stage_res = mysqli_query($con, "SELECT stage_name FROM lu_stage WHERE stage_id=$stage_id");
		if(mysqli_num_rows($lu_stage_res)>0){
			$row = mysqli_fetch_array($lu_stage_res);
			return htmlspecialchars($row['stage_name']);
		} else {
			return "";
		}
	}
	function get_strategic_objective_name($con,$strategic_objective_id){
		$lu_strategic_objective_res = mysqli_query($con, "SELECT strategic_objective_name FROM lu_strategic_objective WHERE strategic_objective_id=$strategic_objective_id");
		if(mysqli_num_rows($lu_strategic_objective_res)>0){
			$row = mysqli_fetch_array($lu_strategic_objective_res);
			return htmlspecialchars($row['strategic_objective_name']);
		} else {
			return "";
		}
	}
	function get_sub_region_name($con,$sub_region_id){
		$lu_sub_region_res = mysqli_query($con, "SELECT sub_region_name FROM lu_sub_region WHERE sub_region_id=$sub_region_id");
		if(mysqli_num_rows($lu_sub_region_res)>0){
			$row = mysqli_fetch_array($lu_sub_region_res);
			return htmlspecialchars($row['sub_region_name']);
		} else {
			return "";
		}
	}
	function get_team_name($con,$team_id){
		$lu_team_res = mysqli_query($con, "SELECT team_name FROM lu_team WHERE team_id=$team_id");
		if(mysqli_num_rows($lu_team_res)>0){
			$row = mysqli_fetch_array($lu_team_res);
			return htmlspecialchars($row['team_name']);
		} else {
			return "";
		}
	}
	function get_workstream_name($con,$workstream_id){
		$lu_workstream_res = mysqli_query($con, "SELECT workstream_name FROM lu_workstream WHERE workstream_id=$workstream_id");
		if(mysqli_num_rows($lu_workstream_res)>0){
			$row = mysqli_fetch_array($lu_workstream_res);
			return htmlspecialchars($row['workstream_name']);
		} else {
			return "";
		}
	}
?>