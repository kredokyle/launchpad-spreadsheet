<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.16/fh-3.1.3/kt-2.3.2/sc-1.4.4/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src="<?php echo base_url()?>js/jquery-duplifer.js"></script>

<script>
    $(document).ready(function(){
    
    if('<?= $title?>' != 'Qualified'){
        $('#mainTable thead th').each(function(){
            var placeholder = $(this).text();
            var id = $('#mainTable tfoot th').eq($(this).index()).text();
            $(this).html("<input type='text' size='12' placeholder='"+placeholder+"' id='"+id+"'/>");
        });
    } else {
        $('#mainTable tfoot th').each(function(){
            var placeholder = $(this).text();
            var id = $('#mainTable tfoot th').eq($(this).index()).text();
            $(this).html("<input type='text' size='12' placeholder='"+placeholder+"' id='"+id+"'/>");
        });
        $('#mainTable tfoot tr').removeClass();
        $('#mainTable tfoot th').removeClass();
        $('#mainTable tfoot tr').addClass('bg-light');
        
        $('#mainTable thead').removeClass();
        $('#mainTable thead th').addClass('table-dark py-1');
    }

    $('#mainTable').duplifer();
    
    var d = new Date();

    <?php if(($title == 'Qualified') && (!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState']))){ ?>
    var ind = "<?php echo $_SESSION['filterIndustry']; ?>";
    var sta = "<?php echo $_SESSION['filterState']; ?>";
    exportTitle = 'Launchpad_'+ d.getFullYear() + ("0" + (d.getMonth() + 1)).slice(-2) + ("0" + d.getDate()).slice(-2) + '_' + ind.toLowerCase() + '_' + sta.toLowerCase();
    $('#exportFilename').html('<small>File name: ' + exportTitle +'</small>');
    <?php } ?>

    var mainTable = $('#mainTable').DataTable({
            "pagingType": "first_last_numbers",
            "lengthMenu": [[20, 50, 100, 200, -1], [20, 50, 100, 200, "All"]],
            "columnDefs": [ { "orderable": false, "targets": -1 } ],
            fixedHeader: true,
            responsive: true
            <?php if($title == 'Qualified' && (!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState']))){ ?>
            ,"dom": "<'my-1'<'row'<'col-12'B><'row'<'col-12 ml-3 mt-1'l>>>rt<ip>>",
            buttons: [
                    {
                     extend: 'collection',
                     text: 'Export As',
                     buttons: [ {
                        extend: 'excelHtml5',
                        title: exportTitle,
                        header: true,
                        action: function ( e, dt, node, config ) {
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, node, config);
                        toArchived();
                        }
                     },
                     {
                        extend: 'csvHtml5',
                        title: exportTitle,
                        header: true,
                        action: function ( e, dt, node, config ) {
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, node, config);
                        toArchived();
                        }
                     },
                    ]
                }
            ]
            <?php }else{ ?>
                ,"dom": "<'my-1'<'row'<'col-12 ml-3 mt-1'l>>rt<ip>>"
            <?php } ?>
        });

    if('<?= $title?>' != 'Qualified'){
        mainTable.columns().every(function(){
            //--- INDIVIDUAL COLUMN SEARCH---//
            var that = this;
        
            $('input', this.header()).on('keyup change', function(){
                if(that.search() !== this.value){
                    that
                        .search(this.value)
                        .draw();
                }
            });

            //--- COLUMN DOES NOT SORT ON CLICK ---///
            $( 'input', this.header() ).on('click', function(e){
                e.stopPropagation();
            });
        });
    } else {
        mainTable.columns().every(function(){
            //--- INDIVIDUAL COLUMN SEARCH---//
            var that = this;
        
            $('input', this.footer()).on('keyup change', function(){
                if(that.search() !== this.value){
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    }
    
    mainTable.columns.adjust().draw();

<?php if(!empty($_SESSION['filterIndustry']) || !empty($_SESSION['filterState'])){ ?>
        document.getElementById('table').style.display = 'block';
        document.getElementById('loading').style.display = 'none';
<?php } ?>
});

$('tbody td').focus(function(){
    $(this).css('border', '2px solid #3232ff');
    $(this).css('box-shadow', '0 10px 6px -6px #777');
    $(this).css('font-size', '14px');
}).blur(function(){
    $(this).css('border', 'transparent');
    $(this).css('box-shadow', 'none');
    $(this).css('font-size', '13px');    
});

function saveEnter(a, b, c, d, e){
    if(e.which===13){
        e.preventDefault();
        console.log('Enter');
        $(a).blur();
        saveData(a, b, c, d);
    }
}

//--- SAVE NEW ROW (BLUE PLUS BUTTON) ---//
function saveNewData(){
    // var status = $('#Status').val().trim();
  
    var phonenumber = $('#PhoneNumber').val().trim();
    var jobtitle= $('#JobTitle').val().trim();
    var firstname = $('#FirstName').val().trim();
    var lastname = $('#LastName').val().trim();
    var address = $('#Address').val().trim();
  
    // var county = $('#County').val().trim();
    // var area = $('#Area').val().trim();
  
    var city = $('#City').val().trim();
    var state = $('#State').val().trim();
    var zip = $('#Zip').val().trim();
    var companyname = $('#CompanyName').val().trim();
    var industry = $('#Industry').val().trim();
    var siccode = $('#SICCode').val().trim();
    var naicscode = $('#NAICSCode').val().trim();
    var employeesize = $('#EmployeeSize').val().trim();
    var annualrevenue = $('#AnnualRevenue').val().trim();
    var website = $('#Website').val().trim();

    // var phonenumber2= $('#PhoneNumber2').val().trim();
    // var extensionnumber = $('#ExtensionNumber').val().trim();
    // var directline = $('#DirectLine').val().trim();

    var email = $('#Email').val().trim();

    // var mobilenumber = $('#MobileNumber').val().trim();

    var comments = $('#Comments').val().trim();

    // var dmverified = $('#DMVerified').val().trim();
    // var profcompleted = $('#ProfCompleted').val().trim();
    // var mobilenumber2 = $('#MobileNumber2').val().trim();

    if(phonenumber==0 && jobtitle==0 && firstname==0 && lastname==0 && address==0 && city==0 && state==0 && zip==0 && companyname==0 && industry==0 && siccode==0 && naicscode==0 && employeesize==0 && annualrevenue==0 && website==0 && email==0 && comments==0){
        alert('All fields are empty.');
    }else{
    $.ajax({
            url: "<?php echo base_url('table/saveNewData'); ?>",
            type: "POST",
            data: 'phonenumber='+phonenumber+'&jobtitle='+jobtitle+'&firstname='+firstname+'&lastname='+lastname+'&address='+address+'&city='+city+'&state='+state+'&zip='+zip+'&companyname='+companyname+'&industry='+industry+'&siccode='+siccode+'&naicscode='+naicscode+'&employeesize='+employeesize+'&annualrevenue='+annualrevenue+'&website='+website+'&email='+email+'&comments='+comments,
            success: function(data){
                location.href = "<?=base_url('table'); ?>";
            }
    });
    }
}

function saveData(editableObj, id, field, value) {
    $(editableObj).css("background","transparent");
    console.log('Saving...');
    $.ajax({
            url: "<?php echo base_url('table/saveData') ?>",
            type: "POST",
            data: 'id='+id+'&field='+field+'&value='+value,
            success: function(data){
                console.log(value);
                $(editableObj).css("background","transparent");
                console.log('Saved');
            }
    });
}

function deleteRow(id){
    if(confirm("Are you sure you want to delete this row?")){
        $.ajax({
            url: "<?= base_url('table/deleteRow'); ?>",
            type: "POST",
            data: 'id='+id,
            success: function(data){
                location.href = "<?=base_url('table'); ?>";
            }
        });
    }
}

function isQualifiedSelect(id, value){
    $.ajax({
        url: "<?= base_url('table/isQualified'); ?>",
        type: "POST",
        data: 'id='+id+'&value='+value,
        success: function(data){
            console.log(data);
        }
    });
}

    function toArchived(){
        var mainTable = $('#mainTable').DataTable();
        var exportArray = mainTable.column(1, { search:'applied' } ).data().toArray();

        $.ajax({
            type: "POST",
            data: {exportArray: exportArray, exportTitle: exportTitle},
            url: "<?= base_url('table/archive'); ?>",
            success: function(data){
                location.href = "<?= base_url('home/index') ?>";
            }
        });
    }
</script>

    </body>
</html>