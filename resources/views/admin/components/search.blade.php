<div class="row">
    <div class="col-12">
        <form id="form-search" action="{{ route(Route::currentRouteName()) }}" method="get">
            <div class="row filter">
                <div class="col-12 col-lg-1">
                    <select name="per_page" id="per_page" class="form-control">
                        <?php $paginate = app('request')->has('per_page') ? app('request')->input('per_page') : DEFAULT_PAGINATE; ?>
                        @foreach (paginationNumbers() as $item)
                        <option value="{{ $item }}" @if($paginate==$item) selected @endif>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                @if(isset($model))
                <div class="col-12 col-lg-4">
                    <?php
                        $model = new $model;
                        $columns = $model->getFillable();
                    ?>
                    <select name="order_by" id="order_by" class="form-control">
                        <?php $order_by = app('request')->has('order_by') ? app('request')->input('order_by') : '' ?>
                        @foreach ($columns as $column)
                        <option value="{{ $column }}" @if($column==$order_by) selected @endif>
                            {{ modifyColumnName($column) }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-lg-2">
                    <select name="order" id="order" class="form-control">
                        <?php $order = app('request')->has('order') ? app('request')->input('order') : '' ?>

                        <option value="asc" @if($order=='asc' ) selected @endif>{{ __('ASC') }}</option>
                        <option value="desc" @if($order=='desc' ) selected @endif>{{ __('DESC') }}</option>
                    </select>
                </div>
                @else
                <div class="col-12 col-lg-6"></div>
                @endif
                <div class="col-12 col-lg-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="{{ __('Keywords') }}" id="keywords"
                            name="keywords" value="{{ app('request')->input('keywords') }}" />
                    </div>
                </div>
                <div class="col-12 col-md-1">
                    <button type="submit" class="btn form-control btn-filter btn-sm"></button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <ul class="pagination">
            <li class="page-item disabled" aria-labelledby="true">
                <span class="page-link" aria-hidden="true">
                    {{ $paginator->total() . ' ' . __('Results Found') }}
                </span>
            </li>
            <li class="page-item disabled" aria-labelledby="true">
                <span class="page-link" aria-hidden="true">
                    {{ __('Showing') . ': ' . $paginator->firstItem() . ' - ' . $paginator->lastItem() }}
                </span>
            </li>
        </ul>
    </div>
</div>

@section('content-scripts')
<script>
    $(document).ready(function(){
        $('#per_page').on('change', function(e) {
            $('#form-search').submit();
        })

        $('#order_by').on('change', function(e) {
            $('#form-search').submit();
        })

        $('#order').on('change', function(e) {
            $('#form-search').submit();
        })
    })
</script>
@endsection
