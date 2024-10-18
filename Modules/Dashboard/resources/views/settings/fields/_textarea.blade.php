<div
    class="form-group mb-3 {{ $field['class'] ?? 'col-md-6' }} {{ $errors->has($field['name'] ?? null) ? ' has-error' : '' }}">
    <label for="{{ $field['name'] ?? '' }}"
        class="mb-2">{{ strtoupper(trans('dashboard::settings.'.strtolower($field['label'])) ?? '') }}</label>
    <textarea name="{{ $field['name'] ?? '' }}" class="form-control {{ $field['class'] ?? '' }}"
        id="{{ $field['name'] ?? '' }}" placeholder="{{ $field['label'] ?? '' }}">{{ old($field['name'] ?? '', \setting($field['name'] ?? '')) }}</textarea>
    @if (isset($field['dimension']))
        {{-- <x-size-notice :key="$field['dimension']" /> --}}
    @endif

    @if ($errors->has($field['name'] ?? ''))
        <small class="help-block">{{ $errors->first($field['name'] ?? '') }}</small>
    @endif
</div>

@pushOnce('component-scripts')
    <script src="{{ asset('assets/vendor/libs/tinymce/tinymce.min.js') }}"></script>
@endPushOnce
