<form action="<?php echo route('api_testcontroller.renew'); ?>" method="post">
<?php echo csrf_field(); ?>
<input type="int" name="id" value="{{$data[0]->id}}">
	<input type="string" name="title" value="{{$data[0]->title}}" />
	<textarea name="body" >{{$data[0]->body}}</textarea>
	<input type="submit" name="submit">

</form>