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
				<h1><?=strtoupper($controller)?> </h1> <p>Edit Meta</p>
			</div>
			<?= form_open() ?>
				
				<?php foreach($metas as $m){ ?>
				
				<h3><?=strtoupper($m['controller'])?></h3>
				<input type="hidden" class="form-control" name="controller" value="<?=$m['controller']?>">
				<div class="form-group">
					<label for="seo">SEO</label>
					<input type="text" class="form-control" name="seo" placeholder="SEO" value="<?=$m['seo']?>">
				</div>
				
				<div class="form-group">
					<label for="name">Page Name</label>
					<input type="text" class="form-control" name="name" placeholder="Page Name" value="<?=$m['name']?>">
				</div>
				<div class="form-group">
					<label for="name">Page Description</label>
					<textarea name="description" class="form-control" placeholder="Page Description"><?=$m['description']?></textarea>
				</div>
				
				
				<?php } ?>
				
				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Login">
				</div>
				
				
			</form>
		</div>
	</div><!-- .row -->
</div><!-- .container -->