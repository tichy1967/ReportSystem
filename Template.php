<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title; ?></title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
   

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
 

<script type="text/javascript">

$(document).ready(function(){

    var counter = 1;
	
	
    $("#addTextBox").click(function () {
	//Checks to see if there is more than 99 items		
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}   
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html('<label>Textbox</label><br>' +
	      '<input type="hidden" name="fieldtype' + counter + 
	      '" id="fieldtype' + counter + '" value="textbox">' +
		  ' <label>Label : </label>' +
	      '<input type="text" name="Label' + counter + 
	      '" id="Label' + counter + '" value="" required>' +
		  ' <label>Mandatory :</label>' +
		  '<input type="hidden" name="Mandatory' + counter + '" value="No">' +
	      '<input type="checkbox" name="Mandatory' + counter + 
	      '" id="Mandatory' + counter + '" value="Yes" >');
    
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });
	 
	  $("#addDatefield").click(function () {
	//checks to see if there is more than 99 items			
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html('<label>Datefield</label><br>' +
	      '<input type="hidden" name="fieldtype' + counter + 
	      '" id="fieldtype' + counter + '" value="datefield" >' +
		  ' <label>Label :</label>' +
	      '<input type="text" name="Label' + counter + 
	      '" id="Label' + counter + '" value="" required>' +
		  ' <label>Mandatory :</label>' +
		  '<input type="hidden" name="Mandatory' + counter + '" value="No">' +
	      '<input type="checkbox" name="Mandatory' + counter + 
	      '" id="Mandatory' + counter + '" value="Yes" >');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

				
	counter++;
     });
	 
	 $("#addFirstName").click(function () {
	//checks to see if there is already a first name field		
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html('<label>Firstname</label><br>' +
	      '<input type="hidden" name="fieldtype' + counter + 
	      '" id="fieldtype' + counter + '" value="firstname" >' +
		  ' <label>Label :</label>' +
	      '<input type="text" name="Label' + counter + 
	      '" id="Label' + counter + '" value="" required>' +
		  ' <label>Mandatory :</label>' +
	      '<input type="hidden" name="Mandatory' + counter + '" value="No">' +
	      '<input type="checkbox" name="Mandatory' + counter + 
	      '" id="Mandatory' + counter + '" value="Yes" >');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

	counter++;
     });
	 
	 $("#addLastName").click(function () {
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html('<label>Lastname</label><br>' +
	      '<input type="hidden" name="fieldtype' + counter + 
	      '" id="fieldtype' + counter + '" value="lastname" >' +
		  ' <label>Label :</label>' +
	      '<input type="text" name="Label' + counter + 
	      '" id="Label' + counter + '" value="" required>' +
		  ' <label>Mandatory :</label>' +
	      '<input type="hidden" name="Mandatory' + counter + '" value="No">' +
	      '<input type="checkbox" name="Mandatory' + counter + 
	      '" id="Mandatory' + counter + '" value="Yes" >');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

	counter++; 			
     });
	 
	  $("#addDOB").click(function () {
	//checks to see if there is already a last name field		
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}   
		
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);
                
	newTextBoxDiv.after().html('<label>Date Of Birth</label><br>' +
	      '<input type="hidden" name="fieldtype' + counter + 
	      '" id="fieldtype' + counter + '" value="dob" >' +
		  ' <label>Label :</label>' +
	      '<input type="text" name="Label' + counter + 
	      '" id="Label' + counter + '" value="" required>' +
		  ' <label>Mandatory :</label>' +
	      '<input type="hidden" name="Mandatory' + counter + '" value="No">' +
	      '<input type="checkbox" name="Mandatory' + counter + 
	      '" id="Mandatory' + counter + '" value="Yes" >');
            
	newTextBoxDiv.appendTo("#TextBoxesGroup");

	counter++
     });
	 
	 

     $("#removeButton").click(function () {
	if(counter>99){
            alert("You can only have 99 fields");
            return false;
	}    
        
	counter--;
			
        $("#TextBoxDiv" + counter).remove();
			
     });
		
    // $("#getButtonValue").click(function () {
	//	
	//var msg = '';
	//for(i=1; i<counter; i++){
   	//  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	//}
    //	  alert(msg);
    // });
  });
  
  $(function(){
  $('#sortable').tablesorter(); 
	});
	
  $(function() {
    $( "#dialog" ).dialog();
  });

</script>

	
	
	
 
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard.php"><img src="assets/img/logo.png" height="50" width="216"> </a>
				
            </div>
			
			<div class="header-right">

                <a href="logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-sign-out"></i></a>

            </div>

            <!-- /. Header
            <div class="header-right">

             <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
               <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>


            </div>
            -->
        </nav>
        <!-- /. Sidebar  -->
		<?php echo $sidebar; ?>

        <!-- /. Content  -->
		<?php echo $content; ?>
        

        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
         2016 Idea Gen | Website Produced By : Group 10 Integrated Project GCU
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script>
          
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 10000
    });
  });
                        

          
    $('tr[data-href]').on("click", function() {
    document.location = $(this).data('href');
});

          var $_GET = {};

document.location.search.replace(/\??(?:([^=]+)=([^&]*)&?)/g, function () {
    function decode(s) {
        return decodeURIComponent(s.split("+").join(" "));
    }

    $_GET[decode(arguments[1])] = decode(arguments[2]);
});

  $(function() {  
      
      //var $date = 'Wednesday, Feb 17 2016';
      var $date = $_GET['date']; 
        $( "#date" ).datepicker({  
            
                                
            defaultDate: $date,
           
           dateFormat: 'DD, M d yy',
             onSelect: function(date)
                        {
                        var links="?date=";
                        //alert(date);
                        window.location.href = links+date;
                        }
                        
        });
      });
  </script>
    
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
