<div class="{{ $class }} @error($errorKey) has-danger @enderror">
    @isset($label)
        {!! Form::label($name, $label,  ['class' => $label_class ?? '']) !!}
        @if((isset($required) && $required) || !isset($required))
            <span class="text-danger">*</span>
        @endif
    @endisset
    {!! Form::text($name, $value ?? null,
        [
            'class' => 'form-control ' .
                ($inputClass ?? '') .
                ($errors->has($errorKey) ? ' form-control-danger' : ''),
            'id' => $id ?? $errorKey,
            'placeholder' => $placeholder ?? null,
            'aria-describedby' => "$errorKey-error",
            'disabled' => $disabled ?? false
        ])
    !!}
    @error($errorKey)
        <div id="{{ $errorKey }}-error" class="col-form-label">{{ $message }}</div>
    @enderror
</div>
