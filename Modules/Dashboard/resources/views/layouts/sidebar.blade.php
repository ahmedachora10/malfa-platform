{{-- @php
    $notifications = collect(
        auth()->user()->hasRole('admin')
            ? auth()->user()?->unreadNotifications()->where('type', 'App\Notifications\ClientActionNotification')->get()
            : [],
    )->pluck('data');

    // $servicesRequestsCount = $notifications->where('type', 'App\Models\ServiceRequest')->count();
    $jobsRequestsCount = $notifications->where('model', 'App\Models\JobRequest')->count();
    $contactsCount = $notifications->where('model', 'App\Models\ContactUs')->count();
    $packagesRequestCount = $notifications->where('model', 'App\Models\SubscribePackageRequest')->count();
    $subscribersCount = $notifications->where('model', 'App\Models\Subscriber')->count();
@endphp --}}

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" data-bg-class="bg-menu-theme">
    <div class="app-brand demo d-flex align-items-center justify-content-center">
        <a href="{{ route('dashboard') }}"
            class="app-brand-link">
            <span class="app-brand-logo demo">
                {{-- <x-dashboard.logo width="25" /> --}}
                <img src="{{ session('theme') === 'dark' ? asset('assets/img/logo-white.png') : asset(setting('logo')) }}"
                    alt="logo" width="75" class="">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">{{ setting('app_name') }}</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 ps ps--active-y">

        <x-dashboard::sidebar.link :title="trans('dashboard::sidebar.dashboard')" icon="home-circle" :link="route('dashboard')" />

        <x-dashboard::sidebar.link-head>
            <span>{{ trans('dashboard::sidebar.settings') }}</span>
        </x-dashboard::sidebar.link-head>

        <x-dashboard::sidebar.link title="Settings" icon="cog" :hasSubMenu="true">
            @foreach (config('dashboard-settings', []) as $section => $options)
                <x-dashboard::sidebar.link :title="trans('dashboard::settings.'.$section)"
                :link="route('settings.index', str($section)->replace(' ', '-')->value())" />
            @endforeach

        </x-dashboard::sidebar.link>

        {{-- <x-dashboard::sidebar.link :title="trans('dashboard::sidebar.settings')" icon="cog" link="#" :hasSubMenu="true"> --}}


            {{-- <x-dashboard::sidebar.link :title="trans('dashboard::sidebar.subscribers')" icon="user" :link="route('subscribers.index')" :notification="$subscribersCount" />

            <x-dashboard::sidebar.link :title="trans('dashboard::sidebar.services')" icon="server" :link="route('services.index')" /> --}}

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 686px; right: 4px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 528px;"></div>
        </div>
    </ul>
</aside>
