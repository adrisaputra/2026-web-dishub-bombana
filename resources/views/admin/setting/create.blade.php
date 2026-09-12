<!--begin::Form-->
<form id="myForm" action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}
    <!--begin::Card body-->
    <input type="hidden" class="form-control" id="id_setting" value="{{ $setting->id }}"/>
    <div class="card-body border-top p-9">
        <!--end::Input group-->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">Alamat</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="address" id="address" class="form-control" placeholder="Alamat" value="{{ $setting->address }}"/>
                <div id="address-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">Telepon</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="phone" id="phone" class="form-control" placeholder="Telepon" value="{{ $setting->phone }}"/>
                <div id="phone-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">Email</label>
            <div class="col-lg-8 fv-row">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $setting->email }}"/>
                <div id="email-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">URL Youtube</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="youtube" id="youtube" class="form-control" placeholder="URL Youtube" value="{{ $setting->youtube }}"/>
                <div id="youtube-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">URL Instagram</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="instagram" id="instagram" class="form-control" placeholder="URL Instagram" value="{{ $setting->instagram }}"/>
                <div id="instagram-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">URL Facebook</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="facebook" id="facebook" class="form-control" placeholder="URL Facebook" value="{{ $setting->facebook }}"/>
                <div id="facebook-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">URL Whatsapp</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="whatsapp" id="whatsapp" class="form-control" placeholder="URL Whatsapp" value="{{ $setting->whatsapp }}"/>
                <div id="whatsapp-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <hr>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Nama Aplikasi</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="application_name" id="application_name" class="form-control" placeholder="Nama Aplikasi" value="{{ $setting->application_name }}"/>
                <div id="application_name-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Singkatan Nama Aplikasi</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="short_application_name" id="short_application_name" class="form-control" placeholder="Singkatan Nama Aplikasi" value="{{ $setting->short_application_name  }}"/>
                <div id="short_application_name-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Logo Kecil</label>
            <div class="col-lg-8 fv-row">
                <input type="file" name="small_icon" id="small_icon" class="form-control" placeholder="Logo Kecil"/>
                <div id="small_icon-error" class="fv-plugins-message-container invalid-feedback"></div>
                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span><br>
                <div id="show_small_icon">
                @if($setting->small_icon)
                    <img src="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" width="150px" height="150px">
                @endif
                </div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Logo Besar</label>
            <div class="col-lg-8 fv-row">
                <input type="file" name="large_icon" id="large_icon" class="form-control" placeholder="Logo Besar"/>
                <div id="large_icon-error" class="fv-plugins-message-container invalid-feedback"></div>
                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span><br>
                @if($setting->large_icon)
                    <img src="{{ asset('storage/upload/setting/'.$setting->large_icon) }}" width="40%">
                @endif
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">Background Login</label>
            <div class="col-lg-8 fv-row">
                <input type="file" name="background_login" id="background_login" class="form-control" placeholder="Background Login"/>
                <div id="background_login-error" class="fv-plugins-message-container invalid-feedback"></div>
                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span><br>
                @if($setting->background_login)
                    <img src="{{ asset('storage/upload/setting/'.$setting->background_login) }}" width="40%">
                @endif
            </div>
        </div>
    </div>
    <!--end::Card body-->
    <!--begin::Actions-->
    <div class="card-footer d-flex justify-content-end py-6 px-9">
        <button type="reset" class="btn btn-danger btn-flat btn-sm me-2 mb-2">Reset</button>
        <button type="submit" class="btn btn-primary btn-flat btn-sm  me-2 mb-2" id="action" title="Tambah Data"> Simpan</button>
    </div>
    <!--end::Actions-->
</form>
<!--end::Form-->