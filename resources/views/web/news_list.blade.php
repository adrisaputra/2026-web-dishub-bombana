@foreach($news as $i => $v)

<div class="col-md-4 news-item" style="margin-bottom: 20px;">
	<div class="card news-card" data-animate="fadeInUp" data-delay="{{$i+1}}00">
		<div class="news-card-img-wrapper">
			<img src="{{ Storage::disk('ppid_storage')->url('upload/news/'.$v->cover) }}" alt="Berita AI">
		</div>
		<div class="card-body p-4 d-flex flex-column justify-content-between">
			<div>
				<div class="d-flex align-items-center justify-content-between mb-2">
					{{--<span class="badge bg-danger-subtle text-danger badge-category">Teknologi</span>--}}
					<small class="text-muted"><i class="bi bi-eye me-1"></i>Dilihat {{ $v->count_view ?? 0 }} kali</small>
				</div>
				<h5 class="fw-bold card-title line-clamp-2 mb-2">
					<a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" style="color:#333">{{ $v->title }}</a>
				</h5>
				<p class="card-text text-muted small line-clamp-3 mb-3">
					{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
				</p>
				<a href="{{ url('page-news-detail?q='.$v->slug) }}" class="read-more2" target="_blank" data-aos="fade-right" data-aos-delay=300>Selengkapnya</a>

			</div>
			<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
				<span><i class="bi bi-person me-1"></i>{{ $v->user->name }}</span>
				<span>{{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</span>
			</div>
		</div>
	</div>
</div>
@endforeach

<div class="paginating-container">{{ $news->appends(Request::only('search'))->links() }}</div>
<script src="{{ asset('frontend/js/functions.js') }}"></script>