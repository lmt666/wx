<form action="api/test/show" method="POST">
<?php echo csrf_field(); ?>

<input type="int" name="id" value="" />
<input type="submit" name="提交" />
</form>