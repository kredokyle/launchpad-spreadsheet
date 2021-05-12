<style>#reports_{color: #fff} button.dt-button{margin-bottom:10px} .dataTables_wrapper{font-size: 13px}</style>
<br><i><h3 class="text-muted"><?= $title ?></h3></i><hr><br>

<body>
<div id="loading" class="text-center"><img src="http://indiawebsoft.com/images/loader1.gif" alt="Loading..."></div>
    <div id="table" style="display: none">
        <?php if($value != null){?>
        <table id="profilingTable" class="compact table-bordered table-hover" width="100%" style="font-size: 13px">
            <thead>
                <tr>                   
                    <th class="table-success">Username</th>
                    <th class="table-success">Assigned Rows</th>
                    <th class="table-success">Rows Profiled</th>
                    <th class="table-success">Rows Qualified</th>
                    <th class="table-success">Date</th>
                </tr>
            </thead>
            <tbody>                
                <?php foreach($value as $row) : ?>
                <tr>
                    <td><?=$row['username']?></td>
                    <td><?php 
                    if(!empty($assignedrows[$row['username']])){
                    echo $assignedrows[$row['username']]; 
                    }else{
                    echo "None";
                    }

                    ?></td>
                    <td><?=$row['COUNT(isEdited)']?></td>
                    <td><?=$row['COUNT(isQualified)']?></td>
                    <td><?=$row['isEdited']?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
         <?php }else{
            echo "<div class='alert alert-danger text-center m-4 font-weight-bold'>Report is empty.</div>";
         } ?>