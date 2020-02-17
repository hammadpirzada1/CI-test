<?php echo validation_errors(); ?>
<?php echo $this->upload->display_errors('<div class="alert alert-error">', '</div>'); ?>
<?php echo form_open_multipart(); ?>
	<div class="form-group">
		<?php echo form_label('Publication Name', 'publication_id'); ?>
		<?php echo form_dropdown('publication_id', $publication_form_options, set_value('publication_id'), 'class="form-control"'); ?>

	</div>
	<div class="form-group">
		<?php echo form_label('Issue Number', 'issue_number'); ?>
		<?php echo form_input('issue_number', set_value('issue_number'), 'class="form-control"'); ?>
	</div>
	<div class="form-group">
		<?php echo form_label('Date Published', 'issue_date_publication'); ?>
		<?php echo form_input('issue_date_publication', set_value('issue_date_publication'), 'class="form-control"'); ?>
	</div>
	<div class="form-group">
		<?php echo form_label('Cover Scan', 'issue_cover'); ?>
		<?php echo form_upload('issue_cover', 'class="btn btn-secondary"') ?>
	</div>
	
	<div class="form-group">
		<?php echo form_submit('save','Save', 'class="btn btn-primary"'); ?>
	</div>
<?php echo form_close(); ?>