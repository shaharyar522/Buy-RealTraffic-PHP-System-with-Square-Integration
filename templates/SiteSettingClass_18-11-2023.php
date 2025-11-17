<?php

class SiteSetting{
    
    //var $traffic_item_name;
    //var $traffic_cost_per_thousand;
    //var $traffic_sites_allowed;
    //var $min_traffic_credits;
    //var $min_login_credits;

	 var $site_title;

	 var $admin_emailname;

	 var $admin_email;

     var $address;

	 var $admin_list_per_page;

	 var $user_list_per_page;

	 var $number_of_site;

     var $paypal_email;

     var $check_info;

     var $url_status;

     var $security_code;

     var $bulk_email;

     var $ref_com_rate;

     

     var $cash_back_rate;

     var $package_name;

     var $points_per_unit_purchased;

     var $cost_per_unit;

     var $max_units_allowed;

     var $days_unit_lasts;

     var $min_active_units;

     var $min_total_cash_earned;

traffic_sites_allowed;
     

     var $payment_return_url;

     var $payment_cancel_url;



     var $sandbox_email;

     var $sandbox_security_code;

     var $payment_mode;

	 var $cost_per_thousand;

	 var $max_banners;

	 var $login_cost_per_hundred;

	 var $item_name;

	 var $login_timer;
	 var $login_sites_allowed;
	 var $buy_unit_status;
	 var $vc_log_email;
	 var $vc_log_security_code;

	 var $login_cancel_url;
	 var $login_return_url;
	 var $vc_item_name;
	 var $vc_return_url;
	 var $vc_cancel_url;





	function SiteSetting() {



	}



	// Assign form variables into calss attributes...

	function SetPostValues($p_array){


// if (array_key_exists("traffic_item_name", $p_array)) {
// 	$this->traffic_item_name = trim($p_array['traffic_item_name']) ;
// }
// if (array_key_exists("traffic_cost_per_thousand", $p_array)) {
// 	$this->traffic_cost_per_thousand = trim($p_array['traffic_cost_per_thousand']) ;
// }
// if (array_key_exists("traffic_sites_allowed", $p_array)) {
// 	$this->traffic_sites_allowed = trim($p_array['traffic_sites_allowed']) ;
// }
// if (array_key_exists("min_traffic_credits", $p_array)) {
// 	$this->min_traffic_credits = trim($p_array['min_traffic_credits']) ;
// }
// if (array_key_exists("min_login_credits", $p_array)) {
// 	$this->min_login_credits = trim($p_array['min_login_credits']) ;
// }



		if (array_key_exists("site_title", $p_array)) {
			$this->site_title = trim($p_array['site_title']) ;
		}

		if (array_key_exists("admin_emailname", $p_array)) {
			$this->admin_emailname = trim($p_array['admin_emailname']) ;
		}

		if (array_key_exists("admin_email", $p_array)) {
			$this->admin_email = trim($p_array['admin_email']) ;
		}

		if (array_key_exists("address", $p_array)) {
			$this->address = trim($p_array['address']) ;
		}

        if (array_key_exists("admin_list_per_page", $p_array)) {
            $this->admin_list_per_page = trim($p_array['admin_list_per_page']) ;
        }

        if (array_key_exists("user_list_per_page", $p_array)) {
            $this->user_list_per_page = trim($p_array['user_list_per_page']) ;
        }

		if (array_key_exists("number_of_site", $p_array)) {
			$this->number_of_site = trim($p_array['number_of_site']) ;
		}

		if (array_key_exists("paypal_email", $p_array)) {
			$this->paypal_email = trim($p_array['paypal_email']) ;
		}

		if (array_key_exists("check_info", $p_array)) {
			$this->check_info = trim($p_array['check_info']) ;
		}

        if (array_key_exists("url_status", $p_array)) {
            $this->url_status = trim($p_array['url_status']) ;
        }

        if (array_key_exists("security_code", $p_array)) {
            $this->security_code = trim($p_array['security_code']) ;
        }

        if (array_key_exists("bulk_email", $p_array)) {
            $this->bulk_email = trim($p_array['bulk_email']) ;
        }

        if (array_key_exists("ref_com_rate", $p_array)) {
            $this->ref_com_rate = trim($p_array['ref_com_rate']) ;
        }



		if (array_key_exists("cash_back_rate", $p_array)) {
			$this->cash_back_rate = trim($p_array['cash_back_rate']) ;
		}

		if (array_key_exists("package_name", $p_array)) {
			$this->package_name = trim($p_array['package_name']) ;
		}

		if (array_key_exists("points_per_unit_purchased", $p_array)) {
			$this->points_per_unit_purchased = trim($p_array['points_per_unit_purchased']) ;
		}

		if (array_key_exists("cost_per_unit", $p_array)) {
			$this->cost_per_unit = trim($p_array['cost_per_unit']) ;
		}

        

		if (array_key_exists("max_units_allowed", $p_array)) {
			$this->max_units_allowed = trim($p_array['max_units_allowed']) ;
		}



		if (array_key_exists("days_unit_lasts", $p_array)) {
			$this->days_unit_lasts = trim($p_array['days_unit_lasts']) ;
		}

		if (array_key_exists("min_active_units", $p_array)) {
			$this->min_active_units = trim($p_array['min_active_units']) ;
		}

		if (array_key_exists("min_total_cash_earned", $p_array)) {
			$this->min_total_cash_earned = trim($p_array['min_total_cash_earned']) ;
		}



		if (array_key_exists("payment_return_url", $p_array)) {
			$this->payment_return_url = trim($p_array['payment_return_url']) ;
		}

		if (array_key_exists("payment_cancel_url", $p_array)) {
			$this->payment_cancel_url = trim($p_array['payment_cancel_url']) ;
		}



		if (array_key_exists("sandbox_email", $p_array)) {
			$this->sandbox_email = trim($p_array['sandbox_email']) ;
		}

		if (array_key_exists("sandbox_security_code", $p_array)) {
			$this->sandbox_security_code = trim($p_array['sandbox_security_code']) ;
		}

		if (array_key_exists("payment_mode", $p_array)) {
			$this->payment_mode = trim($p_array['payment_mode']) ;
		}

		if (array_key_exists("max_banners", $p_array)) {
			$this->max_banners = trim($p_array['max_banners']) ;
		}

		if (array_key_exists("points_cost_per_th", $p_array)) {
			$this->cost_per_thousand = $p_array['points_cost_per_th'] ;
		}

		if (array_key_exists("login_cost_per_hundred", $p_array)) {
			$this->login_cost_per_hundred = $p_array['login_cost_per_hundred'] ;
		}

		if (array_key_exists("item_name", $p_array)) {
			$this->item_name = $p_array['item_name'] ;
		}

		if (array_key_exists("login_timer", $p_array)) {
			$this->login_timer = $p_array['login_timer'] ;
		}

		if (array_key_exists("login_sites_allowed", $p_array)) {
			$this->login_sites_allowed = $p_array['login_sites_allowed'] ;
		}
		
		
                     		
		
		if (array_key_exists("days_cb_page_last", $p_array)) {
			$this->days_cb_page_last = $p_array['days_cb_page_last'] ;
		}
		if (array_key_exists("days_url_rotator_last", $p_array)) {
			$this->days_url_rotator_last = $p_array['days_url_rotator_last'] ;
		}
		if (array_key_exists("cost_per_referral_url", $p_array)) {
			$this->cost_per_referral_url = $p_array['cost_per_referral_url'] ;
		}
		if (array_key_exists("cb_page_cost", $p_array)) {
			$this->cb_page_cost = $p_array['cb_page_cost'] ;
		}
		
		
		

		if (array_key_exists("buy_unit_status", $p_array)) {
			$this->buy_unit_status = $p_array['buy_unit_status'] ;
		}

		if (array_key_exists("vc_log_email", $p_array)) {
			$this->vc_log_email = $p_array['vc_log_email'] ;
		}


		if (array_key_exists("vc_log_security_code", $p_array)) {
			$this->vc_log_security_code = $p_array['vc_log_security_code'] ;
		}


		if (array_key_exists("login_cancel_url", $p_array)) {
			$this->login_cancel_url = $p_array['login_cancel_url'] ;
		}


		if (array_key_exists("login_return_url", $p_array)) {
			$this->login_return_url = $p_array['login_return_url'] ;
		}

		if (array_key_exists("vc_item_name", $p_array)) {
			$this->vc_item_name = $p_array['vc_item_name'] ;
		}

		if (array_key_exists("vc_cancel_url", $p_array)) {
			$this->vc_cancel_url = $p_array['vc_cancel_url'] ;
		}

		if (array_key_exists("vc_return_url", $p_array)) {
			$this->vc_return_url = $p_array['vc_return_url'] ;

		}

     }



	// Check Site Updation Form

	function CheckSiteSetting() {

		$err_msg = '';
		
		
		
// 		if (!$this->traffic_item_name) {

// 		 	 $err_msg .= "<li>Enter valid traffic_item_name</li>";

// 		}
// 		if (!$this->traffic_cost_per_thousand) {

// 		 	 $err_msg .= "<li>Enter valid traffic_cost_per_thousand</li>";

// 		}
// 		if (!$this->traffic_sites_allowed) {

// 		 	 $err_msg .= "<li>Enter valid traffic_sites_allowed</li>";

// 		}
// 		if (!$this->min_traffic_credits) {

// 		 	 $err_msg .= "<li>Enter valid min_traffic_credits</li>";

// 		}
// 		if (!$this->min_login_credits) {

// 		 	 $err_msg .= "<li>Enter valid min_login_credits</li>";

// 		}
		
		
		

		if (!$this->site_title) {

		 	 $err_msg .= "<li>Enter valid site title</li>";

		}

		if (!$this->admin_emailname) {

			 $err_msg .= "<li>Enter valid admin email name</li>";

		}

    
        

		if (!$this->address) {

			 $err_msg .= "<li>Enter valid admin contact address</li>";

		}



         /**   $user_list_per_page=trim($_POST['user_list_per_page']);

        if((strlen($user_list_per_page) == 0) ||($user_list_per_page < 1) )  {

            $err_msg.="<li>Enter the valid page for navigation in user</li>";

        }**/



		if (!$this->number_of_site) {

			 $err_msg .= "<li>Enter valid number of site tobe allowed</li>";

		}



            $paypal_email=trim($_POST['paypal_email']);

			if(($paypal_email=="")||(!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,6}$/i",$paypal_email))) {

            $err_msg.="<li>Enter a valid admin paypal email</li>";

        }



		if (!$this->check_info) {

			 $err_msg .= "<li>Enter valid number check details</li>";

		}

		

		

		if (!$this->bulk_email) {

			 $err_msg .= "<li>Enter valid number for email per hour</li>";

		}

		

		if (!$this->package_name) {

			 $err_msg .= "<li>Enter valid Package name</li>";

		}

		if (!$this->points_per_unit_purchased) {

			 $err_msg .= "<li>Enter valid Points per unit purchased</li>";

		}

		if (!$this->cost_per_unit) {

			 $err_msg .= "<li>Enter valid Cost per unit</li>";

		}

		if (!$this->max_units_allowed) {

			 $err_msg .= "<li>Enter valid Max Units Allowed </li>";

		}

		if (!$this->days_unit_lasts) {

			 $err_msg .= "<li>Enter valid Days unit lasts</li>";

		}

		if (!$this->min_active_units) {

			 $err_msg .= "<li>Enter valid Minimum active units</li>";

		}

		if (!$this->min_total_cash_earned) {

			 $err_msg .= "<li>Enter valid Minimum total cash earned</li>";

		}

		

		if (!$this->payment_return_url) {

		 	 $err_msg .= "<li>Payment return url should not be empty</li>";

		}

		if (!$this->payment_cancel_url) {

		 	 $err_msg .= "<li>Payment cancel url should not be empty</li>";

		}

		if (!$this->max_banners) {

		 	 $err_msg .= "<li>Max Banners should not be empty</li>";

		}





		return ($err_msg);

	}



 

    //Update

        function UpdateSiteSetting() {

           global $tb_site_setting,$db_obj,$base_url;

//days_url_rotator_last
//days_cb_page_last

            $sql=" UPDATE url_site_setting SET	
                                    bulk_email		 = '$this->bulk_email',
                                            paypal_email = '$this->paypal_email',
                                 login_cost_per_hundred   = '$this->login_cost_per_hundred',                                                     
                                      item_name            	 = '$this->item_name',
				      login_timer 		 = '$this->login_timer',                                                                     								
                                     login_sites_allowed 	 = '$this->login_sites_allowed',							
                                   login_return_url 		 = '$this->login_return_url',			
                                   
days_cb_page_last  = $this->days_cb_page_last,
days_url_rotator_last = $this->days_url_rotator_last,
cost_per_referral_url 		 = $this->cost_per_referral_url,	
cb_page_cost 		 = $this->cb_page_cost,	
                                   
                                login_cancel_url 	 	 = '$this->login_cancel_url' ";                  

  		    mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		    $this->GetSitesetting();

       }



       function GetSitesetting() {

           global $tb_site_setting,$db_obj;



                $sql = "SELECT * FROM url_site_setting";
                $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                $row=mysqli_fetch_object($res);


                //print_r($row);



//days_url_rotator_last
//days_cb_page_last


$this->days_cb_page_last = $row->days_cb_page_last;
$this->days_url_rotator_last = $row->days_url_rotator_last;

$this->cost_per_referral_url            = $row->cost_per_referral_url;
$this->cb_page_cost	     = $row->cb_page_cost;



//$this->traffic_item_name            = $row->traffic_item_name;
//$this->traffic_cost_per_thousand     = $row->traffic_cost_per_thousand;
//$this->traffic_sites_allowed            = $row->traffic_sites_allowed;
//$this->min_traffic_credits            = $row->min_traffic_credits;
//$this->min_login_credits            = $row->min_login_credits;


                $this->site_title            = $row->site_title;

                $this->admin_emailname	     = $row->admin_emailname;

                $this->admin_email           = $row->admin_email;

		        $this->address               = $row->address;

		        $this->admin_list_per_page   = $row->admin_list_per_page;

		        $this->user_list_per_page    = $row->user_list_per_page;

		        $this->number_of_site        = $row->number_of_site;

		        $this->paypal_email          = $row->paypal_email;

		        $this->check_info            = $row->check_info;

		        $this->url_status            = $row->url_status;

		        $this->security_code        = $row->security_code ?? '';

		        $this->bulk_email			 = $row->bulk_email;

		        $this->ref_com_rate			 = $row->ref_com_rate;

                

		        $this->cash_back_rate             = $row->cash_back_rate;

		        $this->package_name               = $row->package_name;

		        $this->points_per_unit_purchased  = $row->points_per_unit_purchased;

		        $this->cost_per_unit              = $row->cost_per_unit;

		        $this->max_units_allowed          = $row->max_units_allowed;

		        $this->days_unit_lasts            = $row->days_unit_lasts;

		        $this->min_active_units			  = $row->min_active_units;

		        $this->min_total_cash_earned	  = $row->min_total_cash_earned;



		        $this->payment_return_url	 = $row->payment_return_url;

		        $this->payment_cancel_url	 = $row->payment_cancel_url;



		        $this->sandbox_email  	     = $row->sandbox_email;

		        $this->sandbox_security_code = $row->sandbox_security_code;

		        $this->payment_mode	         = $row->payment_mode;

				$this->max_banners			 = $row->max_banners;

				$this->cost_per_thousand	 = $row->cost_per_thousand;



				$this->login_cost_per_hundred = $row->login_cost_per_hundred;

		        $this->item_name	         = $row->item_name;

				$this->login_timer			 = $row->login_timer;

				$this->login_sites_allowed	 = $row->login_sites_allowed;

				$this->buy_unit_status	     = $row->buy_units_status;

				$this->vc_log_email	 		 = $row->vc_log_email;

				$this->vc_log_security_code	 = $row->vc_log_security_code;

				$this->login_cancel_url	 	 = $row->login_cancel_url;
				$this->login_return_url	 		 = $row->login_return_url;

				$this->vc_item_name	 		 = $row->vc_item_name;

				$this->vc_cancel_url	 		 = $row->vc_cancel_url;
				$this->vc_return_url	 		 = $row->vc_return_url;

      }

}
