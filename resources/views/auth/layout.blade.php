@php
$setting = \App\Helpers\Helpers::setting();
@endphp
<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
        <title>{{ $setting->application_name }}</title>
    	<link rel="icon" type="image/x-icon" href="{{ asset('storage/small_icon.webp') }}"/>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta charset="utf-8" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />  
		<meta property="og:locale" content="in" />
		<meta property="og:type" content="Websitee" />
		<meta property="og:title" content={{ $setting->application_name }} />
		<meta property="og:url" content="{{ url('') }}" />
		<meta property="og:site_name" content={{ $setting->application_name }} />
		<!--begin::Fonts-->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500..700&display=swap" rel="stylesheet">
		<link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{{ asset('backend/assets/css/animate.css') }}" type="text/css" />

		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body" style="background-image: url('{{ asset('storage/background_login.jpg') }}'); background-size: cover;">
        @yield('content')
        <!--end::Main-->
		<script>var hostUrl = "backend/assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->

		<script>var hostUrl = "{{ asset('backend/assets/') }}";</script>
		<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
		<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
		<script src="{{ asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
		<script src="{{ asset('backend/assets/js/custom/widgets.js') }}"></script>
		<script src="{{ asset('backend/assets/js/custom/apps/chat/chat.js') }}"></script>
		<script src="{{ asset('backend/assets/js/custom/modals/create-app.js') }}"></script>
		<script src="{{ asset('backend/assets/js/custom/modals/upgrade-plan.js') }}"></script>
		<script src="{{ asset('backend/assets/js/custom/documentation/forms/flatpickr.js') }}"></script>
		<script src="{{ asset('backend/assets/js/plugins.min.js') }}"></script>
		<script src="{{ asset('backend/assets/js/functions.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>

