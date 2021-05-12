<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script>
$('#addUserForm').submit(function(event){
    event.preventDefault();
    $('#btnSubmit').text('Saving...');

    var first = $('#addFirstname').val().trim();
    var last = $('#addLastname').val().trim();
    var user = $('#addUsername').val().trim();
    var type = $('#addType').val();

    $.ajax({
        url: "<?php echo base_url('users/saveUser'); ?>",
        type: 'POST',
        data: 'first='+first+'&last='+last+'&user='+user+'&type='+type,
        success: function(message){
            if (message == true) {
                location.href = "<?=base_url('users'); ?>";
                $('#errorMessage').html('<p class="alert alert-success text-center">Saved successfully!</p>');
            } else if(message == false){
                $('#errorMessage').html('<p class="alert alert-danger text-center">Failed to save to database.</p>');
            } else {
                $('#btnSubmit').text('Save');   
                $('#errorMessage').html('<p class="alert alert-danger text-center">Username already exists.</p>');
                $('#addUsername').css({'border' : '1px solid #D80000', 'box-shadow' : '0 0 10px #D80000'});
            }
        }
    });
});

function file_onchange(id){
        var filearray = <?php echo json_encode($file); ?>;
        var fileselected = document.getElementById("selectfilename"+id).value;
        if(fileselected){
            document.getElementById("printnumrows"+id).innerHTML = "Unnassigned Rows: "+filearray[fileselected];
            document.getElementById("inputnumrows"+id).max = filearray[fileselected];    
        }else{
            document.getElementById("printnumrows"+id).innerHTML = "Please select a file";
        }
}

function updateType(id){
    $('#btnUpdate').text('Updating...');
    
    var type = $('#updateType').val();
    
    $.ajax({
        url: "<?php echo base_url('users/updateType'); ?>",
        type: 'POST',
        data: 'id='+id+'&type='+type,
        success: function(data){
            $('#btnUpdate').text('Update');
        }
    });
};

$('#changePasswordSubmit').submit(function(event){
    event.preventDefault();
    $('#btnChangePassword').text('Saving...');

    var oldpass = $('#oldpass').val().trim();
    var newpass = $('#newpass').val().trim();
    var confirmpass = $('#confirmpass').val().trim();

    $.ajax({
        url: "<?php echo base_url('users/changePassword'); ?>",
        type: 'POST',
        data: 'oldpass='+oldpass+'&newpass='+newpass+'&confirmpass='+confirmpass,
        success: function(message){
            if(message == 'Success') {
                $('#changePasswordError').html('<p class="alert alert-success text-center">Saved successfully!<br>Redirecting to Home...</p>');
                window.setTimeout(function(){
                    window.location.href = "<?=base_url('home/index'); ?>";
                }, 2000);
            }else if(message == 'Fail'){
                $('#changePasswordError').html('<p class="alert alert-danger text-center">Failed to save to database.\nRedirecting to Home...</p>');
                window.setTimeout(function(){
                    window.location.href = "<?=base_url('home/index'); ?>";
                }, 2000);
            }else if(message == 'Incorrect'){
                //old password is incorrect
                $('#newpass').removeClass('border-danger');
                $('#confirmpass').removeClass('border-danger');
                $('#oldpass').addClass('border-danger');

                $('#changePasswordError').html('<p class="alert alert-danger text-center">Old password is incorrect.</p>');
                $('#btnChangePassword').text('Save');
            }else if(message == 'Same'){
                //new password is same with old
                $('#confirmpass').removeClass('border-danger');
                $('#oldpass').removeClass('border-danger');
                $('#newpass').addClass('border-danger');
                
                $('#changePasswordError').html('<p class="alert alert-danger text-center">New password must not match previous password.</p>');
                $('#btnChangePassword').text('Save');
            }else if(message == 'NotMatch'){
                //new and confirm did not match
                $('#oldpass').removeClass('border-danger');
                $('#newpass').addClass('border-danger');
                $('#confirmpass').addClass('border-danger');

                $('#changePasswordError').html('<p class="alert alert-danger text-center">Password does not match the confirm password.</p>');
                $('#btnChangePassword').text('Save');
            }
        }
    });
});
</script>
    </body>
</html>