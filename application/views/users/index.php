<style> #users_ { color: #fff; }</style>
<br><i><h3 class="text-muted"><?= $title ?></h3></i><hr><br>

<div class="row">
<?php foreach($users as $user) : ?>
<?php if($user['username'] != $_SESSION['uname']){ ?>
<?php if ($_SESSION['type'] === 'Superadmin' || ($_SESSION['type'] === 'Admin' && $user['type'] === 'User')  ){ ?>
<div class="col-md-3 mb-4">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $user['username']?></h4>
            <p class="card-subtitle text-muted"><?= $user['first_name'] . ' ' . $user['last_name'] ?></p>
            <p class="card-subtitle text-muted"><i><?= $user['type'] ?></i></p>
            <p class="card-subtitle text-muted"><i>Rows assigned: 
            	<?php if(!empty($assignedrows[$user['username']])){
            		echo $assignedrows[$user['username']]; 
            	}else{
            		echo "None";
            	}
            	?></i></p>
            <p class="card-subtitle text-muted"><i>Edited Rows: 
            	<?php if(!empty($editedRows[$user['username']])){
            		echo $editedRows[$user['username']]; 
            	} else {
            		echo "None";
            	}
            	?></i></p>
			
            <div class="float-right mt-3">
				<?php if($_SESSION['type'] === 'Admin' && $user['type'] == 'User'){ ?>
                <button class="btn btn-sm btn-outline-primary" data-toggle="modal" data-toggle="tooltip" title="Assign rows" href="#assignRows<?= $user['id'] ?>">
					<i class="fas fa-tasks" ></i>
				</button>
                <a data-toggle="collapse" data-toggle="tooltip" title="Remove Assigned Rows" class="btn btn-sm btn-outline-danger" href="#removeRows<?= $user['id'] ?>" aria-expanded="false" aria-controls="tempRemove"><i class="far fa-minus-square" alt="Remove"></i></a>
				<?php } if($_SESSION['type'] === 'Superadmin'){ ?>
				<button class="btn btn-sm btn-outline-secondary" title="Update type" href="#updateUser<?= $user['id']?>" data-toggle="modal">
            		<i class="fas fa-user-edit"></i>
        		</button>
                <a data-toggle="collapse" data-toggle="tooltip" title="Remove user" class="btn btn-sm btn-outline-danger" href="#removeUser<?= $user['id'] ?>" aria-expanded="false" aria-controls="tempRemove"><i class="fas fa-user-times" alt="Remove"></i></a>
				<?php } ?>
            </div>
			
        </div>
        <div class="collapse bg-dark text-light text-center" id="removeUser<?= $user['id'] ?>">
            <div class="card-body text-center">Are you sure you want to remove <?=$user['username'] ?>?</div>
            <a class="btn btn-sm btn-secondary ml-2 mb-2" data-toggle="collapse" href="#removeUser<?= $user['id'] ?>" aria-expanded="false">No</a>
			<a class="btn btn-sm btn-primary ml-2 mb-2" href="<?= base_url('users/deleteUser/'. $user['id'].'/'.$user['username'] ); ?>" >Yes</a> 
        </div>
        <div class="collapse bg-dark text-light text-center" id="removeRows<?= $user['id'] ?>">
            <div class="card-body text-center">Are you sure you want to remove rows from <?=$user['username'] ?>?</div>
            <a class="btn btn-sm btn-secondary ml-2 mb-2" data-toggle="collapse" href="#removeRows<?= $user['id'] ?>" aria-expanded="false">No</a>
			<a class="btn btn-sm btn-primary ml-2 mb-2" href="<?= base_url('users/deleteRows/'. $user['username'] ); ?>" >Yes</a> 
        </div>
    </div>
</div>

	<div class="modal fade" id="updateUser<?= $user['id']?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content bg-white">
				<div class="modal-header bg-info">
					<h4 class="modal-title">Update type of <strong><?= $user['username']; ?></strong></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="users/updateType" method="POST">
				<input name="updateID" type="hidden" value="<?= $user['id']?>">
				<div class="modal-body form-group">
					<select class="form-control" name="updateType">
						<option value="Admin">Admin</option>
						<option value="User">User</option>	
					</select>
				</div>
				<div class="modal-footer form-group">
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button class="btn btn-primary" type="submit">Update</button>
				</div>
				</form>
			</div>
		</div>
	 </div>


	<div class="modal fade" id="assignRows<?=$user['id']?>">
        <div class="modal-dialog">
    		<div class="modal-content">
    			<!-- Modal Header -->
			    <div class="modal-header">
			        <h4 class="modal-title">Assign rows to <?=$user['username']?></h4>
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			      </div>
			     <!-- Modal body -->
			    <form action="Users/assignRows" method="POST">
		      	<div class="modal-body form-group">
		        	<div class="container">
						<strong>Pick Rows</strong>
						<strong>From:</strong>
						<select class="form-control mb-2" name="selectfilename" id="selectfilename<?=$user['id']?>" onchange="file_onchange(<?=$user['id']?>)">
						<option></option>
						<?php
							foreach ($file as $filename => $number) {
								echo "<option value='".$filename."'>".$filename."</option>";
							}
						?>
						</select>
						<br>
						<i><p id="printnumrows<?=$user['id']?>"></p></i>
						<strong>Number of rows:</strong>
						<input class="form-control mb-2" type="number" name="rowto" min="1" id="inputnumrows<?=$user['id']?>" required/>
						<input type="hidden" name="username" value="<?=$user['username']?>">
					</div>
		      	</div>
		      	<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-primary">Save</button>
		      	</div>
		  	</form>
	   	</div>
	</div>
</div>

<?php }} ?>
<?php endforeach; ?>
</div>

<?php if($_SESSION['type'] === 'Superadmin'){ ?>
<div class="row">
    <div class="col-md-3 text-center pb-4">
        <button class="btn btn-outline-primary col-12" title="Add new user" href="#addUser" data-toggle="modal" style="height: 6rem">
            <i class="fas fa-user-plus fa-2x"></i>
        </button>
	</div>
</div>
<?php } ?>

	<!-- MODALS -->
	<div class="modal fade" id="addUser" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<form id="addUserForm">
				<div class="modal-content bg-white">
					<div class="modal-header bg-warning">
						<h4 class="modal-title" id="userLabel">Add New User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body form-group">
						<div class="container">
							<div id="errorMessage"></div>
							<strong>First name</strong>
							<input class="form-control mb-2" type="text" id="addFirstname" autofocus required />
							<strong>Last name</strong>
							<input class="form-control mb-2" type="text" id="addLastname" required />
							<strong>Username</strong>
							<input class="form-control mb-2" type="text" id="addUsername" required /> <!-- checkUsername() -->
							<strong>Type</strong>
							<!-- IF SESSION TYPE IS SUPERADMIN -->
							<?php if($_SESSION['type']=='Superadmin'){ ?>
							<select id="addType" class="form-control" name="type">
								<option value="Admin">Admin</option>
								<option value="User">User</option>							
							</select>
							<?php } else { ?>
							<!-- IF SESSION TYPE IS ADMIN -->
								<input class="form-control" type="text" id="addType" value="User" disabled/>
							<?php } ?>						
						</div>
					</div>
					<div class="modal-footer form-group">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<button class="btn btn-primary" type="submit" id="btnSubmit">Save</button>
					</div>
				</div>
			</form> 
		</div>
	</div>