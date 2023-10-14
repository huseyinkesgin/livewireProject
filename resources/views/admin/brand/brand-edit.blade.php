@if ($EditForm)
    <div class="nk-block nk-block-lg">
        <div class="card-title-group">
            <div class="card-tools">

            </div><!-- .card-tools -->
            <div class="card-tools">
                <ul class="btn-toolbar">

                    <li class="nk-block-tools-opt text-end">
                        <div class="drodown">
                            <button wire:click='table' class="btn btn-dark">
                                <i class="fa-solid fa-table me-1"></i>
                                Tabloya Dön</button>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="card card-bordered card-preview mt-2">

        <div class="card-inner">
            <div class="card-head">
                <h5 class="card-title">Marka</h5>
            </div>
           
                <div class="form-group">
                    <label class="form-label" for="name">Marka Adı</label>
                    <input wire:model='name' type="text" class="form-control" id="name">
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

            
                @if ($brandId)

                    <div style="width: 120px" class="rounded-md">
                        {{-- <img src="{{ $brand->oldImage }}"> --}}
                    </div>
                    @endif
                    @if ($selectedNewImage)
                        <div style="width: 120px" class="rounded-md">
                            <img src="{{ $selectedNewImage->temporaryUrl() }}">
                        </div>
                    @endif
              


                <div wire:ignore.self class="form-group">
                    <label class="form-label" for="customFileLabel">Logo</label>
                    <div class="form-control-wrap">
                        <div class="form-file">
                            <input wire:model='selectedNewImage' type="file" class="form-file-input" id="selectedImage">
                            <label class="form-file-label" for="image">
                                @if ($selectedNewImage)
                                    {{ $selectedNewImage->getClientOriginalName() }}
                                @else
                                    Bilgisayadan Seç
                                @endif
                            </label>
                        </div>
                    </div>
                    @error('selectedNewImage')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label" for="cf-default-textarea">Açıklama</label>
                    <div class="form-control-wrap">
                        <textarea wire:model='description' class="form-control form-control-sm" id="cf-default-textarea"
                            placeholder="Marka hakkında açıklama yazabilirsiniz"></textarea>
                    </div>
                    @error('description')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div wire:ignore.self class="form-group">
                    <label class="form-label">Durum</label>
                    <div class="form-control-wrap">
                        <select wire:model='isActive' class="form-select js-select2">

                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                    </div>
                </div>


                <div class="form-group">
                    <button wire:click.prevent='updateBrand' class="btn btn-lg btn-primary">Güncelle</button>
                </div>
         
        </div>
    </div>
    </div>
@endif