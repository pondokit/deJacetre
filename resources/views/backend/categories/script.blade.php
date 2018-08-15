@section('script')
<script type="text/javascript">
	$('ul.pagination').addClass('pagination-sm no-margin');

    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    function slug(str) {
        var theTitle = str.val().toLowerCase().trim(),
        theSlug = theTitle.replace(/&/g, '-and-')
                          .replace(/[^a-z0-9-]+/g,'-')
                          .replace(/\-\-+/g,'-')
                          .replace(/^-+|-+$/g, '');
        return theSlug;
    }

    $('#title').on('blur', function() {
        var str = $('#title');
        var theSlug = slug(str);
        var theTitle = toTitleCase(str.val());

        $('#slug').val(theSlug);
        $('#title').val(theTitle);
    });
    
    $('#save-btn').click(function(e){

        var str = $('#title');

        if (str.val()) {

            e.preventDefault();

            var theSlug = slug(str);
            var theTitle = toTitleCase(str.val());

            $('#title').val(theTitle);
            $('#slug').val(theSlug);

            $('#category-form').submit();
        }
    });
</script>
@endsection