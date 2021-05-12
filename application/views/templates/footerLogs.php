<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script type="text/javascript">
 $(document).ready(function(){
	var d = new Date();
	var strDate = d.getFullYear() + ("0" + (d.getMonth() + 1)).slice(-2) + ("0" + d.getDate()).slice(-2);
    var exportLogTable = $('#exportLogTable').DataTable({
        language: {
            search: "",
            searchPlaceholder: "Search here"
        },
    	dom: 'Bfrti',
        buttons: [
                {
                     extend: 'collection',
                     text: 'Export As',
                     buttons: [ {
                        extend: 'excelHtml5',
                        title: 'Export Log '+strDate,
                        header:true
                     },
                     {
                        extend: 'csvHtml5',
                        title: 'Export Log '+strDate,
                        header:true
                     }, 
                    ]
                }
            ],
        "scrollY":        "500px",
        "scrollCollapse": true,
        "paging":   false
    });

    var loginLogTable = $('#loginLogTable').DataTable({
    	dom: 'Bfrti',
        language: {
            search: "",
            searchPlaceholder: "Search here"
        },
        buttons: [
            {
                extend: 'collection',
                text: 'Export As',
                buttons: [ {
                    extend: 'excelHtml5',
                    title: 'User Log '+strDate,
                        header:true
                },
                {
                    extend: 'csvHtml5',
                    title: 'User Log '+strDate,
                    header:true
                }, 
                ]
            }
        ],
        "scrollY":        "500px",
        "scrollCollapse": true,
        "paging":   false
    });
});

document.getElementById('tableExp').style.display = 'block';
document.getElementById('loadingExp').style.display = 'none';
document.getElementById('tableLog').style.display = 'block';
document.getElementById('loadingLog').style.display = 'none';

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