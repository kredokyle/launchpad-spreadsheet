<?php $_SESSION['filterIndustry']=null; $_SESSION['filterState']=null; ?>
<style> #home_ { color: #fff; }</style>
<br><i><h3 class="text-muted"><?= $title ?></h3></i><hr><br>

<div class="row">
    <div class="col-md-4 text-center mb-2">
        <button class="btn btn-dark col-12 text-truncate" title="Spreadsheet" style="height: 7rem" onclick="location.href='<?php echo site_url('/table'); ?>';">
		<i class="fas fa-table fa-3x"></i><br>Spreadsheet
        </button>
	</div>

	<?php if($_SESSION['type']=='Admin'){ ?>
	<div class="col-md-2 text-center mb-2">
        <button class="btn btn-outline-dark col-12" title="Profiled" onclick="location.href='<?php echo site_url('/table/profiled'); ?>';" style="height: 7rem">
		<i class="fas fa-pencil-alt fa-3x"></i><br>Profiled
        </button>
	</div>

	<div class="col-md-2 text-center mb-2">
        <button class="btn btn-outline-dark col-12" title="Qualified" onclick="location.href='<?php echo site_url('/table/qualified'); ?>';" style="height: 7rem">
		<i class="fas fa-check fa-3x"></i><br>Qualified
        </button>
	</div>

	<div class="col-md-2 text-center mb-2">
        <button class="btn btn-outline-dark col-12" title="Exported" onclick="location.href='<?php echo site_url('/table/archived'); ?>';" style="height: 7rem">
				<i class="fas fa-archive fa-3x"></i><br>Archived
        </button>
	</div>

	<div class="col-md-2 text-center mb-2">
        <button class="btn btn-outline-info col-12" title="Upload" href="#add" data-toggle="modal" style="height: 7rem">
		<i class="fas fa-upload fa-3x"></i><br>Upload
        </button>
	</div>
	<?php } ?>
</div>

<div class="modal fade" id="add" role="dialog" tabindex="-1" aria-labelledby="addLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="addLabel">Import Excel</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="pageloader">
				<img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
			</div>
			<div class="modal-body form-group">
				<?php echo form_open_multipart("ExcelDataInsert/import_data");?>
				<h5>Select Excel File</h5>
				<div class="container">
					<div class="form-control">
						<input type="file" name ="file" id="inputfile" required>
						<center><h5 id="mat"></h5></center>
					</div>
				</div>
			</div>
					<div class="modal-footer form-group">
						<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" name='btnadd'  
						id="submitbtn">Upload</button>
					</div>
					<? echo form_close(); ?>	
			</div>
		</div>
</div>