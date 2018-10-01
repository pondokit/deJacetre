<table class="table table-hover" id="tags-table">
	<thead>
		<th width="80">#</th>
		<th>Name</th>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<?php
			if ($tag->posts->count()) {
				$delete_button  = '<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>';
			} else {
				$delete_button  = '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
			}

		?>
		<tr>
			<td>
				<form action=" {{ route('tags.destroy', $tag->id) }} " method="post">
                	{{csrf_field()}}
                	{{method_field("DELETE")}}
                	{!! $delete_button !!}
        </form>
			</td>
			<td> {{ $tag->name }} </td>
		</tr>
		@endforeach
	</tbody>
</table>