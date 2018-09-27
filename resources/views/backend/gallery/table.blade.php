<table class="table table-hover" id="permissions-table">
	<thead>
		<th width="80">#</th>
		<th>Name</th>
	</thead>
	<tbody>
		@foreach($gallery as $galery)
		<?php
			$delete_button  = '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
		?>
		<tr>
			<td>
				<form action=" {{ route('gallery.destroy', $galery->id) }} " method="post">
                	{{csrf_field()}}
                	{{method_field("DELETE")}}
                	{!! $delete_button !!}
        		</form>
			</td>
			<td> {{ $galery->image }} </td>
		</tr>
		@endforeach
	</tbody>
</table>
