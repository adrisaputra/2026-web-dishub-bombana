<script src="{{ url('backend/assets/ckeditor/ckeditor.js')}}"></script>
<!--begin::Form-->
<form id="myForm" action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}
    <!--begin::Card body-->
    <input type="hidden" class="form-control" id="id_profile" value="{{ $profile->id }}" />
    <div class="card-body border-top p-9">
        <!--end::Input group-->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">Judul</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="title" id="title" class="form-control" placeholder="Judul" value="{{ $profile->title }}" disabled />
            </div>
        </div>
        @if(in_array($profile->menu,['history','vision_mission','bpd']))
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Deskripsi</label>
            <div class="col-lg-8 fv-row">
                <textarea name="text" id="text" class="form-control ckeditor">{{ $profile->text }}</textarea>
                <div id="phone-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        @else
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Gambar</label>
            <div class="col-lg-8 fv-row">
                <input type="file" name="image" id="image" class="form-control" placeholder="Background Login"/>
                <div id="image-error" class="fv-plugins-message-container invalid-feedback"></div>
                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 2 Mb (jpg,jpeg,png)</i></span><br>
                @if($profile->image)
                    <img src="{{ asset('storage/upload/profile/'.$profile->image) }}" width="40%">
                @endif
            </div>
        </div>
        @endif
    </div>
    <!--end::Card body-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-danger btn-flat btn-sm me-2 mb-2">Reset</button>
        <button type="submit" class="btn btn-primary btn-flat btn-sm me-2 mb-2" id="action" title="Tambah Data"> Simpan</button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->

<script>
    CKEDITOR.replace('text');
</script>