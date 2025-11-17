<?php

class PopupSetting{
    var $pop_up_status;
    var $impressions;
    var $pop_up_click_count;
    var $pop_up_height;
    var $pop_up_weight;
    var $pop_up_bg_color;


var $pop_up_message ;
var $pop_up_message_font_color ;
var $pop_up_message_font_size ;
var $pop_up_message_font_face ;
var $pop_up_button_text ;
var $pop_up_button_size ;
var $pop_up_button_color ;
var $pop_up_button_font_face ;
var $pop_up_button_background ;
var $pop_up_button_url;
var $pop_up_button_hover_color ;




    

	function PopupSetting() {

	}

	function SetPostValues($p_array){
	    



		
        if (array_key_exists("pop_up_status", $p_array)) {
			$this->pop_up_status = trim($p_array['pop_up_status']) ;
		}
		if (array_key_exists("pop_up_height", $p_array)) {
			$this->pop_up_height = trim($p_array['pop_up_height']) ;
		}

		if (array_key_exists("pop_up_weight", $p_array)) {
			$this->pop_up_weight = trim($p_array['pop_up_weight']) ;
		}

		if (array_key_exists("pop_up_bg_color", $p_array)) {
			$this->pop_up_bg_color = trim($p_array['pop_up_bg_color']) ;
		}


		if (array_key_exists("pop_up_message", $p_array)) {
			$this->pop_up_message = trim($p_array['pop_up_message']) ;
		}
		if (array_key_exists("pop_up_message_font_color", $p_array)) {
			$this->pop_up_message_font_color = trim($p_array['pop_up_message_font_color']) ;
		}
		if (array_key_exists("pop_up_message_font_size", $p_array)) {
			$this->pop_up_message_font_size = trim($p_array['pop_up_message_font_size']) ;
		}
		if (array_key_exists("pop_up_message_font_face", $p_array)) {
			$this->pop_up_message_font_face = trim($p_array['pop_up_message_font_face']) ;
		}
		if (array_key_exists("pop_up_button_text", $p_array)) {
			$this->pop_up_button_text = trim($p_array['pop_up_button_text']) ;
		}
		if (array_key_exists("pop_up_button_size", $p_array)) {
			$this->pop_up_button_size = trim($p_array['pop_up_button_size']) ;
		}
		if (array_key_exists("pop_up_button_color", $p_array)) {
			$this->pop_up_button_color = trim($p_array['pop_up_button_color']) ;
		}
		if (array_key_exists("pop_up_button_font_face", $p_array)) {
			$this->pop_up_button_font_face = trim($p_array['pop_up_button_font_face']) ;
		}
		if (array_key_exists("pop_up_button_background", $p_array)) {
			$this->pop_up_button_background = trim($p_array['pop_up_button_background']) ;
		}
		if (array_key_exists("pop_up_button_url", $p_array)) {
			$this->pop_up_button_url = trim($p_array['pop_up_button_url']) ;
		}
		if (array_key_exists("pop_up_button_hover_color", $p_array)) {
			$this->pop_up_button_hover_color = trim($p_array['pop_up_button_hover_color']) ;
		}
		
     }



	// Check Site Updation Form

	function CheckPopupSetting() {

		$err_msg = '';
		
		
		

        if (!$this->pop_up_status) {
		 	 $err_msg .= "<li>Select valid pop_up_status</li>";

		}
		
		
		
		
		if (!$this->pop_up_height) {
		 	 $err_msg .= "<li>Enter valid pop_up_height</li>";

		}

		if (!$this->pop_up_weight) {
			 $err_msg .= "<li>Enter valid pop_up_weight</li>";

		}   
        

		if (!$this->pop_up_bg_color) {
			 $err_msg .= "<li>Enter valid pop_up_bg_color</li>";

		}








		if (!$this->pop_up_message) {
			 $err_msg .= "<li>Enter valid pop_up_message</li>";

		}

		if (!$this->pop_up_message_font_color) {
			 $err_msg .= "<li>Enter valid pop_up_message_font_color</li>";

		}

		if (!$this->pop_up_message_font_size) {
			 $err_msg .= "<li>Enter valid pop_up_message_font_size</li>";

		}

		if (!$this->pop_up_message_font_face) {
			 $err_msg .= "<li>Enter valid pop_up_message_font_face</li>";

		}

		if (!$this->pop_up_button_text) {
			 $err_msg .= "<li>Enter valid pop_up_button_text</li>";

		}

		if (!$this->pop_up_button_size) {
			 $err_msg .= "<li>Enter valid pop_up_button_size</li>";

		}

		if (!$this->pop_up_button_color) {
			 $err_msg .= "<li>Enter valid pop_up_button_color</li>";

		}

		if (!$this->pop_up_button_font_face) {
			 $err_msg .= "<li>Enter valid pop_up_button_font_face</li>";

		}

		if (!$this->pop_up_button_background) {
			 $err_msg .= "<li>Enter valid pop_up_button_background</li>";

		}

		if (!$this->pop_up_button_url) {
			 $err_msg .= "<li>Enter valid pop_up_button_url</li>";

		}
		
		if (!$this->pop_up_button_hover_color) {
			 $err_msg .= "<li>Enter valid pop_up_button_hover_color</li>";

		}




		return ($err_msg);

	}



    //reset
    
    function ResetPopupSetting(){
        $sql=" UPDATE popup_setting SET
            impressions		 = '0',
            pop_up_click_count		 = '0' ";
  		    mysqli_query($GLOBALS["___mysqli_ston"], $sql);        
    }

    //Update

        function UpdatePopupSetting() {

           global $tb_popup_setting,$db_obj,$base_url;

            $sql=" UPDATE popup_setting SET	
            
            
            pop_up_status		 = '$this->pop_up_status',
            
            
            
            
            pop_up_height		 = '$this->pop_up_height',
            pop_up_weight		 = '$this->pop_up_weight',
            pop_up_bg_color		 = '$this->pop_up_bg_color',

pop_up_message = '$this->pop_up_message',
pop_up_message_font_color = '$this->pop_up_message_font_color',
pop_up_message_font_size = '$this->pop_up_message_font_size',
pop_up_message_font_face = '$this->pop_up_message_font_face',
pop_up_button_text = '$this->pop_up_button_text',
pop_up_button_size = '$this->pop_up_button_size',
pop_up_button_color = '$this->pop_up_button_color',
pop_up_button_font_face = '$this->pop_up_button_font_face',
pop_up_button_background = '$this->pop_up_button_background',
pop_up_button_url = '$this->pop_up_button_url',
pop_up_button_hover_color = '$this->pop_up_button_hover_color'  ";                  

  		    mysqli_query($GLOBALS["___mysqli_ston"], $sql);
		    $this->GetPopupsetting();

       }



       function GetPopupsetting() {

           global $tb_popup_setting,$db_obj;

                $sql = "SELECT * FROM popup_setting";
                $res = mysqli_query($GLOBALS["___mysqli_ston"], $sql);
                $row=mysqli_fetch_object($res);
                $this->pop_up_status = $row->pop_up_status;
                
                
                $this->impressions = $row->impressions;
                $this->pop_up_click_count = $row->pop_up_click_count;
                
				$this->pop_up_height = $row->pop_up_height;
				$this->pop_up_weight = $row->pop_up_weight;
				$this->pop_up_bg_color = $row->pop_up_bg_color;





$this->pop_up_message = $row->pop_up_message;
$this->pop_up_message_font_color = $row->pop_up_message_font_color;
$this->pop_up_message_font_size = $row->pop_up_message_font_size;
$this->pop_up_message_font_face = $row->pop_up_message_font_face;
$this->pop_up_button_text = $row->pop_up_button_text;
$this->pop_up_button_size = $row->pop_up_button_size;
$this->pop_up_button_color = $row->pop_up_button_color;
$this->pop_up_button_font_face = $row->pop_up_button_font_face;
$this->pop_up_button_background = $row->pop_up_button_background;
$this->pop_up_button_url = $row->pop_up_button_url;
$this->pop_up_button_hover_color = $row->pop_up_button_hover_color;



      }

}
