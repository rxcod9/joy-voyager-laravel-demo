<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ config('app.description', 'Laravel') }}">
        <meta name="author" content="Ramakant Gangwar">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('voyager.login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        @if (Route::has('voyager.dashboard'))
                            <a href="{{ route('voyager.dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                        @else
                            <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                        @endif
                    @else
                        <a href="{{ route('voyager.login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <table cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td style="line-height:0;vertical-align:top;padding-left:10px;padding-right:10px;" width="72" valign="top" align="left">
                                    <a href="https://about.me/rxcod9?promo=email_sig&amp;utm_source=product&amp;utm_medium=email_sig&amp;utm_campaign=edit_panel&amp;utm_content=thumb" style="text-decoration:none;">
                                        <img src="https://assets.about.me/background/users/r/x/c/rxcod9_1624648695_132.png" alt="" style="margin:0;padding:0;display:block;border:1px solid #eeeeee;" width="72" height="72">
                                    </a>
                                </td>
                                <td style="line-height:1.1;vertical-align:top;padding-right:10px;" valign="top" align="left">
                                    <h1 style="font-size:18px;font-weight:bold;color:#333333;font-family:'Proxima Nova',Helvetica,Arial,sans-serif !important;">{{ config('app.name', 'Laravel') }}</h1>
                                    <div style="font-size:10px;font-weight:bold;color:#333333;font-family:'Proxima Nova',Helvetica,Arial,sans-serif !important;">Ramakant Gangwar</div>
                                    <a href="https://about.me/rxcod9?promo=email_sig&amp;utm_source=product&amp;utm_medium=email_sig&amp;utm_campaign=edit_panel&amp;utm_content=thumb" style="text-decoration:none;font-size:10px;color:#2b82ad;font-family:'Proxima Nova',Helvetica,Arial,sans-serif !important;">about.me/rxcod9
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://github.com/rxcod9/joy-voyager-datatable" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    {{ config('app.description', 'Laravel') }}<br/><br/>
                                    #laravel #joy #voyager #yajra-datatable #voyager-datatable #joy-voyager-datatable
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://github.com/rxcod9/joy-voyager-datatable/issues" class="underline text-gray-900 dark:text-white">Facing issues?</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Find yourself stuck using the package? Found a bug? Do you have general questions or suggestions for improving the joy voyager-datatable? Feel free to <a href="https://github.com/rxcod9/joy-voyager-datatable/issues">create an issue on GitHub</a>, we'll try to address it as soon as possible.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://github.com/rxcod9?tab=repositories" class="underline text-gray-900 dark:text-white">My Recent work</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <b>[Joy VoyagerDataTable]</b> Joy VoyagerDataTable module adds Async/Ajax Yajra DataTable to Voyager.<br/>
                                    <b>[Joy VoyagerApi]</b> Joy VoyagerApi module adds REST Api end points to Voyager with Passport and Swagger support. .<br/>
                                    <b>[Joy VoyagerApiAuth]</b> Joy VoyagerApiAuth module adds REST Api Auth end points with Passport support to Voyager.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-gray-500" version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" preserveAspectRatio="xMidYMid meet">
                                    <g transform="translate(0,512) scale(0.100000,-0.100000)" fill="currentColor">
                                        <path d="M400 4833 c-188 -21 -355 -177 -390 -362 -14 -74 -14 -2878 0 -2952
                                            22 -118 112 -245 213 -301 117 -66 62 -62 940 -66 l797 -3 0 -284 0 -285 -134
                                            0 c-122 0 -136 -2 -167 -23 -92 -61 -90 -181 4 -251 28 -21 31 -21 897 -21
                                            866 0 869 0 897 21 94 70 96 190 4 251 -31 21 -45 23 -167 23 l-134 0 0 285 0
                                            284 798 3 c877 4 822 0 939 66 101 56 191 183 213 301 14 74 14 2878 0 2952
                                            -29 156 -140 281 -306 345 -47 18 -120 19 -2209 20 -1188 1 -2176 -1 -2195 -3z
                                            m4346 -319 c15 -11 37 -33 48 -48 21 -27 21 -34 24 -1182 l2 -1154 -2260 0
                                            -2260 0 0 1140 c0 944 2 1146 14 1173 17 40 55 75 92 87 16 5 985 8 2171 7
                                            l2142 -2 27 -21z m72 -2823 c-3 -152 -9 -168 -72 -215 l-27 -21 -2159 0 -2159
                                            0 -27 21 c-63 47 -69 63 -72 215 l-4 139 2262 0 2262 0 -4 -139z m-1968 -826
                                            l0 -285 -290 0 -290 0 0 285 0 285 290 0 290 0 0 -285z"/>
                                        <path d="M2780 3888 c-27 -18 -97 -136 -347 -580 -173 -307 -317 -573 -320
                                            -592 -8 -48 2 -80 38 -121 56 -64 155 -67 212 -6 20 21 562 974 631 1108 35
                                            68 10 152 -56 193 -46 28 -115 26 -158 -2z"/>
                                        <path d="M1678 3766 c-44 -23 -590 -396 -622 -425 -56 -51 -69 -116 -37 -180
                                            17 -31 72 -73 328 -248 169 -116 319 -216 332 -223 33 -17 112 -8 149 19 64
                                            45 78 149 28 208 -13 15 -116 91 -229 168 -113 77 -203 143 -201 146 2 4 92
                                            67 200 140 218 149 238 166 255 216 38 115 -97 234 -203 179z"/>
                                        <path d="M3325 3766 c-70 -31 -108 -112 -86 -179 17 -50 37 -67 255 -216 108
                                            -73 198 -136 200 -140 2 -3 -88 -69 -201 -146 -113 -77 -216 -153 -229 -168
                                            -50 -59 -36 -163 28 -208 37 -27 116 -36 149 -19 13 7 163 107 332 223 256
                                            175 311 217 328 248 30 60 22 118 -24 167 -12 13 -161 119 -331 234 -331 226
                                            -352 236 -421 204z"/>
                                        </g>
                                        </svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">What I am planning to do next</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    <ul>
                                        <li>[Joy VoyagerDataTable] Add Global Search + Column Filter support, Support multiple type of datatable</li>
                                        <li>[Joy VoyagerDataTable] Add caching to speedup</li>
                                        <li>[Joy VoyagerApi] Add caching to speedup</li>
                                        <li>[Joy VoyagerImportExport] Add import/export to Voyager supporitng formats (Excel, CSV, TSV, JSON, XML, SQL)</li>
                                        <li>[Joy VoyagerWidgets] Add Dimmers (Charts, Aggregated Numbers, Mini Tables)</li>
                                        {{-- <li>[Joy VoyagerUserSettings] Add user specifix settings similar as voyager global settings.</li>
                                        <li>[Joy VoyagerInlineEditing] Add inline editing feature.</li>
                                        <li>[Joy VoyagerGenerator] DB schema/table to Voyager DataType+DataRows+Menus+Permissions+TableSeeder auto converting to DataRows.</li>
                                        <li>[Joy VoyagerHelpDesk] Support Systems with data types (Tickets, Teams, Agents, Conversations, Notes, Categories).</li>
                                        <li>[Joy VoyagerCRM] SaleCRM with data types (Inspired from SuiteCRM).</li>
                                        <li>[Joy VoyagerSurvey] A simple survey app.</li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 120 120" preserveAspectRatio="xMidYMid meet" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <g transform="translate(0,120) scale(0.100000,-0.100000)">
                                    <path d="M452 1170 c-109 -29 -187 -74 -272 -160 -87 -86 -131 -163 -160 -276 -36 -141 -18 -294 52 -427 48 -92 164 -205 259 -251 103 -51 113 -48 117 35 l3 66 -59 0 c-75 0 -116 23 -147 84 -13 26 -38 58 -55 73 -36 29 -31 51 9 41 32 -8 51 -23 47 -38 -1 -7 -1 -8 2 -4 5 9 32 -11 32 -25 0 -5 -4 -6 -10 -3 -5 3 -10 1 -10 -5 0 -7 6 -10 14 -7 8 3 22 -3 31 -13 39 -43 137 -37 153 8 6 15 13 34 17 43 5 13 -2 18 -35 23 -60 9 -135 50 -165 90 -60 79 -73 213 -29 306 19 39 26 69 25 103 -2 26 0 61 4 77 9 40 43 40 119 1 55 -28 59 -28 132 -18 53 8 95 8 148 0 73 -10 77 -10 132 18 76 39 110 39 119 -1 4 -16 6 -51 4 -77 -1 -34 6 -64 25 -103 44 -93 31 -227 -29 -306 -31 -41 -108 -82 -169 -90 l-45 -7 17 -25 c13 -20 18 -57 22 -151 6 -151 6 -151 119 -95 95 46 211 159 259 251 42 80 72 198 72 283 0 85 -30 203 -72 283 -42 81 -164 203 -245 245 -132 69 -291 88 -431 52z"/>
                                </g>
                            </svg>

                            <a target="_blank" href="https://github.com/rxcod9/joy-voyager-datatable-laravel-demo" class="ml-1 underline">
                                Github
                            </a>

                            {{-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a target="_blank" href="https://github.com/sponsors/rxcod9" class="ml-1 underline">
                                Sponsor
                            </a> --}}

                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1080pt" height="1080pt" viewBox="0 0 1080 1080" preserveAspectRatio="xMidYMid meet" class="ml-4 -mt-px w-5 h-5 text-gray-400">
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

                            <a target="_blank" href="https://patreon.com/ramakant" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
