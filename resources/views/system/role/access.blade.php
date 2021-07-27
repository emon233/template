@extends('adminLte.master', ['menu' => 'roles'])

@section('page-title', 'Role Manager')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card card-outline card-success">
            <div class="card-header">
                <div class="card-title">
                    {{ __('Access For') }} : <b>{{ $role->title }}</b>
                </div>

                <div class="card-tools">
                    @can('viewAny', \App\Models\Role::class)
                    <a href="{{ route('system.roles.index') }}" class="btn btn-list btn-sm"></a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('system.roles.accesses.store', $role) }}" method="post">
                    @csrf
                    <div class="row">
                        @foreach (all_models() as $model)
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="card card-success shadow-sm {{-- collapsed-card --}}">
                                <div class="card-header">
                                    <h3 class="card-title">{{ $model }}</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body" style="display: block;">
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" id="{{ $model }}"
                                                class="access-checkbox-all" @if(hasAllAccessAssign($model, $role)) checked @endif>
                                            <label for="{{ $model }}" class="col-12">{{ __('All') }}</label>
                                        </div>
                                    </div>
                                    @foreach (all_methods() as $method)
                                    <div class="form-group clearfix">
                                        <div class="icheck-success d-inline">
                                            <input type="checkbox" name="method[{{ $model . '-' . $method }}]" id="method-{{ $model }}-{{ $method }}"
                                                class="access-checkbox access-checkbox-{{ $model }}" data-model="{{ $model }}" @if(hasAccessAssign($model, $method, $role)) checked @endif>
                                            <label for="method-{{ $model }}-{{ $method }}" class="col-12">{{ $method }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-save btn-sm float-right">
                        {{ __('Save Access') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('control-bar')

@endsection

@section('content-scripts')

<script>
    $(document).ready(function(){
        $('.access-checkbox').on('click', function(){
            var model = $(this).data('model');
            var checkboxModel = ".access-checkbox-" + model;
            var siblings = $(checkboxModel);
            var checked = 0;

        })

        $('.access-checkbox-all').on('click', function(){
            var id = $(this).attr('id');

            if($(this).is(':checked')) {
                $('.access-checkbox-'+id).prop('checked', true);
            } else {
                $('.access-checkbox-'+id).prop('checked', false);
            }
        })
    })
</script>

@append
