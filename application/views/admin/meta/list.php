<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Site Meta</h1> 
			</div>
			
			<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Page Name</th>
					<th>Update Included Pages</th>
					<th>Edit</th>
				</tr>
			</thead>
		    <tbody>
			<?php foreach($list as $l){ ?>
			
				<tr>
					<td><?=str_ireplace('.php', '', $l)?></td>
					<td><a class="btn btn-info">Update</a></td>
					<td><a href="/meta/edit/<?=str_ireplace('.php', '', $l)?>" class="btn btn-warning">Edit</a></td>
				</tr>
			
			<?php } ?>

		    </tbody>
		  </table>

			
		</div>
	</div><!-- .row -->
</div><!-- .container -->