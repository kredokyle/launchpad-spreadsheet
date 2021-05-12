<style>#logs_{color: #fff} button.dt-button{margin-bottom:10px} .dataTables_wrapper{font-size: 13px}</style>
<br><i><h3 class="text-muted"><?= $title ?></h3></i><hr><br>

<body>
    <div id="loadingExp" class="text-center"><img src="http://indiawebsoft.com/images/loader1.gif" alt="Loading..."></div>
    <div id="tableExp" style="display: none">
    <?php if($export != null){?>
    <center><h5>Export</h5></center>
        <table id="exportLogTable" class="compact table-bordered table-hover" width="100%">
            <thead>
                <tr>                   
                    <th class="table-success">File Name</th>
                    <th class="table-success">Num. of Rows</th>
                    <th class="table-success">Exported By</th>
                    <th class="table-success">Date</th>
                    <th class="table-success">Time</th>
                </tr>
            </thead>
            <tbody>                
                <?php foreach($export as $row) : ?>
                <tr>
                    <td><?=$row['file_name']?></td>
                    <td><?=$row['rows']?></td>
                    <td><?=$row['user']?></td>
                    <td><?=$row['date']?></td>
                    <td><?=$row['time']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
         <?php }else{
            echo "<h5>Export log is empty.</h5>";
         } ?>
    </div>

    <div id="loadingLog" class="text-center"><img src="http://indiawebsoft.com/images/loader1.gif" alt="Loading..."></div>
    <div id="tableLog" style="display: none">
    <?php if($login != null){?>
    <div class="my-5">
        <center><h5>Login</h5></center>
        <table id="loginLogTable" class="compact table-bordered table-hover" width="100%">
            <thead>
                <tr>                   
                    <th class="table-success">Username</th>
                    <th class="table-success">Date</th>
                    <th class="table-success">Time</th>
                    <th class="table-success">Event</th>
                </tr>
            </thead>
            <tbody>                
                <?php foreach($login as $row) : ?>
                <tr>
                    <td><?=$row['username']?></td>
                    <td><?=$row['date']?></td>
                    <td><?=$row['time']?></td>
                    <td><?=$row['event']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
         <?php }else{
            echo "<h5>Login log is empty.</h5>";
         } ?>
         </div>
        </div>