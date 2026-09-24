<div class="heading-block border-bottom-0" style="margin-bottom: 0px;">
	<h3 style="color:#f44336" data-animate="fadeInUp" data-delay="100">{{ $profile->title }}</h3>
</div>
@if($profile->menu=="structure")
@if($profile->image)
<div class="entry-image" data-animate="backInRight" data-delay="10">
	<img src="{{ asset('storage/upload/profile/'.$profile->image) }}" alt="Image" style="border-radius: 25px;">
</div>
@endif
@else
<div data-animate="backInRight" data-delay="10">
	{!! $profile->text !!}
</div>
@endif
<script src="{{ asset('frontend/js/functions.js') }}"></script>