<form action="<?php echo route('article.add'); ?>" method="post">
<?php echo csrf_field(); ?>
	<input type="string" name="title" value="" />
	<textarea name="content" ></textarea>
	<input type="int" name="isAnonymous" value="" />
	<input type="submit" name="submit">

</form>