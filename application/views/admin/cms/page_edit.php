<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section id="content">
	<div class="container">
		<div class="block-header">
			<h2>Edit Page</h2>
		</div>
		<div class="card">
			<div class="card-header">
				<h2> <?=$page['title']?>
					<small>Edit page content and meta below.</small>
				</h2>
			</div>
			<div class="card-body card-padding">
				<div class="row">
					<?php if (validation_errors()) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= validation_errors() ?>
						</div>
					</div>
					<?php endif; ?>
					<?php if (isset($error)) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= $error ?>
						</div>
					</div>
					<?php endif; ?>
					<div class="col-md-12">

						<?= form_open() ?>
						<div class="form-group">
							<label for="username">Title</label>
							<div class="fg-line">
								<input type="text" class="form-control" value="<?=$page['title']?>"  name="title" placeholder="Title">
							</div>
						</div>
						<div class="form-group">
							<label for="email">Key Words</label>
							<input type="text" class="form-control" value="<?=$page['keywords']?>" name="keywords" placeholder="Key Words">
							<p class="help-block">(Leave blank for site default)</p>
						</div>
						<div class="form-group">
							<label for="password">SEO Description</label>
							<input type="text" class="form-control" value="<?=$page['description']?>"  name="description" placeholder="SEO Description">
							<p class="help-block">(Leave blank for site default)</p>
						</div>
						<div class="form-group">
							<label for="password_confirm">Body</label>
							<textarea class="form-control tinymce" name="body" ><?=$page['body']?></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-default" value="Edit">
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>