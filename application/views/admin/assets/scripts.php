<script src="https://code.jquery.com/jquery-2.2.3.min.js"  integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" charset="utf-8"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.js" charset="utf-8"></script>

<script src="<?php echo base_url(); ?>assets/admin/js/admin.js"></script>
 
<script src="/assets/js/tinymce/tinymce.min.js"></script>



<script>



tinymce.init({
	selector: '.tinymce',
	height: 400,
	theme: 'modern',
	plugins: [
		'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		'searchreplace wordcount visualblocks visualchars code fullscreen',
		'insertdatetime media nonbreaking save table contextmenu directionality',
		'emoticons template paste textcolor colorpicker textpattern imagetools',
		'insertdatetime media table contextmenu paste jbimages'
	],
	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent  link image jbimages',
	toolbar2: 'print preview media | forecolor backcolor emoticons',
	image_advtab: true,
	templates: [
		{ title: 'Full Width', content: '<?php $this->load->view(TEMPLATE."/one.php");?>' },
		{ title: 'Two Collumns', content: '<?php $this->load->view(TEMPLATE."/two.php");?>' },
		{ title: 'Three Collumns', content: '<?php $this->load->view(TEMPLATE."/three.php");?>' },
	],
	content_css: [
		'//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
		'//www.tinymce.com/css/codepen.min.css', 
		'//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
	]
});

	
</script>