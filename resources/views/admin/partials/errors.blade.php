@if ($errors->any())
    <div class="alert bg-warning mb-4">
        <strong>@lang('Ой')!</strong>
        @lang('Исправьте следующие ошибки'):<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
