<div class="{{ $class }} @error($errorKey) has-danger @enderror">
    @isset($label)
        {!! Form::label($name, $label,  ['class' => $label_class ?? '']) !!}
        @if((isset($required) && $required) || !isset($required))
            <span class="text-danger">*</span>
        @endif
    @endisset
    {!! Form::password($name,
        [
            'class' => 'form-control ' . ($errors->has($errorKey) ? 'form-control-danger' : ''),
            'id' => $id ?? $errorKey,
            'placeholder' => $placeholder ?? null,
            'aria-describedby' => "$errorKey-error",
        ])
    !!}
    @if($name == 'password')
        <div class="text-primary f-11 mt-2">
            <i class="fa fa-info-circle fa-lg mr-1"></i>
            @lang('Для сохранения того же значения оставьте поле пустым')
        </div>
    @endif
    @error($errorKey)
        <div id="{{ $errorKey }}-error" class="col-form-label">{{ $message }}</div>
    @enderror
</div>
