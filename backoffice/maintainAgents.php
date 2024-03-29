<?php  
session_start();
if(!isset($_SESSION['uid']) || $_SESSION['uid']==""){header("Location:index.html");}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Maintain Agents - Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link href="css/datepicker.css" rel="stylesheet">
<link href="css/jquery.dataTables.min.css" rel="stylesheet">
 
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<?php require_once('inc/header.php');?>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        
        <!-- /span6 -->
        <div class="span12">
		  <div class="widget">
	      			
	      			<div class="widget-header">
	      				<i class="icon-group"></i>
	      				<h3>Maintain Users/Agent</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<div id="reply"></div>
                      <form id="form" class="form-horizontal">
									<fieldset>
										
										
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">Users/Agent Name</label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="name" id="name" >
							<input type="hidden" class="span6 form-control" name="id" id="id" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
								<div class="control-group">											
								<label class="control-label" for="firstname">User Name</label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="username" id="username" >
							
											</div> <!-- /controls -->				
										</div>		
								<div class="control-group">											
								<label class="control-label" for="firstname">Password</label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="password" id="password" >
							
											</div> <!-- /controls -->				
										</div>		
									<div class="control-group">											
								<label class="control-label" for="firstname">User Type</label>
											<div class="controls">
							<select class="span6 form-control" name="usertype" id="usertype" >
							<option value="ADMIN">Admin</option>
							
							<option value="AGENT"> Agent</option>
							</select>
							
											</div> <!-- /controls -->				
										</div>	

                                                        <div class="control-group">											
								<label class="control-label" for="firstname">Company Name </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="nameofcompany" id="nameofcompany" >
							
											</div> <!-- /controls -->				
										</div>

                                                         <div class="control-group">											
								<label class="control-label" for="firstname">Corporate Office </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="corp_office" id="corp_office" >
							
											</div> <!-- /controls -->				
										</div>
                                                         
                                                         <div class="control-group">											
								<label class="control-label" for="firstname">Regional Office </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="reg_office" id="reg_office" >
							
											</div> <!-- /controls -->				
										</div>
                                                          <div class="control-group">											
								<label class="control-label" for="firstname">Hotline </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="hotline" id="hotline" >
							
											</div> <!-- /controls -->				
										</div>
                                                         <div class="control-group">											
								<label class="control-label" for="firstname">Email us </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="emailat" id="emailat" >
							
											</div> <!-- /controls -->				
										</div>

                                                         <div class="control-group">											
								<label class="control-label" for="firstname">Website </label>
											<div class="controls">
							<input type="text" class="span6 form-control" name="website" id="website" >
							
											</div> <!-- /controls -->				
										</div>

<div class="control-group">											
									<label class="control-label" for="logoofcompany">Company Logo</label>
								<div class="controls">
								<input type="file" class="span3 form-control" id="logoofcompany" name="logoofcompany">
								</div> <!-- /controls -->                                            				
						</div>



											<div class="control-group">											
								<label class="control-label" for="firstname">Active</label>
											<div class="controls">
							<select class="span6 form-control" name="active" id="active" >
							<option value="1">Active</option>
							<option value="0">Disabled</option>
					
							</select>
							
											</div> <!-- /controls -->				
										</div>	
                                       
											
										<div class="form-actions">
											<button type="submit" id="submit" class="btn btn-primary">Save</button> 
											<button class="btn">Cancel</button>
										</div> <!-- /form-actions -->
									</fieldset>
								</form>
								<table class="table table-bordered table-hover table-condensed" id="datatable">
								<thead>
								<tr>
								<th> ID</th>
								<th> Name</th>		
								<th> Username</th>	
								<th> User Type</th>	
								<th>Active</th>						
								<th>Actions</th>
								</tr>
								<thead>
								<tbody id="tbody">							
								
								
								</tbody>
								</table>
								</div>
								</div>
								</div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main --><div class="footer">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> &copy; <?php echo date('Y');?> <a href="www.northern-travels.com">northern-travels</a>. </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.datatables.js" type="text/javascript" ></script>


<script src="js/user.js"></script>
 <script type="text/javascript">
    /* Global JavaScript File for working with jQuery library */
        $(function(){
            // execute when the HTML file's (document object model: DOM) has loaded
   
            user_crud.init();
			  
        });
	
	
	
    </script>
<script src="js/common.js"></script>
 <script type="text/javascript">
    /* Global JavaScript File for working with jQuery library */
        $(function(){
            // execute when the HTML file's (document object model: DOM) has loaded  
           
            roombook_crud.init();
        });   
    </script> 
 <script>
 function fetchcheckhotels()
  {
    
   var $request = $.ajax({
                              url : 'inc/maintain_hotelroom.php',
                              type: "POST",
                              data: {action:"load"},
                             dataType: "JSON",
                            });
            $request.done(function(data) {
              //if success close modal and reload ajax table
                 //console.log(data);
                  if (data.status) {
                    $("#checkhotel").html(data.msg);
                  } else {
                      alert("Please reload the page...");
                  }
        });
  }
  $(function(){
fetchcheckhotels();
$("#date").datepicker({ startDate: new Date()});
$("#fromdate").datepicker({ startDate: new Date()});
$("#todate").datepicker({ startDate: new Date()});
$("#checkavail").on('click', function(event) {
        event.preventDefault();      
        
       
        if( $("#checkhotel").val()=="") {
          alert("Please Enter valid Hotel Name.....!");
        $("#checkhotel").focus();
        return;
       }
       if($("#date").val()=="")
       {
        alert("Please Enter valid date.....!");
        $("#date").focus();
        return;
       }
    
      var $formData = $('#checkform').serialize();
      $formData+="&action=checkavail";
        console.log($formData);

        var $request = $.ajax({
                              url :'inc/maintain_user.php',
                              type: "POST",
                              data: $formData,
                  dataType: 'json',
                //processData: false, // Don't process the files
                //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                            });
            $request.done(function(data) {
              //if success close modal and reload ajax table

                  if (data.status) {                 //console.log(data);
                    $("#loadAvail").html(data.msg);
           
             setTimeout(function() {
                 
                   
                },2000);
                  } else {
                        alert(data.msg);
                   setTimeout(function() {
                
                    
                },2000);
          }
              });
              $request.always(function(data) {
          console.log(data);
            
              // resetmem();
              });
      
      });
$("#changepass").on('click', function(event) {
        event.preventDefault();      
        
       
        if( $("#opass").val()=="") {
          alert("Please Enter valid old password.....!");
        $("#opass").focus();
        return;
       }
       if($("#npass").val()!=$("#cpass").val())
       {
        alert("Password do not match.....!");
        $("#npass").focus();
        return;
       }
    
      var $formData = $('#changeform').serialize();
      $formData+="&action=change";
        console.log($formData);

        var $request = $.ajax({
                              url :'inc/maintain_user.php',
                              type: "POST",
                              data: $formData,
                  dataType: 'json',
                //processData: false, // Don't process the files
                //contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                            });
            $request.done(function(data) {
              //if success close modal and reload ajax table

                  if (data.status) {                 //console.log(data);
                     alert(data.msg);
           
             setTimeout(function() {
                 
                   window.location.reload();
                },2000);
                  } else {
                        alert(data.msg);
                   setTimeout(function() {
                
                    
                },2000);
          }
              });
              $request.always(function(data) {
          console.log(data);
            
              // resetmem();
              });
      
      });
  });
  </script>
<script src="js/voucher.js"></script>
</body>
</html>
