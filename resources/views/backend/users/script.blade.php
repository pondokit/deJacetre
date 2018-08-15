@section('script')
<script type="text/javascript">
	$('ul.pagination').addClass('pagination-sm no-margin');

    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    function slug(str) {
        var theName = str.val().toLowerCase().trim(),
        theSlug = theName.replace(/&/g, '-and-')
                          .replace(/[^a-z0-9-]+/g,'-')
                          .replace(/\-\-+/g,'-')
                          .replace(/^-+|-+$/g, '');
        return theSlug;
    }

    $('#name').on('blur', function() {
        var str = $('#name');
        var theSlug = slug(str);
        var theName = toTitleCase(str.val());

        $('#slug').val(theSlug);
        $('#name').val(theName);
    });
    
    $('#save-btn').click(function(e){

        var str = $('#name');

        if (str.val()) {

            e.preventDefault();

            var theSlug = slug(str);
            var theName = toTitleCase(str.val());

            $('#name').val(theName);
            $('#slug').val(theSlug);

            $('#user-form').submit();
        }
    });
</script>
@endsection