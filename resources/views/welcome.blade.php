<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ config('app.description', 'Laravel') }}">
    <meta name="author" content="Ramakant Gangwar">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>{{ config('app.name', 'Laravel') }}</title>

	<link rel="icon" href="/assets/images/favicon.ico" />
	
	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Kanit:200" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

	<!-- Font Awesome Icon -->
	<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body class="antialiased">
    @if (Route::has('voyager.login'))
        <div class="absolute top-0 right-0 px-6 py-4">
            @auth
                @if (Route::has('voyager.dashboard'))
                    <a href="{{ route('voyager.dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                @endif
                @if (Route::has('impersonate.leave'))
                    @impersonating($guard = null)
                        <a href="{{ route('impersonate.leave') }}" class="text-sm text-gray-700 underline">Leave impersonation</a>
                    @endImpersonating
                @endif
                @if (Route::has('voyager.logout'))
                    <form action="{{ route('voyager.logout') }}" method="POST" style="display: inline-block;">
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <button type="submit" class="text-sm text-gray-700 underline"><i class="voyager-power"></i>Logout</button>
                    </form>
                @endif
            @else
                <a href="{{ route('voyager.login') }}" class="text-sm text-gray-700 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif

	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>{{ config('app.name', 'Laravel') }}</h1>
			</div>
			<p>{{ config('app.description', 'Laravel') }}</p>
			{{-- <p>{{ config('app.description', 'Laravel') }}</p> --}}
            @env(['local', 'demo'])
			<div class="notfound-social">
				<a target="_blank" href="https://github.com/rxcod9/joy-voyager-laravel-demo"><i class="fa fa-github"></i></a>
				<a target="_blank" href="https://github.com/rxcod9"><i class="fa fa-github-alt"></i></a>
                <a target="_blank" href="https://kodmonk.wordpress.com/"><i class="fa fa-wordpress"></i></a>
                {{-- <a target="_blank" href="https://kodmonk.wordpress.com/"><i class="fa fa-youtube"></i></a> --}}
				<a target="_blank" href="https://about.me/rxcod9?promo=email_sig&amp;utm_source=product&amp;utm_medium=email_sig&amp;utm_campaign=edit_panel&amp;utm_content=thumb">
                    <i class="fa">
                        <img src="/assets/images/favicon-3.png" />
                    </i>
                </a>
				<a target="_blank" href="https://www.producthunt.com/@rxcod9">
                    <i class="fa">
                        <img src="/assets/images/product-hunt.png" />
                    </i>
                </a>
				<a target="_blank" href="https://www.fiverr.com/rxcod9">
                    <i class="fa">
                        <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M500 1000C223.858 1000 0 776.142 0 500S223.858 0 500 0s500 223.858 500 500-223.858 500-500 500zm193-530c-.167-.323.34-3.107 0-7v-8c.34-12.657-6.753-17.72-20-18h-44v34h13c3.971.448 6.251 2.726 6 7v66h-19v34h86v-34h-19v-21c-.381-25.23 12.284-41.934 38-42 6.2.066 10 .825 10 1v-46c0-.49-2.786-.997-6-1-21.104-.25-38.835 15.442-45 35zm125 0c-.167-.323.34-3.107 0-7v-8c.34-12.657-6.753-17.72-20-18h-44v34h13c3.971.448 6.251 2.726 6 7v66h-19v34h86v-34h-19v-21c-.381-25.23 12.284-41.934 38-42 6.2.066 10 .825 10 1v-46c0-.49-2.786-.997-6-1-20.85-.25-38.581 15.442-45 35zm-200 32c0-39.157-23.633-68-66-68-45.048 0-73 32.133-73 73 0 37.82 27.19 74 78 74 37.622 0 60.238-19.735 60-20l-17-32c-.042-.373-18.846 13.036-40 13-14.676.036-28.907-7.807-32-26h89c-.27-.024 1-9.639 1-14zm-89-12c2.516-11.012 9.057-21 22-21 10.704 0 18 9.732 18 21h-40zm-50-53h-75v34h13l-16 51c-3.235 8.492-3.994 18.654-4 19h-1c-.006-.346-.765-10.508-4-19l-16-51h13v-34h-75v34h16l39 107h55l39-107h16v-34zm-177 0H197v-7c.392-13.434 13.873-13.688 21-14 7.627.313 11.188 1.074 11 1v-37c.188.015-6.934-1-17-1-21.476 0-61.922 6.092-62 52v6h-19v34h19v73h-18v34h86v-34h-21v-73h58v73h-18v34h83v-34h-18V437zm-24-14c12.703 0 23-10.297 23-23s-10.297-23-23-23-23 10.297-23 23 10.297 23 23 23z"></path></svg>
                    </i>
                </a>
				<a target="_blank" href="https://www.upwork.com/fl/fullstackdeveloperindia">
                    <i class="fa">
                        <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg"><path d="M500 1000C223.858 1000 0 776.142 0 500S223.858 0 500 0s500 223.858 500 500-223.858 500-500 500zm209-671c-77.066.1-136.543 49.953-161 132-36.673-55.469-64.61-121.99-81-178h-83v215c.41 42.225-34.135 76.762-76 77-42.846-.238-77.39-34.775-77-77V283h-83v215c-.3 87.874 71.344 160.101 159 160 88.375.101 160.019-72.126 160-160v-36c16.09 33.327 35.765 67.113 60 97l-51 238h85l36-173c32.381 21.037 69.33 33.951 112 34 90.253-.049 164-74.228 164-165 0-90.172-73.747-163.9-164-164zm0 246c-33.262 0-64.56-14.096-93-37l7-32v-2c6.392-34.118 25.954-92 86-92 45.285 0 82 36.589 82 82-.15 44.411-36.866 81-82 81z"></path></svg>
                    </i>
                </a>
				<a target="_blank" href="https://patreon.com/ramakant">
                    <i class="fa">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1080pt" height="1080pt" viewBox="0 0 1080 1080" preserveAspectRatio="xMidYMid meet" class="text-gray-400">
                            <g transform="translate(0,1080) scale(0.100000,-0.100000)" fill="#f8474c" stroke="none">
                                <path d="M530 5400 l0 -4680 855 0 855 0 0 4680 0 4680 -855 0 -855 0 0 -4680z"/>
                                <path d="M6430 10059 c-700 -76 -1327 -337 -1880 -783 -110 -88 -348 -325
                                    -455 -451 -618 -732 -910 -1703 -800 -2660 109 -943 595 -1799 1347 -2373 501
                                    -382 1061 -612 1704 -699 185 -25 688 -25 864 0 577 82 1039 255 1500 562 345
                                    229 609 479 859 812 395 526 632 1145 691 1803 45 508 -37 1079 -225 1560
                                    -268 687 -732 1264 -1337 1663 -445 293 -893 465 -1433 548 -115 17 -194 22
                                    -445 24 -168 2 -343 -1 -390 -6z"/>
                            </g>
                        </svg>
                    </i>
                </a>
			</div>
            @endenv
            <p class="notfound-footer">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
		</div>
	</div>

    @env(['local', 'demo'])
        <!-- Start of HubSpot Embed Code -->
        <script type="text/javascript" id="hs-script-loader" async defer src="//js-eu1.hs-scripts.com/26678290.js"></script>
        <!-- End of HubSpot Embed Code -->
    @endenv

</body>
</html>