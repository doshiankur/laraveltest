<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
<h1>User Records</h1>
<a href="users">Add New</a>

<style type="text/css">
  img{
    clip-path: circle();
}
</style>
<table border="1">
	<tr>
       <td>Avtar</td><td>Name</td><td>Email</td><td>Experience</td><td>Action</td>
	</tr>
	@foreach($user_list as $user_list)
	   <tr>
      <td><img src="{{ asset('storage/app/public/uploads/'.$user_list->strUserAvatar)}}" width="50px" height="50px;"></td>
        <td>{{$user_list->strUserName}}</td>
        <td>{{$user_list->strUserEmail}}</td>
        <td><?php
        	$date1= $user_list->dtiJoinDate;
        	$date2= $user_list->dtiLeavingDate;
            $origin = new DateTime($date1);
            $target = new DateTime($date2);
            $interval = $origin->diff($target);
            echo $interval->format('%y Years, %m Months');
        	?></td>
        <td><a class="delete" data-id="{{ $user_list->id }}" id="d_{{$user_list->id}}"  href="javascript:void(0);">Remove</a></td>
	   </tr>
	@endforeach
</table>
<script type="text/javascript">
	$(document).ready(function(){
         $(".delete").click(function(){
         	 var answer = confirm('Are you sure you want to delete?');
            if(answer==true){
              var id = $(this).data("id");
              $.ajax({
        				url: "deletedata/"+id,
        				type: 'get',
        				data: {
            				"id": id
        				},
        				success: function (){
            				location.reload();
        				}
    			});
            }              
         });		
	});
</script>