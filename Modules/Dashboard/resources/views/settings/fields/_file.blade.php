<div class="form-group mb-3 {{ $field['class'] ?? 'col-md-6' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    @if (setting($field['name']))
        @if (str(\setting($field['name'] ?? ''))->afterLast('.') == 'pdf')
            <i class="bx bx-file my-2 d-block text-primary" style="font-size: 2rem"></i>
        @else
            <img src="{{ asset(str_replace('public/', 'storage/', \setting($field['name'] ?? ''))) }}"
                class=" img-thumbnail mb-2" width="100" height="100">
        @endif
    @endif
    @php
        $label = strtoupper(trans('dashboard::settings.'.strtolower($field['label'])) ?? '');
    @endphp
    <label for="{{ $field['name'] ?? '' }}" class="mb-2">{{ $label }}</label>
    <input type="{{ $field['type'] ?? '' }}" name="{{ $field['name'] ?? '' }}"
        value="{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}"
        class="form-control {{ $field['class'] ?? '' }}" id="{{ $field['name'] ?? '' }}"
        placeholder="{{ $label }}">
    @if (isset($field['dimension']))
        {{-- <x-size-notice :key="$field['dimension']" /> --}}
    @endif

    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>
