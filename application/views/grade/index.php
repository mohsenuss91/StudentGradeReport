<div class="pull-right">
	<a href="<?php echo site_url('/add'); ?>" class="btn btn-success">Add</a> 
</div>

<table class="table table-striped table-bordered">
    <tr>
		<th>Studentid</th>
		<th>Studentname</th>
		<th>Studentpercent</th>
		<th>Studentgrade</th>
		<th>Actions</th>
    </tr>
	<?php foreach($grades as $g){ ?>
    <tr>
		<td><?php echo $g['studentid']; ?></td>
		<td><?php echo $g['studentname']; ?></td>
		<td><?php echo $g['studentpercent']; ?></td>
		<td><?php echo $g['studentgrade']; ?></td>
		<td>
            <a href="<?php echo site_url('/edit/'.$g['studentid']); ?>" class="btn btn-info btn-xs">Edit</a> 
            <a href="<?php echo site_url('/remove/'.$g['studentid']); ?>" class="btn btn-danger btn-xs">Delete</a>
        </td>
    </tr>
	<?php } ?>
</table>
