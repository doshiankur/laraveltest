<html>
<head>
	<title>User Management System</title>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<style type="text/css">
.error{
 color: red;
} 
</style>
</head>
<div class="container">
  <!-- {{$errors}} -->
<form name="user_form" id="user_form" method="post" action="userpost" enctype="multipart/form-data">
	@csrf
	<div class="form-group">
    	<label for="exampleInputEmail1">Full Name</label>
    	<input type="text" name="username" id="username" placeholder="Enter Full Name" value="{{old('username')}}" class="form-control">
      <span class="error">@error('username'){{$message}}@enderror</span>
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Email</label>
         <input type="text" name="useremail" id="useremail" placeholder="User Email" value="{{old('useremail')}}" class="form-control">
         <span class="error">@error('useremail'){{$message}}@enderror</span>
  </div>
   
   <div class="form-group">
		<label for="exampleInputEmail1">Date Of Joining</label>         
         <input class="datepicker  form-control" name="join_date" value="{{old('join_date')}}" data-date-format="dd-mm-yyyy" placeholder="Date Of Joining">
         <span class="error">@error('join_date'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Date Of Leaving</label>         
         <input class="datepicker form-control" name="leaving_date" disabled="disabled" id="leaving_date" value="{{old('leaving_date')}}" data-date-format="dd-mm-yyyy" placeholder="Date Of Leaving">
         <input type="checkbox" name="still_working" id="still_working" checked="checked"
          value="1">Still Working
         <span class="error">@error('leaving_date'){{$message}}@enderror</span>
  </div>
  <div class="form-group">
		<label for="exampleInputEmail1">Upload Image</label>
         <input type="file" name="avatar" id="avatar" placeholder="User Avatar" class="form-control">
         <span class="error">@error('avatar'){{$message}}@enderror</span>
  </div>

   <button type="submit" class="btn btn-primary">Submit</buttton>
</form>
</div>  
<script type="text/javascript">	
  $(document).ready(function(){
      $('#still_working').click(function() {
         if($(this).prop("checked") == true){
                 $('#leaving_date').val('');
                 $("#leaving_date").attr("disabled", "disabled");      
            }
            else if($(this).prop("checked") == false){
                $("#leaving_date").prop( "disabled", false );
            }     
      });
  });
  //$('.datepicker').datepicker();
  $(".datepicker").datepicker({
    endDate: "now()" 
});
</script>
</html>