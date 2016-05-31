<?php $metas = $this->metas->get(); ?>
<title><?=$this->options->get('site_name')?> | <?=$metas['name']?></title>
<meta name='description' content='<?=$metas['description']?>' />
<meta name='keywords' content='<?=$metas['seo']?>' />