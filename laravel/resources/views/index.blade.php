@foreach($data as $data)
<a href="<?php echo route('api_testcontroller.show',['id'=>$data->id]); ?>">{{$data->title}}</a>
<br>
@endforeach