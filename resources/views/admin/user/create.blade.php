<div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-900px">
        <div class="modal-content">
            <div class="modal-header" id="kt_modal_add_user_header">
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
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="800px">
                        
                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Nama User') }}</label>
                            <input type="hidden" class="form-control" name="id" id="id_user"/>
                            <input type="text" class="form-control" placeholder="Nama User" name="name" id="name" value="{{ old('name') }}" />
                            <div id="name-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Email') }}</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{ old('email') }}" > 
                            <div id="email-error" class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">{{ __('Group') }}</label>
                                <select name="group_id" id="group_id" class="form-control" onchange=" if (this.selectedIndex==1){ 
												document.getElementById('village').style.display = 'none'; 
											} else if (this.selectedIndex==2){ 
												document.getElementById('village').style.display = 'inline'; 
											};">
                                    <option value="">- Pilih Group -</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Admin Desa</option>
                                </select>
                                <div id="group_id-error" class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                        <span id="village" style="display:none;">

                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">{{ __('Pilih Kecamatan') }}</label>
                                <select name="subdistrict_id" id="subdistrict_id" class="form-control" data-control="select2" onchange="getVillage()"> 
                                    <option value="">- Pilih Kecamatan -</option>
                                    @foreach($subdistrict as $v)
                                        <option value="{{ $v->id }}">{{ $v->name }}</option>
                                    @endforeach
                                </select>
                                <div id="subdistrict_id-error" class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">{{ __('Pilih Desa/Kelurahan') }}</label>
                                <select name="village_id" id="village_id" class="form-control"> 
                                    <option value="">- Pilih Desa/Kelurahan -</option>
                                </select>
                                <div id="village_id-error" class="fv-plugins-message-container invalid-feedback"></div>
                            </div>

                        </span>


                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Password') }}</label>
                            <div class="col-md-12" data-kt-password-meter="true">
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

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Konfirmasi Password') }}</label>
                            <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password_confirmation" id="password_confirmation">
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fw-bold fs-6 mb-2">{{ __('Status') }}</label>
                            <select name="status" id="status" class="form-control"> 
                                <option value="">- Pilih Status -</option>
                                <option value="Active">Aktif</option>
                                <option value="Non Active">Tidak Aktif</option>
                            </select>
                            <div id="status-error" class="fv-plugins-message-container invalid-feedback"></div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

        $('#subdistrict_id').select2({
            dropdownParent: $('#kt_modal_add_user'),
            allowClear: true,
            width: '100%'
        });

        // Auto focus SEMUA Select2
        $(document).on('select2:open', function() {

            setTimeout(function() {

                let search = $('#kt_modal_add_user')
                    .find('.select2-container--open .select2-search__field');

                if (search.length) {
                    search[0].focus();
                }

            }, 200);

        });

    });

    function getVillage(){
        subdistrict_id = document.getElementById("subdistrict_id").value;
        var url = "{{ url('/village/get') }}";
        $.ajax({
            url: url + "/" + subdistrict_id,
            success: function(response){
                $("#village_id").html(response);
            }
        });
        return false;
    }
</script>
