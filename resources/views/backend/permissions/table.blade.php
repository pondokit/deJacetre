<table class="table table-hover" id="permissions-table">
	<thead>
		<th width="80">#</th>
		<th>Name</th>
	</thead>
	<tbody>
		@foreach($permissions as $permission)
		<?php
			$delete_button  = '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
		?>
		<tr>
			<td>
				<form action=" {{ route('permissions.destroy', $permission->id) }} " method="post">
                	{{csrf_field()}}
                	{{method_field("DELETE")}}
                	<a href="{{route('permissions.edit', $permission->id)}}" class="btn btn-xs btn-default">
                		<i class="fa fa-edit"></i>
                	</a>
                	{!! $delete_button !!}
        </form>
			</td>
			<td> {{ $permission->name }} </td>
		</tr>
		@endforeach
	</tbody>
</table>
