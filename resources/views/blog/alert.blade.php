@if(isset($categoryName))
	<div class="alert alert-info">Category : <strong>{{ $categoryName }}</strong></div>
@endif

@if(isset($tagName))
	<div class="alert alert-info">Tagged : <strong>{{ $tagName }}</strong></div>
@endif

@if(isset($authorName))
	<div class="alert alert-info">Author : <strong>{{ $authorName }}</strong></div>
@endif

@if($term = request('term'))
	<div class="alert alert-info">Search result for : <strong>{{ $term }}</strong></div>
@endif