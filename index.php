<!DOCTYPE html>
<html>
<head>
<title>Pagination By Javascript</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>


	.content_wrap {
	    width: 30%;
        background-color: #040523;
	    margin: 3% auto;
	    border: 2px solid #0405232e;
	    box-shadow: 1px 5px 10px 18px #e4dddd;
    }

    .heading{
    	color: #fff;
	    text-align: center;
	    padding: 10px;
    }

    .text_country {
	    color: #111e31;
	    font-weight: bold;
	    font-size: 15px;
	    background-color: #e4d9d9;
	    margin: 11px;
	    padding: 3px;
	}

    <!-- FOR PAGINATION-->

	.pagination {
		display: flex;
		margin: 9px auto 0;
	}
		     
	ul.pagination.paginate_align {
        margin: 2% auto;
        border: 1px solid #b5adad
    }	          
	.paginate_btn{		
		background-color: #e6dfdfd1 !important;
	    color: #111e31 !important;
	    font-weignt: bold;
	    font-weight: bold;
	 }    
		
	.pg_input {
		background: #040523;
		height: 34px;
	    width: 53px;
	    border-radius: 2px 3px 3px 0px;
	    font-size: 17px;
	    font-weight: bold;
	    text-align: center;
	    color:#bdb7bc;
	}				
	.hide_row{
		display:none;
	}  

   .algn_pagination{
	   display:flex;
    }
</style>	
</head>
<body>
<div class="content_wrap">
	<h1 class="heading">Countries List</h1>
	<?php 

	$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

	  foreach($countries as $key => $country){
	   echo'<div class="text_country hide_row" id="country'.++$key.'">' .$key.'. ' .$country.'</br></div>';
	  }
	 ?>


	<div class="algn_pagination">
		 <?php
	    	 $row_size = sizeof($countries);// total number of rows
	    	 $per_row = 10; // number of rows per page 
	    	 echo pagination($row_size,$per_row,'country');
		 ?>
	</div>
</div>

<?php

function getRandomWord($len = 10) {
    $word = array_merge(range('a', 'z'), range('A', 'Z'));
    shuffle($word);
    return substr(implode($word), 0, $len);
}


function pagination($total_row_count,$each_page_row_count,$row_id){
	
	if($total_row_count > $each_page_row_count){
		$pagination_id = $row_id.'page';
		$pagiantion_id = "'.$pagination_id.'";
	  ?>		
	                     
	    <script> 
	        var row_per_page=<?php echo $each_page_row_count; ?>;
			var rows_id=<?php echo "'".$row_id. "'"; ?>;
			
			for(var i=1;i<=row_per_page;i++){ 				
				$("#"+rows_id+i).removeClass("hide_row");			
			}
	                                    
	    </script> 
						 
	    <?php 
	        $pg_id = "'".$pagination_id."'";
			$rows_id = "'".$row_id."'";
		    
            $rem = $total_row_count % $each_page_row_count;
			$quotient = $total_row_count/ $each_page_row_count;
						  
			if($rem > 0){
				$num_page_nos=intval($quotient)+1;						   
			}else{
				$num_page_nos=$quotient; 
			}
							
			$pagination_field='<ul class="pagination paginate_align">';
							
			if($num_page_nos <5){
								
				for($a=1;$a<= $num_page_nos ;$a++){
					$pagination_field.='<li><a id="' .$pagination_id.$a .'" onclick="paginate_sub('.$a.','.$total_row_count.','.$each_page_row_count.','.$pg_id.','.$rows_id.')" >'.$a.'</a></li>';
				}
				
			}else{
								
				for($a=1;$a<= 5 ;$a++){
					$pagination_field.='<li><a id="'.$pagination_id. $a.'" onclick="paginate_sub('.$a.','.$total_row_count.','.$each_page_row_count.','.$pg_id.','.$rows_id.')">'.$a.'</a></li>';
				}
								
				$pagination_field.='<li><input  class="pg_input" type="number" min="1" max="'. $num_page_nos.'" id="input_page_'.$pagination_id.'" placeholder="Pg.no"   value="1" oninput="paginate_sub(this.value,'.$total_row_count.','.$each_page_row_count.','.$pg_id.','.$rows_id.')" /></li>';
                   
                $pagination_field.= '<li><a id="'.$pagination_id.$num_page_nos.'" onclick="paginate_sub('. $num_page_nos.','.$total_row_count.','.$each_page_row_count.','.$pg_id.','.$rows_id.')">'. $num_page_nos.'</a></li>';
			}
							
				$pagination_field.='<ul>';
							
				return $pagination_field;
							
	 }else{   ?>						
						
	    <script>    
                                    
			 var row_total = <?php echo $total_row_count; ?>;
			 var rows_id = <?php echo "'".$row_id. "'"; ?>;
			
				for(var i=1;i<=row_total;i++){ 				
				 $("#"+rows_id+i).removeClass("hide_row"); 				
				}
                                        
         </script> 						
	<?php	}						
}

?>


<script>

$(document).ready(function() {    
  $('ul.pagination > li:first-child a').addClass('paginate_btn');
});

 function paginate_sub(page_id,total_row,per_pg_row_count,page_no_id,row_id){ 
	 
	 var last= page_id*per_pg_row_count;
     var sub= per_pg_row_count-1
     var first= last-sub;
      
      for(var j=1;j<=total_row;j++){ 

      $("#"+row_id+j).addClass("hide_row");
     }
     
     for(var i=first;i<=last;i++){ 
      if(i<=total_row) {    
     
         $("#"+row_id+i).removeClass("hide_row");  
      }
     
     }             
             
	 for(var k=1;k<=total_row;k++){
	    $("#"+page_no_id+k).removeClass("paginate_btn");  
	 }
                 
      $("#"+page_no_id+page_id).addClass("paginate_btn");
             
      if(document.getElementById('input_page_'+page_no_id) != null) { 
         $("#input_page_"+page_no_id).val(page_id);         
       }
}
</script>

</body>
</html>