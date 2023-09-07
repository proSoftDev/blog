<div class="page-header-breadcrumb">
    <ul class="breadcrumb-title">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.posts.index') }}">
                <i class="icofont icofont-home"></i>
            </a>
        </li>
        @if(isset($first) && $first)
            @if($active == 1)
                <li class="breadcrumb-item text-primary" aria-current="page">
                    {{ Str::limit($first, 20) }}
                </li>
            @else
                @if(isset($first_link) && $first_link)
                    <li class="breadcrumb-item" >
                        <a href="{{ $first_link }}">
                            {{ Str::limit($first, 20) }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item">
                        {{ Str::limit($first, 20) }}
                    </li>
                @endif
            @endif
        @endif
        @if(isset($second) && $second)
            @if($active == 2)
                <li class="breadcrumb-item text-primary" aria-current="page">
                    {{ Str::limit($second, 20) }}
                </li>
            @else
                @if(isset($second_link) && $second_link)
                    <li class="breadcrumb-item" >
                        <a href="{{ $second_link }}">
                            {{ Str::limit($second, 20) }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item">
                        {{ Str::limit($second, 20) }}
                    </li>
                @endif
            @endif
        @endif
        @if(isset($third) && $third)
            @if($active == 3)
                <li class="breadcrumb-item text-primary" aria-current="page">
                    {{ Str::limit($third, 20) }}
                </li>
            @else
                @if(isset($third_link) && $third_link)
                    <li class="breadcrumb-item" >
                        <a href="{{ $third_link }}">
                            {{ Str::limit($third, 20) }}
                        </a>
                    </li>
                @else
                    <li class="breadcrumb-item">
                        {{ Str::limit($third, 20) }}
                    </li>
                @endif
            @endif
        @endif
    </ul>
</div>
