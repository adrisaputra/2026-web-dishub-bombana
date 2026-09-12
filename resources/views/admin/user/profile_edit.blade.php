<!--begin::Form-->
<form id="myForm" action="{{ url('/'.Request::segment(1)) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}
    <!--begin::Card body-->
    <input type="hidden" class="form-control" id="id_user" value="{{ Crypt::encrypt($user->id) }}"/>
    <div class="card-body border-top p-9">
        <!--end::Input group-->
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Nama Pengguna') }}</label>
            <div class="col-lg-8 fv-row">
                <input type="text" name="name" id="name" class="form-control" placeholder="Nama Pengguna" value="{{ $user->name }}"/>
                <div id="name-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Email') }}</label>
            <div class="col-lg-8 fv-row">
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}"/>
                <div id="email-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('Foto') }}</label>
            <div class="col-lg-8 fv-row">
                <input type="file" name="photo" id="photo" class="form-control" placeholder="Foto"/>
                <div id="photo-error" class="fv-plugins-message-container invalid-feedback"></div>
                <span style="font-size:11px"><i>Ukuran File Tidak Boleh Lebih Dari 500 Kb (jpg,jpeg,png)</i></span><br>
                <div id="show_photo">
                @if($user->photo)
                    <img src="{{ asset('storage/upload/user/'.$user->photo) }}" width="150px" height="150px">
                @endif
                </div>
            </div>
        </div>
        <hr>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Password') }}</label>
            <div class="col-lg-8 fv-row" data-kt-password-meter="true">
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Password" name="password" id="password" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <div id="password-error" class="fv-plugins-message-container invalid-feedback"></div>
            </div>
        </div>
        <div class="row mb-6">
            <label class="col-lg-4 col-form-label fw-bold fs-6">{{ __('Konfirmasi Password') }}</label>
            <div class="col-lg-8 fv-row" data-kt-password-meter="true">
                <div class="position-relative mb-3">
                    <input class="form-control form-control-lg form-control-solid" type="password" placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation" autocomplete="off" />
                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                        <i class="bi bi-eye-slash fs-2"></i>
                        <i class="bi bi-eye fs-2 d-none"></i>
                    </span>
                </div>
            </div>
        </div>
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