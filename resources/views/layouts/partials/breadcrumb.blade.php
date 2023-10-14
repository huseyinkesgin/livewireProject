<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">@yield('pageTitle')</h3>
            <div class="nk-block-des text-soft">
                <p>@yield('pageText').</p>
            </div>
        </div><!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1"
                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                      
                        {{-- <li class="nk-block-tools-opt">
                            <div class="drodown">
                                <a href="#"
                                    class="btn btn-icon btn-primary"><em
                                        class="icon ni ni-plus"></em></a>
                               
                            </div>
                        </li> --}}
                        @yield('newButton')
                    </ul>
                </div>
            </div><!-- .toggle-wrap -->
        </div><!-- .nk-block-head-content -->
    </div><!-- .nk-block-between -->
</div>