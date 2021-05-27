
<!DOCTYPE html>
<html>
<head>
	<title>RESTFUL API</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<br />

		<h3 align="center">WEB SERVICE</h3>
		<br />
		<div class="row" id="insert">
			<form action="" method="POST" id="add">
				<div class="col-md-5 form-group" style="margin-left: -15px;">
					<label>Enter First Name</label>
					<input type="text" name="first_name" id="first_name" class="form-control" required="true" />
				</div>
				<div class="col-md-5 form-group" style="margin-left: -15px;">
					<label>Enter Last Name</label>
					<input type="text" name="last_name" id="last_name" class="form-control" required="true" />
				</div>
				<div class="col-md-2">
					<input type="submit" name="button_action" id="datasubmit" style="font-size: 15px; margin-top: 22px; min-width: 200px;" class="btn btn-primary" value="Insert" />
					
				</div>
			</form>

		</div>
		
		<div class="row" >
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>			

					</tbody>
				</table>
			</div>
		</div>
		<div id="result" class="row">
			<form action="" method="GET" id="up">
				<div class="col-md-5 form-group" style="margin-left: -15px;">
					<label>Enter First Name</label>
					<input type="text" name="first_name" id="ufirst_name" class="form-control" required="true" value=""/>
				</div>
				<div class="col-md-5 form-group" style="margin-left: -15px;">
					<label>Enter Last Name</label>
					<input type="text" name="last_name" id="ulast_name" class="form-control" required="true" value="" />
				</div>
				<div class="col-md-2">
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="submit" name="button_action" id="" style="font-size: 15px; margin-top: 22px; min-width: 200px;" class="btn btn-primary ccupdate" value="Update" />

				</div>
			</form>
		</div>
		
	</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#result').hide();
		fetch_data();

		function fetch_data()
		{
			$.ajax({
				url:"read.php",
				success:function(data)
				{
					$('tbody').html(data);
				}
			})
		}


		$('#add').on('submit', function(event){
			event.preventDefault();		
			var first_name=$("#first_name").val();
			var last_name=$("#last_name").val();
			$.ajax({
				url:"http://localhost/webservice/insert.php",
				method:"POST",
				data: { first_name: first_name, last_name: last_name },
				success:function(data)
				{

					fetch_data();
					alert("Thêm thành công");

				}
			});
			
		});


		$(document).on('click', '.delete', function(){
			
			var id = $(this).attr("id");
			if(confirm("Bạn có muốn xóa không?"))
			{
				$.ajax({
					url:"http://localhost/webservice/delete.php",
					method:"GET",	
					data:{id:id},	
					success:function(data)
					{
						fetch_data();
						alert("Xóa thành công");
					}
				});
			}
		});

		$(document).on('click', '.edit', function(){		
			$('#result').show();
			var id = $(this).attr('id');

			$.ajax({
				url: "read1.php",
				type: "POST",
				data: { id: id },
				dataType:"json",
				success: function (data) {
					$('#hidden_id').val(id);
					$('#ufirst_name').val(data[0]);
					$('#ulast_name').val(data[1]);					
				}
			})
		});

		$('#up').on('submit', function(event){
			event.preventDefault();		
			var id = $('#hidden_id').attr('value');		
			var first_name=$("#ufirst_name").val();
			var last_name=$("#ulast_name").val();
			$.ajax({
				url:"http://localhost/webservice/update.php",
				method:"POST",
				data: {id:id, first_name: first_name, last_name: last_name },
				success:function(data)
				{
					fetch_data();
					alert("Update thành công");
					$('#result').hide();
				}
			});
			
		});

	});
</script>
