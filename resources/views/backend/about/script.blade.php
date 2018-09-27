@section('style')
  <link rel="stylesheet" type="text/css" href="/AdminLTE-2.4.3/plugins/tagEditor/jquery.tag-editor.css">
@endsection

@section('script')
  <script type="text/javascript" src="/AdminLTE-2.4.3/plugins/tagEditor/jquery.caret.min.js"></script>
  <script type="text/javascript" src="/AdminLTE-2.4.3/plugins/tagEditor/jquery.tag-editor.min.js"></script>
	<script type="text/javascript">
    var simplemde2 = new SimpleMDE({ element: $("#about")[0] });
	</script>
@endsection
