<div class="modal fade" id="kt_modal_add_video" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_video_header">
                <h2 class="fw-bolder" id="head_title"></h2>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
            <form id="myForm" action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_video_scroll" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_video_header" data-kt-scroll-wrappers="#kt_modal_add_video_scroll" data-kt-scroll-offset="800px">

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('URL Video') }}</label>
                            <input type="hidden" class="form-control" id="id_video"/>
                            <input type="text" class="form-control" placeholder="URL Video" name="url" id="url" value="{{ old('url') }}" />
                            <div id="url-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm" id="action" title="Tambah Data"> Simpan</button>
                        <button type="button" class="btn btn-warning btn-flat btn-sm" title="Kembali" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
