@foreach($video as $i => $v)
@php $a = str_replace("watch?v=","embed/",$v->url); @endphp
<div class="col-sm-4 col-lg-4" data-animate="fadeInUp" data-delay="300" style="border-radius: 15px;">
	<iframe width="200px" height="150px" align="center" src="{{ $a }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>
@endforeach
<div class="paginating-container">{{ $video->appends(Request::only('search'))->links() }}</div>
<script src="{{ asset('frontend/js/functions.js') }}"></script>