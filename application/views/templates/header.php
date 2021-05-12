<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>

    <title>Launchpad Spreadsheet</title>

    <style type="text/css">
        #pageloader
        {
            background: rgba( 255, 255, 255, 0.8 );
            display: none;
            height: 100%;
            position: fixed;
            width: 100%;
            z-index: 9999;
        }
        #pageloader img
        {
          left: 50%;
          margin-left: -32px;
          margin-top: -32px;
          position: absolute;
          top: 50%;
        }
    </style>
  </head>
  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <a class="navbar-brand font-weight-bold" href="<?php echo base_url()."home/index"?>"><img src="<?php echo base_url('images/Launchpad-white.png'); ?>" style="width:200px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto text-center">
                <?php if($_SESSION['type']!='User'){ ?>
                <li class="nav-item mx-3">
                    <a class="nav-link" id="home_" href="<?php echo base_url('home/index'); ?>" data-toggle="tooltip" data-placement="bottom" title="Home"><i class="fas fa-home fa-lg"></i><br>Home<span class="sr-only">Home</span></a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" id="users_" href="<?php echo base_url('users'); ?>" data-toggle="tooltip" data-placement="top" title="Users"><i class="fas fa-users fa-lg"></i><br>Users<span class="sr-only">Users</span></a>
                </li>
                <li class="nav-item mx-3">
                    <a class="nav-link" id="reports_" href="<?php echo base_url('reports'); ?>" data-toggle="tooltip" data-placement="top" title="Users"><i class="fas fa-chart-bar fa-lg"></i><br>Reports<span class="sr-only">Reports</span></a>
                </li>
                <?php } if($_SESSION['type']=='Superadmin'){ ?>
                <li class="nav-item mx-3">
                    <a class="nav-link" id="logs_" href="<?php echo base_url('logs'); ?>" data-toggle="tooltip" data-placement="top" title="Logs"><i class="far fa-clock fa-lg"></i><br>Logs<span class="sr-only">Logs</span></a>
                </li>
                <?php } ?>
                </ul>
                
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-light px-4">Welcome <?php echo $_SESSION['fname']; ?></button>
                    <button type="button" class="btn btn-outline-light dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu bg-light">
                        <div class="card  border-light">
                            <div class="card-body text-center">
                                <h4><strong><?php echo $_SESSION['uname']; ?> </strong></h4>
                                <h6> <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?> </h6>
                                <i><?php echo $_SESSION['type']; ?> </i>
                                <center>
                                    <button class="btn btn-outline-secondary btn-sm form-control mt-5" data-toggle="modal" data-target="#changePasswordForm">Change Password</button>
                                    <button onclick="location.href='<?php echo site_url('/login/logout'); ?>';" class="btn btn-danger btn-sm form-control my-2"> Logout </button>
                                </center>
                            </div>
                        </div>
                    </ul>
                </div>

            </div>
        </nav>

        <div id="changePasswordForm" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="modal-title">Change Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form id="changePasswordSubmit">
                        <div class="modal-body form-group">
                            <div id="changePasswordError"></div>
                            <strong>Enter Old Password</strong>
                            <input class="form-control mt-1 mb-3" type="Password" id="oldpass" autofocus required />
                            <strong>New Password</strong>
                            <input class="form-control mt-1 mb-3" type="Password" id="newpass" required />
                            <strong>Confirm New Password</strong>
                            <input class="form-control mt-1 mb-3" type="Password" id="confirmpass" required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="submit" id="btnChangePassword" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<div class="container mt-3">