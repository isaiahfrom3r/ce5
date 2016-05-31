<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content">
	<div class="container">
		<div class="block-header">
			<h2>CMS</h2>
		</div>
		<div class="card">
			<div class="card-header">
				<h2>Table Condensed
					<small>Make tables more compact by cutting cell padding in half.    <a class="btn btn-success pull-right" href="<?php echo base_url(); ?>admin/cms/create_page">Create New Page</a>
					</small>
				</h2>
			</div>
			<div class="table-responsive">
				<table class="table table-condensed">
					<thead>
						<tr>
							<th>Title</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($pages as $page){ ?>
						<tr>
							<td><?=$page['title']?></td>
							<td>
								<a class="btn btn-success pull-right" href="<?php echo base_url(); ?>admin/cms/edit_page/<?=$page['id']?>">Edit</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>