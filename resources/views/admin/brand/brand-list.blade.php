<div>
    @if ($ShowTable)
    <div class="nk-block nk-block-lg">
        <div class="card-title-group">
            @include('admin.brand.brand-card-tools')
            @include('admin.brand.brand-create-button')
        </div>
    </div>
    <div class="card card-bordered card-preview mt-2">
        <div class="card-inner">
            @include('admin.brand.brand-table')
        </div>
        <div class="col-7 col-sm-12 col-md-9 mb-2 mx-4">
            <div class="dataTables_paginate paging_simple_numbers">
                <ul class="pagination">
                    {{ $brands->links() }}
                </ul>
            </div>
            <div class="mt-1">
                <span>{{ $totalBrands }} kayıtdan {{ count($brands) }} tanesi gösteriliyor</span>
            </div>
        </div>
    </div>
    @endif
    @include('admin.brand.brand-create')
    @include('admin.brand.brand-edit')
</div>
@push('script')
@endpush