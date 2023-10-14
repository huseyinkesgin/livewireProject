<table class="nowrap table" data-export-title="Export">
    <thead>
        <tr>
            <th>
                <div class="custom-control custom-control-sm custom-checkbox">
                    <input wire:model.live='selectPageRows' type="checkbox" class="custom-control-input"
                        id="CheckAll" value="">
                    <label class="custom-control-label" for="CheckAll"></label>
                </div>
            </th>
            <th>#ID</th>
            <th>Marka</th>
            <th>Logo</th>
            <th>Durum</th>
            <th>Silinmiş Mi?</th>
            <th>O.Tarihi</th>
            <th>D.Tarihi</th>
            <th>İşlemler</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($brands as $brand)
            <tr>
                <td>
                    <div class="custom-control custom-control-sm custom-checkbox">
                        <input wire:model.live='selectedRows' type="checkbox"
                            class="custom-control-input" id="customCheck{{ $brand->id }}"
                            value="{{ $brand->id }}">
                        <label class="custom-control-label"
                            for="customCheck{{ $brand->id }}"></label>
                    </div>
                </td>
                <td>{{ $brand->id }}</td>
                <td>
                    {{ $brand->name }}
                </td>
                <td>
                    <img style="height: 25px" class="rounded" src="{{ $brand->logo_url }}"
                        alt="">
                </td>
                <td>
                    @if ($brand->isActive == false)
                        <a href="#"> <span
                                wire:click.prevent='changeStatusActive({{ $brand->id }})'
                                class="badge rounded-pill bg-danger">Pasif</span></a>
                    @else
                        <a href="#"><span
                                wire:click.prevent='changeStatusPassive({{ $brand->id }})'
                                class="badge rounded-pill bg-success">Aktif</span></a>
                    @endif
                </td>
                <td>{{ $brand->isDeleted }}</td>
                <td>{{ $brand->created_at }}</td>
                <td>{{ $brand->updated_at }}</td>

                <td>
                    <button wire:click='edit({{ $brand->id }})'
                        class="btn btn-secondary btn-xs">Düzenle</button>
                        <button wire:click.prevent='sendTrash({{ $brand->id }})' class="btn btn-danger btn-xs">Sil</button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>