const adminRef=firebase.database().ref().child('admin');

adminRef.on("child_added", snap=>{
    var adminName=snap.child('admin_name').val();
    var userName=snap.child('username').val();
    var type=snap.child('type').val();
    var id=snap.key;
    var node=document.getElementById("appendUsers");
    
    
    node.innerHTML('
    
    '<div class="col-sm-4 mb-5">'+
	    '<div class="card">'+
			'<div class="card-body">'+
                '<h4 class="card-title">' + userName + '</h4>'+
                '<h6 class="card-subtitle mb-2 text-muted">' + adminName + '</h6>'+
                '<h6 class="card-subtitle mb-2 text-muted">'+ type +'</h6>'+
                '<div class="float-right">'+
                '<a data-toggle="collapse" class="btn btn-outline-danger" href="#removeThis" aria-expanded="false" aria-controls="tempRemove">Remove</a>'+
                '</div>'+
            '</div>'+
			'<div class="collapse bg-dark text-light" id="removeThis'+ id +'">'+
			'<div class="card-body text-center">Are you sure you want to remove '+ userName + '</div>'
			'<form method="post">'+
				'<a class="btn btn-sm btn-secondary" data-toggle="collapse" href="with ID" aria-expanded="false">No</a>'+
                '<button class="btn btn-sm btn-primary" type="submit" name="btnremove" value="with ID">Yes</button>'+
                '</form>'+
			'</div>'+
			'</div>'+
		'</div>'+
	'</div>'
    
    
    
    
    
    ');
});