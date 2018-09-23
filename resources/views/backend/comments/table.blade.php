<table class="table table-hover" id="comments-table">
	<thead>
		<th width="90">Action</th>
		<th>Visitor Name</th>
		<th>Email</th>
		<th>Website</th>
		<th>Date</th>
		<th>Article</th>
	</thead>
	<tbody>
		@foreach($comments as $comment)
		<?php
			$delete_button  = '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
		?>
		<tr>
			<td>
				<form action=" {{ route('comments.destroy', $comment->id) }} " method="post">
                	{{csrf_field()}}
                	{{method_field("DELETE")}}
									<a href="{{route('comments.show', $comment->id)}}" class="btn btn-xs btn-default">
                		<i class="fa fa-info"></i>
                	</a>
                	<a href="{{route('comments.edit', $comment->id)}}" class="btn btn-xs btn-default">
                		<i class="fa fa-edit"></i>
                	</a>
                	{!! $delete_button !!}
        </form>
			</td>
			<td> {{$comment->author_name}} </td>
			<td> {{$comment->author_email}} </td>
			<td> {{$comment->author_url}} </td>
			<td> {{$comment->created_at}} </td>
			<td> {{$comment->post->title}} </td>
		</tr>
		@endforeach
	</tbody>
</table>
