<!-- sidebar @s -->
<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    @include('layouts.partials.logo')
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="html/crm/index.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-dashboard-fill"></em></span>
                            <span class="nk-menu-text">Kontrol Paneli</span>
                        </a>
                    </li>
                    <li class="nk-menu-item has-sub">
                        <a href="#" class="nk-menu-link nk-menu-toggle">
                            <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                            <span class="nk-menu-text">Stok İşlemleri</span>
                        </a>
                        <ul class="nk-menu-sub">
                            <li class="nk-menu-item">
                                <a href="#" class="nk-menu-link"><span class="nk-menu-text">Birim</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href="{{ route('brand.index') }}" wire:navigate class="nk-menu-link"><span class="nk-menu-text">Marka</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href=#" class="nk-menu-link"><span class="nk-menu-text">Bölüm</span></a>
                            </li>
                            <li class="nk-menu-item">
                                <a href=#" class="nk-menu-link"><span class="nk-menu-text">Stok</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="html/crm/settings.html" class="nk-menu-link">
                            <span class="nk-menu-icon"><em class="icon ni ni-setting-alt-fill"></em></span>
                            <span class="nk-menu-text">Ayarlar</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>