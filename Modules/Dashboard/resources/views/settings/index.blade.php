<x-dashboard::layouts.app>

<form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form"
        enctype="multipart/form-data">
        @csrf

        @if (count($settings) > 0)

        <x-dashboard::cards.sample column="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading mb-4 fs-5 fw-bold">
                    @if ($settings['icon'] !== '')
                    <i class="{{ $settings['icon'] }}"></i>
                    @endif
                    @if ($settings['title'])
                    {{ trans('dashboard::settings.'.strtolower($settings['title'])) }}
                    @endif
                </div>

                @if ($settings['desc'])
                <div class="panel-body">
                    <p class="text-muted">{{ trans('dashboard::settings.'.strtolower($settings['desc'])) }}</p>
                </div>
                @endif

                <div class="panel-body">
                    <div class="row">
                        @foreach ($settings['elements'] as $field)
                        @includeIf('dashboard::settings.fields._' . $field['type'])
                        {{--
                        <x-admin.setting.field.text :field="$field" class="my-2 col-md-6 col-12" /> --}}
                        @endforeach
                    </div>
                </div>

            </div>
        </x-dashboard::cards.sample>

        @endif

        <div class="row m-b-md">
            <div class="col-md-12">
                <button class="btn-primary btn">
                    {{trans('save')}}
                </button>
            </div>
        </div>
    </form>

</x-dashboard::layouts.app>
