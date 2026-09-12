<script src="{{ url('backend/assets/ckeditor/ckeditor.js')}}"></script>
<div class="modal fade" id="kt_modal_add_news" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_news_header">
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
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_news_scroll" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_news_header" data-kt-scroll-wrappers="#kt_modal_add_news_scroll" data-kt-scroll-offset="800px">
                        
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Judul') }}</label>
                            <input type="hidden" class="form-control" id="id_news"/>
                            <input type="text" class="form-control" placeholder="Judul" name="title" id="title" />
                            <div id="title-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Isi') }}</label>
                            <textarea name="text" id="text" class="form-control ckeditor"></textarea>
                            <div id="text-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Cover') }}</label>
                            <input type="file" name="cover" id="cover" class="form-control">
                            <b class="text-muted" style="font-size: 12px;">Ukuran gambar 1600 x 1068 pixel. Ukuran gambar tidak boleh lebih dari 5 Mb (jpg,jpeg,png)</b>
                            <span class="text-red" id="show_cover"></span>
                            <div id="cover-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary btn-flat btn-sm" id="action" title="Tambah Data"> Simpan</button>
                        <!-- <button type="reset" class="btn btn-danger btn-flat btn-sm" title="Reset Data"> Reset</button> -->
                        <button type="button" class="btn btn-warning btn-flat btn-sm" title="Kembali" data-bs-dismiss="modal">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    
    CKEDITOR.replace('text', {
        filebrowserUploadUrl: "{{route('upload_news', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });

    // FIX: CKEditor di dalam Bootstrap 5 Modal tidak bisa diketik
    document.addEventListener('focusin', (e) => {
        // kalau target ada di dalam ckeditor dialog/iframe → biarkan
        if (e.target.closest('.cke_dialog') || e.target.tagName === 'IFRAME') {
            e.stopImmediatePropagation();
        }
    }, true);

    if (bootstrap && bootstrap.Modal) {
        bootstrap.Modal.prototype._enforceFocus = function() {
            document.removeEventListener('focusin.bs.modal', this._focusinHandler);
        };
    }

    // Inisialisasi CKEditor setiap kali modal dibuka
    $('#kt_modal_add_news').on('shown.bs.modal', function() {
        if (CKEDITOR.instances['text']) {
            CKEDITOR.instances['text'].destroy(true);
        }
    });
</script> 
