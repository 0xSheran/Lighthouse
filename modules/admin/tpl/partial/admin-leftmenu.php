<aside class="admin-left-aside">
    <div class="ms-3">
        <img src="<?php echo app_cdn_path; ?>img/logo.png" >
    </div>
    <div class="main-nav">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-dashboard'?'active':'';?>" aria-current="page" href="admin-dashboard">
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#layers"/>
                </svg>
                <div class="ms-12">Dashboard</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-approvals'?'active':'';?>" href="admin-approvals">
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#check-circle"/>
                </svg>
                <div class="ms-12">Approvals</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-ntts'?'active':'';?>" href="admin-ntts">
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#move"/>
                </svg>
                <div class="ms-12">Send NTTs</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-stewards'?'active':'';?>" href="admin-stewards">
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#user"/>
                </svg>
                <div class="ms-12">Stewards</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-integrations'?'active':'';?>"  href="admin-integrations">
                <!-- <img src="img/icon-integrations.svg">  -->
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#terminal"/>
                </svg>
                <div class="ms-12">Integrations</div>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php echo __ROUTER_PATH=='/admin-settings'?'active':'';?>" href="admin-settings">
                <svg class="feather">
                    <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#settings"/>
                </svg>
                <div class="ms-12">Settings</div>
            </a>
        </li>
    </ul>
    </div>
    <div class="user-nav dropup">
        <div class="dropdown">
            <button class="btn btn-white dropdown-toggle d-flex align-items-center p-0 border-0" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="non-avator me-3"></div>
                <div class="me-2"><?php echo \Core\Utils::WalletAddressFormat($__page->sel_wallet_adr); ?></div>
            </button>
            <ul class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="#">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#refresh-ccw"/>
                        </svg>
                        <div class="ms-12">Disconnect</div>
                    </a>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="admin">
                        <svg class="feather">
                            <use href="<?php echo app_cdn_path; ?>icons/feather-sprite.svg#log-out"/>
                        </svg>
                        <div class="ms-12">Change Wallet</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>