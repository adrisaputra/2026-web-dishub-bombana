@foreach($album as $i => $v)
<div class="col-md-4 bottommargin" style="display: flex;">
	<div class="card2" data-animate="fadeInUp" data-delay="{{$i+1}}00">
		<img class="card-img-top" src="{{ asset('storage/upload/album/'.$v->cover) }}" alt="Card image cap">
		<div class="card2-body">
			<h5 style="text-transform: none;text-align:center">{{ $v->title }}</h5>
		</div>
		<div class="bg-overlay" data-lightbox="gallery">
			<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
				<a href="{{ asset('storage/upload/album/'.$v->cover) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
				@foreach($v->all_photo as $x)
				<a href="{{ asset('storage/upload/photo/'.$x->image) }}" class="d-none" data-lightbox="gallery-item"></a>
				@endforeach
			</div>
		</div>
		<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
	</div>
</div>
</div>
@endforeach
<div class="paginating-container">{{ $album->appends(Request::only('search'))->links() }}</div>
<script src="{{ asset('frontend/js/functions.js') }}"></script>