<div class="card-tools">
    <div class="form-inline flex-nowrap gx-3">
        <div class="form-wrap w-70px">
            <select class="form-select js-select2" data-search="off" data-placeholder="Bulk Action">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
        @if ($selectedRows)
            <div class="dropdown">
                <a class="btn btn-primary dropdown-toggle" href="#" type="button"
                    data-bs-toggle="dropdown">Toplu İşlem</a>
                <div class="dropdown-menu">
                    <ul class="link-list-plain no-bdr sm">
                        <li><a wire:click.prevent="deleteSelectedRows" href="#"><i
                                    class="fa-solid fa-trash-can me-2"></i><span>Silme</span></a></li>
                        <li><a wire:click.prevent="passiveSelectedRows" href="#"><i
                                    class="fa-regular fa-circle-xmark me-2"></i><span>Pasif
                                    Yapma</span></a>
                        </li>
                        <li><a wire:click.prevent="activeSelectedRows" href="#"><i
                                    class="fa-solid fa-check me-2"></i><span>Aktif Yapma</span></a></li>
                    </ul>
                </div>
            </div>
            <span class="text-danger fw-bold"> {{ count($selectedRows) }} kayıt seçtiniz</span>
        @endif
    </div>
</div>