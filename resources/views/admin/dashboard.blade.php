    @extends('admin.layout.header')

    @section('content')

        <button class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
        <iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded"></iconify-icon>
        <span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Settings</span>
        </button>

        <!-- BEGIN: Settings Modal -->
        <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
        <div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300">
            <div>
            <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
                Theme customizer
            </h3>
            <p class="block text-sm font-Inter font-light text-[#68768A] dark:text-[#eee]">Customize & Preview in Real Time</p>
            </div>
            <button type="button" class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas"><iconify-icon icon="line-md:close"></iconify-icon></button>
        </div>
        <div class="offcanvas-body flex-grow overflow-y-auto">
            <div class="settings-modal">
            <div class="p-6">

                <h3 class="mt-4">Theme</h3>
                <form class="input-area flex items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
                <div class="input-group flex items-center">
                    <input type="radio" id="light" name="theme" value="light" class="themeCustomization-checkInput">
                    <label for="light" class="themeCustomization-checkInput-label">Light</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="dark" name="theme" value="dark" class="themeCustomization-checkInput">
                    <label for="dark" class="themeCustomization-checkInput-label">Dark</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="semiDark" name="theme" value="semiDark" class="themeCustomization-checkInput">
                    <label for="semiDark" class="themeCustomization-checkInput-label">Semi Dark</label>
                </div>
                </form>
            </div>
            <div class="divider"></div>
            <div class="p-6">

                <div class="flex items-center justify-between mt-5">
                <h3 class="!mb-0">Rtl</h3>
                <label id="rtl_ltr" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-600"></span>
                </label>
                </div>
            </div>
            <div class="divider"></div>
            <div class="p-6">
                <h3>Content Width</h3>
                <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
                <div class="input-group flex items-center">
                    <input type="radio" id="fullWidth" name="content-width" value="fullWidth" class="themeCustomization-checkInput">
                    <label for="fullWidth" class="themeCustomization-checkInput-label ">Full Width</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="boxed" name="content-width" value="boxed" class="themeCustomization-checkInput">
                    <label for="boxed" class="themeCustomization-checkInput-label ">Boxed</label>
                </div>
                </div>
                <h3 class="mt-4">Menu Layout</h3>
                <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
                <div class="input-group flex items-center">
                    <input type="radio" id="vertical_menu" name="menu_layout" value="vertical" class="themeCustomization-checkInput">
                    <label for="vertical_menu" class="themeCustomization-checkInput-label ">Vertical</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="horizontal_menu" name="menu_layout" value="horizontal" class="themeCustomization-checkInput">
                    <label for="horizontal_menu" class="themeCustomization-checkInput-label ">Horizontal</label>
                </div>
                </div>
                <div id="menuCollapse" class="flex items-center justify-between mt-5">
                <h3 class="!mb-0">Menu Collapsed</h3>
                <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
                </label>
                </div>
                <div id="menuHidden" class="!flex items-center justify-between mt-5">
                <h3 class="!mb-0">Menu Hidden</h3>
                <label id="menuHide" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer">
                    <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
                </label>
                </div>
            </div>
            <div class="divider"></div>
            <div class="p-6">
                <h3>Navbar Type</h3>
                <div class="input-area flex flex-wrap items-center space-x-4 rtl:space-x-reverse">
                <div class="input-group flex items-center">
                    <input type="radio" id="nav_floating" name="navbarType" value="floating" class="themeCustomization-checkInput">
                    <label for="nav_floating" class="themeCustomization-checkInput-label ">Floating</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="nav_sticky" name="navbarType" value="sticky" class="themeCustomization-checkInput">
                    <label for="nav_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="nav_static" name="navbarType" value="static" class="themeCustomization-checkInput">
                    <label for="nav_static" class="themeCustomization-checkInput-label ">Static</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="nav_hidden" name="navbarType" value="hidden" class="themeCustomization-checkInput">
                    <label for="nav_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
                </div>
                </div>
                <h3 class="mt-4">Footer Type</h3>
                <div class="input-area flex items-center space-x-4 rtl:space-x-reverse">
                <div class="input-group flex items-center">
                    <input type="radio" id="footer_sticky" name="footerType" value="sticky" class="themeCustomization-checkInput">
                    <label for="footer_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="footer_static" name="footerType" value="static" class="themeCustomization-checkInput">
                    <label for="footer_static" class="themeCustomization-checkInput-label ">Static</label>
                </div>
                <div class="input-group flex items-center">
                    <input type="radio" id="footer_hidden" name="footerType" value="hidden" class="themeCustomization-checkInput">
                    <label for="footer_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>

        <div class="flex flex-col justify-between min-h-screen">
        <div>

            <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
            <div class="page-content">
                <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">

                    <div>
                   {{--  <div class="flex justify-between flex-wrap items-center mb-6">
                        <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">Ecommerce</h4>
                        <div class="flex sm:space-x-4 space-x-2 sm:justify-end items-center rtl:space-x-reverse">
                        <button class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                            <span class="flex items-center">
                            <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light" icon="heroicons-outline:calendar"></iconify-icon>
                            <span>Weekly</span>
                            </span>
                        </button>
                        <button class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                            <span class="flex items-center">
                            <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light" icon="heroicons-outline:filter"></iconify-icon>
                            <span>Select Date</span>
                            </span>
                        </button>
                        </div> 
                    </div>--}}
                    <div class="grid grid-cols-12 gap-5 mb-5">
                        <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
                        <div class="bg-no-repeat bg-cover bg-center p-5 rounded-[6px] relative" style="background-image: url(assets/images/all-img/widget-bg-2.png)">
                            <div class="max-w-[180px]">
                            <h4 class="text-xl font-medium dark:text-white text-black mb-2">
                                <span class="block font-normal  ">Good evening,</span>

                                <span class="block">
                                @php
                                    $userName = auth()->user()->name ?? 'User';
                                    $title = 'Mr.';
                                    if (str_ends_with($userName, 'Kumar')) {
                                        $title = 'Mr.';
                                    } elseif (str_ends_with($userName, 'Kumari')) {
                                        $title = 'Ms.';
                                    }
                                @endphp
                                {{ $title }} {{ $userName }}
                            </span>
                            
                            </h4>
                            <p class="text-sm dark:text-white text-black font-normal">
                                Welcome to Dashcode
                            </p>
                            </div>
                        </div>
                        </div>
                        {{-- <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
                        <div class="grid md:grid-cols-3 grid-cols-1 gap-4"> 

                        <div class="card">
                            <div class="card-body pt-4 pb-3 px-4">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#E5F9FF] dark:bg-slate-900	 text-info-500">
                                    <iconify-icon icon=heroicons:shopping-cart></iconify-icon>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Totel revenue
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    3,564
                                    </div>
                                </div>
                                </div>
                                <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                                <div id="spae-line1"></div>
                                </div>
                            </div>
                            </div> 
                             <div class="card">
                            <div class="card-body pt-4 pb-3 px-4">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#FFEDE6] dark:bg-slate-900	 text-warning-500">
                                    <iconify-icon icon=heroicons:cube></iconify-icon>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Products sold
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    564
                                    </div>
                                </div>
                                </div>
                                <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                                <div id="spae-line2"></div>
                                </div>
                            </div>
                            </div> 

                            <div class="card">
                            <div class="card-body pt-4 pb-3 px-4">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none">
                                    <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#EAE6FF] dark:bg-slate-900	 text-[#5743BE]">
                                    <iconify-icon icon=heroicons:arrow-trending-up-solid></iconify-icon>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                                    Growth
                                    </div>
                                    <div class="text-slate-900 dark:text-white text-lg font-medium">
                                    +5.0%
                                    </div>
                                </div>
                                </div>
                                <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                                <div id="spae-line3"></div>
                                </div>
                            </div>
                            </div> 
                        </div>
                        </div>
                         --}} 
                    </div>
                    {{-- <div class="grid grid-cols-12 gap-5">
                        <div class="2xl:col-span-8 lg:col-span-7 col-span-12">
                        <div class="card">
                            <div class="card-body p-6">
                            <div class="legend-ring">
                                <div id="revenue-barchart"></div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="2xl:col-span-4 lg:col-span-5 col-span-12">
                        <div class="card">
                            <header class="card-header">
                            <h4 class="card-title">Statistic</h4>
                            <div>
                                <div class="relative">
                                <div class="dropdown relative">
                                    <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                            rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                    </button>
                                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                        shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Year</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </header>
                            <div class="card-body p-6">
                            <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                                <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                                <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                                    Orders
                                </div>
                                <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                                    123k
                                </div>
                                <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                                    <span class="text-warning-500">-60%
                                        </span>
                                    From last Week
                                </div>
                                <div class="mt-4">
                                    <div class="bar-chart" colors="#FA916B" height="44"></div>
                                </div>
                                </div>
                                <!-- end single -->
                                <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                                <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                                    Profit
                                </div>
                                <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                                    654k
                                </div>
                                <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                                    <span class="text-primary-500">+02%
                                        </span>
                                    From last Week
                                </div>
                                <div class="mt-4">
                                    <div class="line-chart" colors="#4669fa" height="44"></div>
                                </div>
                                </div>
                                <div class="md:col-span-2">
                                <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                                    <div class="flex items-center">
                                    <div class="flex-none">
                                        <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                                        Earnings
                                        </div>
                                        <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                                        $12,335.00
                                        </div>
                                        <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                                        <span class="text-primary-500">+08%</span>
                                        From last Week
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <div class="legend-ring2">
                                        <div class="donut-chart" height="180" colors="#F1595C,#0CE7FA" hidelabel="hideLabel" size="65%"></div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Customer</h4>
                            <div>
                                <div class="relative">
                                <div class="dropdown relative">
                                    <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                            rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                    </button>
                                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                        shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Year</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-body p-6">


                            <div class="pb-2">
                                <div class="grid md:grid-cols-3 grid-cols-1 gap-5">

                                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
                                    before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-info-500">
                                    <div class="  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                                    <img src=assets/images/all-img/cus-1.png alt="" class="w-full h-full rounded-full">
                                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
                                        items-center justify-center text-white text-xs font-medium">
                                        2
                                    </span>
                                    </div>
                                    <h4 class="text-sm text-slate-600 font-semibold mb-4">
                                    Nicole Kidman
                                    </h4>
                                    <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    70
                                    </div>
                                    <div>
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                                        <span>Progress</span>
                                        <span class="font-normal">70%</span>
                                    </div>

                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-info-500 h-full rounded-xl" style="width: 70%"></div>
                                    </div>
                                    </div>
                                </div>

                                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
                                    before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-warning-500">
                                    <div class="  ring-2 ring-[#FFC155]  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                                    <span class="crown absolute -top-[24px] left-1/2 -translate-x-1/2">
                                <img src="assets/images/icon/crown.svg" alt="">
                            </span>

                                    <img src=assets/images/all-img/cus-2.png alt="" class="w-full h-full rounded-full">
                                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
                                            items-center justify-center text-white text-xs font-medium">
                                        1
                                    </span>
                                    </div>
                                    <h4 class="text-sm text-slate-600 font-semibold mb-4">
                                    Monica Bellucci
                                    </h4>
                                    <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    80
                                    </div>
                                    <div>
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                                        <span>Progress</span>
                                        <span class="font-normal">80%</span>
                                    </div>

                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 80%"></div>
                                    </div>
                                    </div>
                                </div>

                                <div class="relative z-[1] text-center p-4 rounded before:w-full before:h-[calc(100%-60px)] before:absolute before:left-0
                                        before:top-[60px] before:rounded before:z-[-1] before:bg-opacity-[0.1] before:bg-success-500">
                                    <div class="  h-[70px] w-[70px] rounded-full mx-auto mb-4 relative">

                                    <img src=assets/images/all-img/cus-3.png alt="" class="w-full h-full rounded-full">
                                    <span class="h-[27px] w-[27px] absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col
                                    items-center justify-center text-white text-xs font-medium">
                                        3
                                    </span>
                                    </div>
                                    <h4 class="text-sm text-slate-600 font-semibold mb-4">
                                    Pamela Anderson
                                    </h4>
                                    <div class="inline-block bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    65
                                    </div>
                                    <div>
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3 mt-4">
                                        <span>Progress</span>
                                        <span class="font-normal">65%</span>
                                    </div>

                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-success-500 h-full rounded-xl" style="width: 65%"></div>
                                    </div>
                                    </div>
                                </div>

                                </div>
                                <div class="grid grid-cols-1 gap-5 mt-5">

                                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
                                    space-y-3 rtl:space-x-reverse">
                                    <div class="  h-10 w-10 rounded-full relative">

                                    <img src=assets/images/users/user-1.jpg alt="" class="w-full h-full rounded-full">
                                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
                                            justify-center text-white text-[10px] font-medium">
                                        4
                                    </span>
                                                </div>
                                    <h4 class="text-sm text-slate-600 font-semibold">
                                    Dianne Russell
                                    </h4>
                                    <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    60
                                    </div>
                                    <div class="flex-1">
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                                        <span>Progress</span>
                                        <span class="font-normal">60%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-info-500 h-full rounded-xl" style="width: 60%"></div>
                                    </div>
                                    </div>
                                </div>

                                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
                                        space-y-3 rtl:space-x-reverse">
                                    <div class="  h-10 w-10 rounded-full relative">

                                    <img src=assets/images/users/user-2.jpg alt="" class="w-full h-full rounded-full">
                                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
                                            justify-center text-white text-[10px] font-medium">
                                        5
                                    </span>
                                    </div>
                                    <h4 class="text-sm text-slate-600 font-semibold">
                                    Robert De Niro
                                    </h4>
                                    <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    50
                                    </div>
                                    <div class="flex-1">
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                                        <span>Progress</span>
                                        <span class="font-normal">50%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 50%"></div>
                                    </div>
                                    </div>
                                </div>

                                <div class="relative z-[1] p-4 rounded md:flex items-center bg-gray-5003 dark:bg-slate-900 md:space-x-10 md:space-y-0
                                     space-y-3 rtl:space-x-reverse">
                                    <div class="  h-10 w-10 rounded-full relative">

                                    <img src=assets/images/users/user-3.jpg alt="" class="w-full h-full rounded-full">
                                    <span class="h-4 w-4 absolute right-0 bottom-0 rounded-full bg-[#FFC155] border border-white flex flex-col items-center
                                            justify-center text-white text-[10px] font-medium">
                                        6
                                    </span>
                                    </div>
                                    <h4 class="text-sm text-slate-600 font-semibold">
                                    De Niro
                                    </h4>
                                    <div class="inline-block text-center bg-slate-900 text-white px-[10px] py-[6px] text-xs font-medium rounded-full min-w-[60px]">
                                    60
                                    </div>
                                    <div class="flex-1">
                                    <div class="flex justify-between text-sm font-normal dark:text-slate-300 mb-3">
                                        <span>Progress</span>
                                        <span class="font-normal">60%</span>
                                    </div>
                                    <div class="w-full bg-slate-200 h-2 rounded-xl overflow-hidden">
                                        <div class="progress-bar bg-warning-500 h-full rounded-xl" style="width: 60%"></div>
                                    </div>
                                    </div>
                                </div>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                        <div class="card">
                            <div class="card-header noborder">
                            <h4 class="card-title">Recent Orders
                            </h4>
                            <div>
                                <!-- BEGIN: Card Dropdown -->
                                <div class="relative">
                                <div class="dropdown relative">
                                    <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                            rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                    </button>
                                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                        shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                        Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                            dark:hover:text-white">
                                        Last Year</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-body p-6">

                            <div class="overflow-x-auto -mx-6">
                                <div class="inline-block min-w-full align-middle">
                                <div class="overflow-hidden ">
                                    <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                    <thead class=" bg-slate-200 dark:bg-slate-700">
                                        <tr>

                                        <th scope="col" class=" table-th ">
                                            User
                                        </th>

                                        <th scope="col" class=" table-th ">
                                            Invoice
                                        </th>

                                        <th scope="col" class=" table-th ">
                                            Price
                                        </th>

                                        <th scope="col" class=" table-th ">
                                            Status
                                        </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-1.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Esther Howard
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#324567</td>
                                        <td class="table-td">$90.99</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                bg-success-500">
                                            paid
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-2.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Guy Hawkins
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#4224</td>
                                        <td class="table-td">$78.65</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                bg-warning-500">
                                            due
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-3.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Bessie Cooper
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#4224</td>
                                        <td class="table-td">$78.65</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-warning-500
                                                bg-warning-500">
                                            pending
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-4.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Kathryn Murphy
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#4224</td>
                                        <td class="table-td">$38.65</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                bg-danger-500">
                                            cancled
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-5.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Darrell Steward
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#4224</td>
                                        <td class="table-td">$178.65</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-primary-500
                                                bg-primary-500">
                                            shipped
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-6.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Darrell Steward
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#4224</td>
                                        <td class="table-td">$74.65</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-danger-500
                                                bg-danger-500">
                                            cancled
                                            </div>

                                        </td>
                                        </tr>

                                        <tr>
                                        <td class="table-td">
                                            <div class="flex items-center">
                                            <div class="flex-none">
                                                <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                                <img src=assets/images/users/user-1.jpg alt="" class="w-full h-full rounded-[100%] object-cover">
                                                </div>
                                            </div>
                                            <div class="flex-1 text-start">
                                                <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                                Esther Howard
                                                </h4>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="table-td">#324567</td>
                                        <td class="table-td">$90.99</td>
                                        <td class="table-td ">

                                            <div class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-[999px] bg-opacity-25 text-success-500
                                                bg-success-500">
                                            paid
                                            </div>

                                        </td>
                                        </tr>

                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-8 lg:col-span-7 col-span-12">
                        <div class="card">
                            <header class=" card-header">
                            <h4 class="card-title">Visitors Report
                            </h4>
                            </header>
                            <div class="card-body px-6 pb-6">
                            <div id="areaChart"></div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-4 lg:col-span-5 col-span-12">
                        <div class="card">
                            <header class=" card-header">
                            <h4 class="card-title">Visitors By Gender
                            </h4>
                            </header>
                            <div class="card-body px-6 pb-6">
                            <div id="visitor-chart"></div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Most Sales</h4>
                            <div>
                                <div class="relative">
                                <div class="dropdown relative">
                                    <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                            rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                    </button>
                                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                        shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                        Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                        Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                        dark:hover:text-white">
                                        Last Year</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-body p-6">

                            <div>
                                <div class="h-[290px] w-full bg-white dark:bg-slate-800 ltr:pl-10 rtl:pr-10">
                                <div id="world-map" class="h-full w-full"></div>
                                </div>
                                <ul class="bg-slate-50 dark:bg-slate-900 rounded p-4 min-w-[184px] mt-8 flex justify-between flex-wrap items-center text-center">


                                <li class="text-sm text-slate-600 dark:text-slate-300">
                                    <span class="block space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="bg-primary-500 ring-primary-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"
                                    ></span>
                                    <span>Nevada</span>
                                    </span>
                                    <span class="block mt-1">(80%)</span>
                                </li>


                                <li class="text-sm text-slate-600 dark:text-slate-300">
                                    <span class="block space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="bg-success-500 ring-success-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"
                                    ></span>
                                    <span>Ohio</span>
                                    </span>
                                    <span class="block mt-1">(75%)</span>
                                </li>


                                <li class="text-sm text-slate-600 dark:text-slate-300">
                                    <span class="block space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="bg-info-500 ring-info-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"
                                    ></span>
                                    <span>Montana</span>
                                    </span>
                                    <span class="block mt-1">(65%)</span>
                                </li>


                                <li class="text-sm text-slate-600 dark:text-slate-300">
                                    <span class="block space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="bg-warning-500 ring-warning-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"
                                    ></span>
                                    <span>Iowa</span>
                                    </span>
                                    <span class="block mt-1">(85%)</span>
                                </li>


                                <li class="text-sm text-slate-600 dark:text-slate-300">
                                    <span class="block space-x-2 rtl:space-x-reverse">
                                    <span
                                        class="bg-success-500 ring-success-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"
                                    ></span>
                                    <span>Arkansas</span>
                                    </span>
                                    <span class="block mt-1">(90%)</span>
                                </li>

                                </ul>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="xl:col-span-6 col-span-12">
                        <div class="card">
                            <div class="card-header">
                            <h4 class="card-title">Best Selling Products</h4>
                            <div>
                                <div class="relative">
                                <div class="dropdown relative">
                                    <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                                            rounded dark:text-slate-400">
                                        <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                                    </span>
                                    </button>
                                    <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                         shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                         dark:hover:text-white">
                                        Last 28 Days</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                         dark:hover:text-white">
                                        Last Month</a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                             dark:hover:text-white">
                                        Last Year</a>
                                    </li>
                                    </ul>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="card-body p-6">

                            <div class="grid md:grid-cols-3 grid-cols-1 gap-5">


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-1.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                    $150.00
                                </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-2.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                    $150.00
                                </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-3.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                $150.00
                            </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-4.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                    $150.00
                                </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-5.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                    $150.00
                                </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>


                                <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                                <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                                    <img src=assets/images/all-img/p-6.png alt="" class="w-full h-full rounded-full">
                                </div>
                                <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                                    $150.00
                                </span>
                                <span class="text-slate-600 dark:text-slate-300 text-sm mb-4 block">
                                    Car engine oil
                                </span>
                                <a href="#" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                                    View More
                                </a>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div> --}}
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        @endsection
