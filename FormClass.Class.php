<? 
	class Form {
		
		public $action;
		public $method;
		
		function __construct($type, $where, $class, $file) {
			if ($class): $printClass = 'class="' . $class . '"'; endif;
			if($file) {$upload = 'enctype="multipart/form-data"';}
			echo '<form action="'.$where.'"' . $printClass . " method='$type' " .$upload. ' > '; 
		}// End of construct
		
		function __destruct() {
    		echo"<br> \n   </form>";
		}// End of the
		
		function get_form_text_box($value, $name, $label, $placeholder, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			if($value) { $val = ' value="'.$value.'" '; }
			else{ $val = ' placeholder="'.$value.'" '; }
			
			echo '<label>' . $label. "</label> \r" ; 
			echo '<input type="text"'.$printClass . $printID . $val.'" name="'. $name . '"/>';	
		} // End of the get_text_box method
		
		function get_form_selection($selectOptionArray, $arrayValue, $name, $label, $class, $id) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			
			echo '<label>' . $label. "</label> \r" ; 
			echo "<select " . $printClass . $printID . 'name ="' . $name . '" >';
			if($selectOptionArray) { foreach($selectOptionArray as $input => $value) {
			echo '  <option value= "' .$value. '" >' . $input . '</option>'  ;
				} 
			}
			foreach($arrayValue as $input => $value) {
				
				echo '  <option value= "' .$value. '" >' . $input . '</option>'  ;
				
			}//End of foreach loop
			
			echo "</select>";
		}//End of the get_form_selection
		
		function get_form_radio($arrayValue, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			
			echo '<label>' . $label. " : </label> \n  <br> \r" ; 
			echo '<p>';
			foreach($arrayValue as $input => $value){
		
			echo  "<label> \r";
			echo '  <input type="radio" name="' . $name .'" value="' .$value . '"'. " > \r";
    		echo $input ." </label> \n  <br>" ;
			}
			echo '</p>';
		}//End of the get_form_radio
		
		function get_form_email_box($value, $name, $label, $placeholder, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			if($value) { $val = ' value="'.$value.'" '; }
			else{ $val = ' placeholder="'.$value.'" '; }
			
			echo '<label>' . $label. "</label> \r" ;	 
			echo '<input type="email"' ; 
			echo $printClass . $printID.$val.'" name="'. $name . '"/>';
		} // End of the get_email_box method
		
		function get_form_tel_box($value, $name, $label, $placeholder, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			if($value) { $val = 'value="'.$value.'" '; }
			else{ $val = 'placeholder="'.$value.'" '; }
			
			echo '<label>' . $label. "</label> \r" ; 
			echo '<input type="tel"' ; 
			echo $printClass . $printID . $val.'" name="'. $name . '"/>';	
		} // End of the get_tel_box method
		
		function get_form_pass_box ($value, $name, $label, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			echo '<label>' . $label. "</label> \r" ;
			echo '<input type="password"' ; 
			echo $printClass . $printID . 'value ="'. $value .'" name="'. $name . '"/>';	
			 
		} // End of the get_pass_box method
		
		function get_form_checkbox ($arrayValue, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			
			echo '<label>' . $label. "</label> \r" ; 
			foreach($arrayValue as $input => $value){
				
			echo  "<br>\r";
			echo '  <input type="checkbox" name="' . $name .'" value="' .$value . '"'. " > \r";
    		echo $input ."\n" ;
				}	
			
			}// End of the chechbox method	
		
		function get_form_textarea ($value, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			echo '<label>' . $label. "</label> \r" ; 
			echo '  <textarea type="checkbox" name="' . $name . '"'. $printClass . $printID ." > $value \r";
			echo '	</textarea> ';
			
			}// End of the chechbox method	
		
		function get_form_buttom($value, $name, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			
			echo '<input type="submit" value="'.$value.'" name="'.$name.'" '. $printClass . $printID . ' ><br />';
		}
		
		function get_form_hidden($value, $name){
			
			echo '<input type="hidden" value="'.$value.'" name="'.$name.'" '. $printClass . $printID . ' >'." \r";
		}
		function get_form_file($value, $name, $label){
		echo "<label>$label</label>";	
		echo '<input type="file" name="'. $name.'" >';
		}
		
		function get_form_selection_date($untilYear, $name, $label, $class, $id) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			
			//Month
			echo "<select " . $printClass . 'name ="'.$name.'-m" >';
			for ($x = 1; $x <= 12; $x++) {			
			echo '  <option value= "' .$x. '" >' . $x . '</option>'  ;
			} 
			echo "</select>";
			
			//Day
			echo "<select " . $printClass . 'name ="'.$name.'-d" >';
			for ($x = 1; $x <= 31; $x++) {			
			echo '  <option value= "' .$x. '" >' . $x . '</option>'  ;
			} 
			echo "</select>";
			
			//Year 
			echo "<select " . $printClass . 'name ="'.$name.'-y" >';
			for ($x = 1940; $x <= $untilYear; $x++) {			
			echo '  <option value= "' .$x. '" >' . $x . '</option>'  ;
			} 
			echo "</select>";
			echo '<label>' . $label. "</label> \r" ;
		}
	}// End of the Form Class 
	
	
	
	
	
	class FormEffect {
		
		public $action;
		public $method;
		
		function __construct($type, $where, $class, $file) {
			if ($class): $printClass = 'class="' . $class . '"'; endif;
			if($file) {$upload = 'enctype="multipart/form-data"';}
			echo '<form name="myForm" action="'.$where.'"' . $printClass . ' onsubmit="return validateForm()" method="'.$type.'" ' .$upload. ' > '; 
		}// End of construct
		
		function __destruct() {
    		echo"<br> \n   </form>";
		}// End of the
		
		function get_form_text_box($value, $name, $label,  $class, $id) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			if($value) { $val = ' value="'.$value.'" '; }
			
			echo '<div>';
			echo '<input type="text"'.$printClass . $printID . $val.'" name="'. $name . '" required=""/>';
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ; 
			echo '</div> <br />';	
		} // End of the get_text_box method
		
		function get_form_selection($option, $arrayValue, $name, $label, $class, $id) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			
			echo '<div>';
			echo "<select " . $printClass . $printID . 'name ="' . $name . '" >';
			if($option) { echo '  <option value= "' .$option. '" >' .$option. '</option>'; } 
			
			foreach($arrayValue as $input => $value) {
				
				echo '  <option value= "' .$value. '" >' . $input . '</option>'  ;
				
			}//End of foreach loop
			
			echo "</select>";
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ;
			echo '</div> <br />';
		}//End of the get_form_selection
		
		function get_form_radio($arrayValue, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			echo '<div>';
			echo '<p>';
			echo '<span> <b>' . $label. " : </b></span> \n  <br /> <br /> \r" ; 
			foreach($arrayValue as $input => $value){
		
			echo  '<span>' .$input ."</span>" ;
			echo '  <input type="radio" name="' . $name .'" value="' .$value . '"'. " >";
    		
			}
			echo '</p>';
			
			echo '</div> <br />';
		}//End of the get_form_radio
		
		function get_form_email_box($value, $name, $label, $placeholder, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			if($value) { $val = ' value="'.$value.'" '; }
			else { $val = ' placeholder="'.$placeholder.'" ';}
			echo '<div>';
			echo '<input type="email"' ; 
			echo $printClass . $printID.$val.'" name="'. $name . '"/>';
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ;
			echo '</div> <br />';	
		} // End of the get_email_box method
		
		function get_form_tel_box($value, $name, $label, $placeholder, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			if($value) { $val = 'value="'.$value.'" '; }
			else { $val = ' placeholder="'.$placeholder.'" ';}
			echo '<div>';
			echo '<input type="tel"' ; 
			echo $printClass . $printID . $val.'" name="'. $name . '"/>';	
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ;
			echo '</div> <br />';
		} // End of the get_tel_box method
		
		function get_form_pass_box ($value, $name, $label, $class, $id ) {
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			echo '<div>';
			echo '<input type="password"' ; 
			echo $printClass . $printID . 'value ="'. $value .'" name="'. $name . '"/>';	
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ; 
			echo '</div> <br />';
		} // End of the get_pass_box method
		
		function get_form_checkbox ($arrayValue, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="$id" ';}
			echo '<span for="'.$id.'" >' . $label. "</span> \r" ; 
			foreach($arrayValue as $input => $value){
				
			echo  "<br>\r";
			echo '  <input type="checkbox" name="' . $name .'" value="' .$value . '"'. " > \r";
    		echo $input ."\n" ;
				}	
			
			}// End of the chechbox method	
		
		function get_form_textarea ($value, $name, $label, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			 echo '<div>';
			echo '  <textarea type="checkbox" name="' . $name . '"'. $printClass . $printID ." > $value \r";
			echo '	</textarea> ';
			echo '<label for="'.$id.'" >' . $label. "</label> \r" ;
			echo '</div> <br />';
			}// End of the chechbox method	
		
		function get_form_buttom($value, $name, $class, $id){
			if ($class) { $printClass = 'class="' . $class . '" ';} 
			if ($id) { $printID  = 'id="'.$id.'" ';}
			
			echo '<input type="submit" value="'.$value.'" name="'.$name.'" '. $printClass . $printID . ' ><br />';
		}
		
		function get_form_hidden($value, $name){
			
			echo '<input type="hidden" value="'.$value.'" name="'.$name.'" '. $printClass . $printID . ' >'." \r";
		}
		function get_form_file($value, $name, $label){
		echo '<label for="'.$id.'" >'.$label.'</label>';	
		echo '<input type="file" name="'. $name.'" >';
		}
	}// End of the Form Class 
		
	?>