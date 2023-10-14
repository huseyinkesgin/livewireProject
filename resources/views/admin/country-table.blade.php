
<div>
    <!-- Flexbox container for aligning the toasts -->

    
  @if($table)
  <li class="nk-block-tools-opt">
    <div class="drodown">
        <button wire:click='Create' type="button" class=" btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></button>

    </div>
</li>
  <div class="card">
    <img class="card-img-top" src="holder.js/100x180/" alt="Title">
    <div class="card-body">
        <h4 class="card-title">Title</h4>
        <p class="card-text">Text</p>
    </div>
</div>
  @endif

    @if($createForm)
    <div>
        <li class="nk-block-tools-opt">
            <div class="drodown">
                <button wire:click='TableShow' type="button" class=" btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></button>
        
            </div>
        </li>
        <h1>bursı create form</h1>
    </div>
    
    @endif

</div>