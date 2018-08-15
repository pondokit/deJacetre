@section('style')
  <link rel="stylesheet" type="text/css" href="/AdminLTE-2.4.3/plugins/tagEditor/jquery.tag-editor.css">
@endsection

@section('script')
  <script type="text/javascript" src="/AdminLTE-2.4.3/plugins/tagEditor/jquery.caret.min.js"></script>
  <script type="text/javascript" src="/AdminLTE-2.4.3/plugins/tagEditor/jquery.tag-editor.min.js"></script>
	<script type="text/javascript">
		$('ul.pagination').addClass('pagination-sm no-margin');

    $('#title').on('blur', function() {
      var theTitle = this.value.toLowerCase().trim(),
          slugInput = $('#slug'),
          theSlug = theTitle.replace(/&/g, '-and-')
                            .replace(/[^a-z0-9-]+/g,'-')
                            .replace(/\-\-+/g,'-')
                            .replace(/^-+|-+$/g, '');

      slugInput.val(theSlug);
    });

    var simplemde1 = new SimpleMDE({ element: $("#excerpt")[0] });
    var simplemde2 = new SimpleMDE({ element: $("#body")[0] });

    $('#datetimepicker1').datetimepicker({
      format: 'YYYY-MM-DD HH:mm:ss',
      showClear: true
    });

    $('#draft-btn').click(function(e){
      e.preventDefault();
      $('#published_at').val("");
      $('#post-form').submit();
    });

    var options = {};

    @if ($post->exists)
      options = {
        initialTags: {!! json_encode($post->tags->pluck('name')) !!}
      };
    @endif

    $('input[name=post_tags]').tagEditor(options);

    $('document').ready(function(){
      $('.check').val("draft");
      $('.publish').click(function(){
        $('.check').val("publish");
      });
    });

	</script>
@endsection