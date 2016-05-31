<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
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
			<div class="page-header">
				<h1>Create Page</h1>
			</div>
			<?= form_open() ?>
				<div class="form-group">
					<label for="username">Title</label>
					<input type="text" class="form-control"  name="title" placeholder="Title">
				</div>
				<div class="form-group">
					<label for="email">Key Words</label>
					<input type="email" class="form-control"  name="keywords" placeholder="Key Words">
					<p class="help-block">(Leave blank for site default)</p>
				</div>
				<div class="form-group">
					<label for="password">SEO Description</label>
					<input type="password" class="form-control"  name="description" placeholder="SEO Description">
					<p class="help-block">(Leave blank for site default)</p>
				</div>
				<div class="form-group">
					<label for="password_confirm">Body</label>
					<textarea class="form-control tinymce" name="body" ></textarea>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Create">
				</div>
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->