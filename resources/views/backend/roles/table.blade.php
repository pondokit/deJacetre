<table class="table table-hover" id="roles-table">
	<thead>
		<!-- <th width="80">Action</th> -->
		<th width="80">Action</th>
		<th>Name</th>
		<th>Permission</th>
		<th width="200">User Count</th>
	</thead>
	<tbody>
		@foreach ($roles as $role)
			<?php
				$delete_button  = ($role->id == config('cms.default_role_id')) ? '<button onclick="return false" type="submit" class="btn btn-xs btn-danger disabled"><i class="fa fa-times"></i></button>' : '<button onclick="return confirm('."'Are you sure?'".')" type="submit" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>';
			?>
			<tr>
				<td>
					<form action="{{ route('roles.destroy', $role->id) }}" method="post">
						{{ csrf_field() }}
						{{ method_field("DELETE") }}
						<a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs btn-default">
							<i class="fa fa-edit"></i>
						</a>
						{!! $delete_button !!}
					</form>
				</td>
				<td>{{ $role->display_name }}</td>
				<td>-</td>
				<td>-</td>
			</tr>
		@endforeach
	</tbody>
</table>
