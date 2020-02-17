<?php include_once('admin_header.php'); ?>
<div class="container">
	<table class="table">
		<thead>
			<th>Sr. No</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
			<?php if(count($articles)): ?>
				<?php foreach($articles as $article): ?>
					<tr>
						<td>1</td>
						<td>How to write your first application</td>
						<td> <button class="btn btn-primary">Edit</button> <button class="btn btn-danger">Delete</button> </td>	
					</tr>
				<?php endforeach; ?>
				<?php else: ?>
				<tr>
					<td colspan="3">No record Found.</td>
				</tr>
			<?php endif; ?>
		</tbody>
	</table>
</div>
<?php include_once('admin_footer.php'); ?>