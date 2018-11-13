<?php 

// disable full scren
vc_add_param( 'vc_row' , array(
      "type" => "checkbox",
      "heading" => esc_html__("Enable Inner Container","csx-event-point"),
      "param_name" => "enable_full_screen",
	  "value" => array( esc_html__("Yes", "vcx-theme-core") => 'yes') ,
      "description" => ""
));


