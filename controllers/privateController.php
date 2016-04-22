<?php

class privateController {

	function SideBar() {
           
			session_start();
			$myusername = $_SESSION["myusername"];
           $rolename = $_SESSION["rolename"];
			
			
    $result = "<nav class='navbar-default navbar-side' role='navigation'>
            <div class='sidebar-collapse'>
                
            </div>
        </nav> ";
    
    return $result;
}
    
    
      function CreateContent()
    {
        
            
          $result = "
                <!-- /. NAV SIDE  -->
				
        <div id='page-wrapper'>
            <div id='page-inner'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h1 class='page-head-line'>Incorrect Permissions</h1>
						<h1 class='page-subhead-line'>You do not have the correct permissions of viewing this page</h1>
                    </div>
                </div>
                <!-- /. ROW  -->

            </div>
            <!-- /. PAGE INNER  -->
        </div>";
          
          $result = $result. "";
          
        return $result;
        
        
    }

}

?>