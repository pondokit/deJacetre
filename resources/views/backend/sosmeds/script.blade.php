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

    $('#display_name').on('blur', function() {
        var str = $('#display_name');
        var theSlug = slug(str);
        var theTitle = toTitleCase(str.val());

        $('#name').val(theSlug);
        $('#display_name').val(theTitle);
    });
    
    $('#save-btn').click(function(e){

        var str = $('#display_name');

        if (str.val()) {

            e.preventDefault();

            var theSlug = slug(str);
            var theTitle = toTitleCase(str.val());

            $('#display_name').val(theTitle);
            $('#name').val(theSlug);

            $('#permission-form').submit();
        }
    });
</script>
@endsection