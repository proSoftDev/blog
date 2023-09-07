@extends('admin.layouts.app')
@section('title', __('Посты'))

@section('content')

    @php
        use App\Models\Post;
        use Illuminate\Contracts\Pagination\LengthAwarePaginator;

        /**
         * @var Post[]|LengthAwarePaginator $posts
         */
    @endphp

    <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <div class="d-inline">
                            <h5>@lang('Посты')</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include('admin.partials.breadcrumbs', [
                       'first' => __('Посты'),
                       'active' => 1
                   ])
                </div>
            </div>
        </div>
        <!-- Page-header end -->

        <!-- Page-body start -->
        <div class="page-body">
            <!-- begin row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <a href="{{ route('admin.posts.create') }}" class="btn btn-outline-success">
                                <i class="fa fa-plus fa-fw"></i>
                                @lang('Создать')
                            </a>
                        </div>
                        <div class="card-block">
                            <div class="datatable-wrapper table-responsive">
                                <table class="table table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>@lang('ID')</th>
                                            <th>@lang('Автор')</th>
                                            <th>@lang('Наименование')</th>
                                            <th>@lang('Описание')</th>
                                            <th>@lang('Действия')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($posts as $post)
                                        <tr class="text-center">
                                            <td>
                                                {{ $post->id }}
                                            </td>
                                            <td>
                                                {{ $post->user->name }}
                                            </td>
                                            <td>
                                                {{ $post->title }}
                                            </td>
                                            <td>
                                                {{ $post->short_body }}
                                            </td>
                                            <td>
                                                <div class="button-list">
                                                    @can('update', $post)
                                                        <a class="btn btn-outline-primary mb-1" href="{{ route('admin.posts.edit', $post->id) }}"
                                                           data-toggle="tooltip" title="@lang('Редактировать')">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                    @endcan
                                                    @can('delete', $post)
                                                        {!! Form::open(['route' => ['admin.posts.destroy', $post->id], 'method' => 'post', 'class' => 'd-inline']) !!}
                                                            <a class="btn btn-outline-danger mb-1" href="#?" data-toggle="tooltip" title="@lang('Удалить')"
                                                               onclick="onDelete($(this), '@lang('Удаленный пост не может быть отменен!')')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                            @method('DELETE')
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="odd text-center">
                                            <td valign="top" colspan="6" class="dataTables_empty">
                                                @lang('Записи отсутствуют').
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- Page-body end -->
    </div>
@stop

