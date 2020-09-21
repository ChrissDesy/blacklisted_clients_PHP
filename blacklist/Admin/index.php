<?php 
	session_start();
	include('../includes/dbcon.php');

	if($_SESSION['username'] == ''){
        echo "<script type='text/javascript'> document.location ='../controllers/logout.php'; </script>";
    }

	include('../controllers/crud.php');
?>

<!DOCTYPE html>
<html>
    <head>
    	<link rel="shortcut icon" href="../assets/img/favicon.png">
        <title>Admin | Home</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert2.min.css">
        <link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/All.css">
        <!-- <link rel="stylesheet" type="text/css" href="../assets/css/adminlte.min.css"> -->
    </head>

    <body style="font-size: 13px;">

    	<div class="wrapper">
    		<div>
    			<!-- Navbar -->
	            <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="border-radius: 0; margin: 0; background-color: rgb(29, 0, 62); padding: 2% 4% 0;">
	                
	                <div class="row col-md-12">
	                	<div class="col-md-6">
	                		<label style="color: white;">
	                			<?php echo $_SESSION['username']; ?>
	                		</label>
	                	</div>
	                	<div class="col-md-6" align="right">
	                		<label>
	                			<a href="../controllers/logout.php">Logout</a>
	                		</label>
	                	</div>
	                </div>
	            </nav>
	            <!-- /.navbar -->

	            <!-- body -->
	            <div class="content-wrapper" style="margin: 0;">
	            	<section class="content-header">
			            <div class="container-fluid">
			                <h1>All Blacklisted Clients</h1>
			            </div><!-- /.container-fluid -->
			        </section>

	            	<div class="content">
	            		<div class="card">
	                        <div class="row" style="margin: 10px;">    
	                        	<div class="card-header col-12" align="right">
	                                
	                            </div>
	                        </div>
                        
	                        <div class="card-body" >
								<div class="col-md-12" align="center">
									Search:
									<input type="text" id="mySearch" class="form-control" onkeyup="search()" placeholder="Enter Search Word" style="width: 50%;">
								</div>

	                            <div class="col-md-12"  style="margin-top: 2%; display: none;" id="tableArea">
									<table class="table table-bordered table-striped" id="List">
										<thead>
											<tr>
												<th>Id</th>
												<th>Account&nbsp;Name</th>
												<th>Account&nbsp;Type</th>
												<th>Institution</th>
												<th>Account&nbsp;Manager</th>
												<th>Date&nbsp;Blacklisted</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="myBody">
											
										</tbody>
									</table>
								</div>
	                        </div>
	                        
	                    </div>
	            	</div>
	            </div>
	            <!-- /.body -->
    		</div>

    		<div class="modal fade" id="edit">
		        <div class="modal-dialog">
		          <div class="modal-content" style="min-height: 550px;">
		            <div class="modal-header">
		              <h4 class="modal-title">Edit Record</h4>
		              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>
		            <div class="modal-body">
		              <form method="post">
		              	<div id="editBody">
							<div class="col-md-12">
								Account Name
								<input type="text" class="form-control" id="myName" name="aname">
								<input type="text" class="form-control" id="myId" name="id" style="display:none;">
							</div>
							<div class="col-md-12" style="margin-top: 4%;">
								Account Type
								<input type="text" class="form-control" id="myType" name="atype">
							</div>
							<div class="col-md-12" style="margin-top: 4%;">
								Institution
								<input type="text" class="form-control" id="myInst" name="inst">
							</div>
							<div class="col-md-12" style="margin-top: 4%;">
								Account Manager
								<input type="text" class="form-control" id="myMan" name="aman">
							</div>
							<div class="col-md-12" style="margin-top: 4%;">
								Date Blacklisted
								<input type="date" class="form-control" id="myDate" name="dat">
							</div>
						</div>
		              	<div class="col-md-12" style="margin-top: 4%;" align="center">
		              		<button style="width: 100px;color: green;" type="submit" name="editRec" class="form-control">Save</button>
		              	</div>
		              </form>
		            </div>
		          </div>
		          <!-- /.modal-content -->
		        </div>
		        <!-- /.modal-dialog -->
	      	</div>
		      <!-- /.modal -->

	      	<div class="modal fade" id="docs">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Delete Record</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
						<form method="post">
							<div align="center">
								<h3>Confirm Delete Record.?</h3>
								<input type="text" class="form-control" id="myId2" name="id" style="display:none;">
							</div>
							<div class="col-md-12" style="margin-top: 4%;display: flex;" align="center">
								<button style="width: 70px;color: red;" type="submit" name="deleteRec" class="form-control">Delete</button>
								<button style="width: 70px;color:rgb(133, 56, 221);" type="button" data-dismiss="modal">Cancel</button>
							</div>
						</form>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
          	</div>

    	</div>

    </body>

    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/sweetalert2.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
    	$(function(){
    		$("#List").DataTable();
			getData();
    	});	

		function search(){
			var query = $('#mySearch').val();

			if(query.length > 2){
				// console.log(query, myList);

				var result = [];

				for (var i in myList) {
					if (myList[i].account_name.match(query) || myList[i].institution.match(query)) {
						result.push(myList[i]);
					}
				}

				// console.log(result)
				loadTable(result);

			}
		}

		function loadTable(info){
			// console.log(info);
			var output = '';
			$("#List").DataTable().destroy();

			if(info.length > 0){
				$('#mySearch').css({'border-color':'#ccc'});
				info.forEach(r => {
					var rec = '<tr>';
					
					rec += '<td>' + r.id + '</td><td>' + r.account_name + '</td><td>' + r.account_type + '</td><td>' + r.institution + '</td>'
					 	+ '<td>' + r.account_manager + '</td><td>' + r.date_blacklisted + '</td>';

					rec += '<td align="center"><button data-eid="'+r.id+'" style="color: blue;margin: 1%;" data-toggle="modal" data-target="#edit">Edit</button>'
					 	+ '<button data-eid="'+r.id+'" style="color: red;margin:1%;" data-toggle="modal" data-target="#docs">Delete</button></td>';

					rec += '</tr>';

					output += rec;
				});
			}
			else{
				$('#mySearch').css({'border-color':'red'});
				output = '';
			}

			$('#myBody').html(output);
			$("#List").DataTable();
			$('#tableArea').show();
		}	

		function getData(){
			$.ajax({
				url: '../controllers/get-all.php',
				method: 'POST',
				success: function(resp){
					// console.log(resp);
					setData(resp);
				}
			});
		}

		function setData(data){
			myList = data;
		}

		$("#edit").on('show.bs.modal', function (e) {
			
            var Id = $(e.relatedTarget).data('eid');
			// alert(Id);
			let obj;

			myList.forEach(r => {
				if(r.id == Id){
					obj = r;
				} 
			});

            console.log(obj);

			$('#myId').val(obj.id);
			$('#myName').val(obj.account_name);
			$('#myType').val(obj.account_type);
			$('#myInst').val(obj.institution);
			$('#myMan').val(obj.account_manager);
			$('#myDate').val(obj.date_blacklisted);
        });

		$("#docs").on('show.bs.modal', function (e) {
            
            var Id = $(e.relatedTarget).data('eid');
			// alert(Id);
            // let obj;

			// myList.forEach(r => {
			// 	if(r.id == Id){
			// 		obj = r;
			// 	} 
			// });

            // console.log(obj);
			$('#myId2').val(Id);
        });

    </script>

</html>