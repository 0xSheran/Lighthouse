<?php use Core\Utils; ?>
<main>
    <?php require_once 'partial/admin-leftmenu.php'; ?>
    <section class="admin-body-section">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <div class="col-lg-6">
                    <div class="card shadow h-100">
                        <div class="card-header border-bottom">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-queue-tab" data-bs-toggle="pill" data-bs-target="#pills-queue" type="button" role="tab" aria-controls="pills-queue" aria-selected="true">Queue</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-approved-tab" data-bs-toggle="pill" data-bs-target="#pills-approved" type="button" role="tab" aria-controls="pills-approved" aria-selected="false">Approved</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-reviewed-tab" data-bs-toggle="pill" data-bs-target="#pills-reviewed" type="button" role="tab" aria-controls="pills-reviewed" aria-selected="false">Reviewed</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-denied-tab" data-bs-toggle="pill" data-bs-target="#pills-denied" type="button" role="tab" aria-controls="pills-denied" aria-selected="false">Denied</button>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content h-100" id="pills-tabContent">
                            <div class="tab-pane fade h-100 show active" id="pills-queue" role="tabpanel" aria-labelledby="pills-queue-tab">
                                <ul class="list-approvals">
                                   <?php
                                   foreach ($__page->claims as $claim) { ?>
                                        <li data-item_id="<?php echo $claim['c_id']; ?>" class="list-approvals-item c_items c_item_<?php echo $claim['c_id']; ?>">
                                            <a class="d-flex text-decoration-none" href="#">
                                                <div class="d-flex align-items-center px-4 gap-3">
                                                    <img src="<?php echo app_cdn_path; ?>img/icon-like.svg" width="40" height="40">
                                                    <img src="<?php echo app_cdn_path; ?>img/icon-dislike.svg" width="40" height="40">
                                                </div>
                                                <div class="ms-8 col-7">
                                                    <div class="fs-4 fw-semibold text-truncate">120 $LHP</div>
                                                    <div class="fw-medium text-truncate"><?php echo $claim['wallet_adr']; ?></div>
                                                    <div class="fw-medium text-muted mt-1">Last claim 3 days ago</div>
                                                </div>
                                                <div class="ms-auto fw-medium text-muted"><?php echo Utils::time_elapsed_string($claim['c_at'],true); ?></div>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="tab-pane fade h-100" id="pills-approved" role="tabpanel" aria-labelledby="pills-approved-tab">
                                <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                    <img src="<?php echo app_cdn_path; ?>img/img-empty.svg" width="208">
                                    <div class="fs-2 fw-semibold mt-20">Hurray, there's nothing in your approved!</div>
                                    <div class="fw-medium text-muted mt-4">When someone makes a claim, it will show up here. </div>
                                </div>
                            </div>
                            <div class="tab-pane fade h-100" id="pills-reviewed" role="tabpanel" aria-labelledby="pills-reviewed-tab">...</div>
                            <div class="tab-pane fade h-100" id="pills-denied" role="tabpanel" aria-labelledby="pills-denied-tab">...</div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6" id="claim_details">

                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center justify-content-center h-100">
                                <img src="<?php echo app_cdn_path; ?>img/img-empty.svg" width="208">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="<?php echo app_cdn_path; ?>img/logo-circle.svg" height="90">
                <div class="fs-2 fw-semibold mt-15">MyDAO Admin Center</div>
                <div class="fw-medium mt-3">To get started please connect a whitelisted wallet</div>
                <button type="button" class="btn btn-primary mt-20 px-10">Connect Wallet</button>
                <div class="text-danger fw-medium mt-20">This wallet does not have access to MyDAO. <br>
                    Please connect with a whitelisted wallet.</div>
            </div>
        </div>
    </div>
</div>
<?php include_once app_root . '/templates/foot.php'; ?>
<script>
    feather.replace();

    $(document).ready(function() {

        $(document).on("click", '.c_items', function(event) {
            var item = $(this);
            $(".c_items").removeClass('active');
            item.addClass('active');
            var data = {'claim_id': item.data('item_id')};

            $.ajax({
                url: 'claim-details',
                dataType: 'json',
                data: data,
                type: 'POST',
                success: function (response) {
                    if (response.success == true) {
                        $('#claim_details').html(response.html);
                    }
                }
            });
        });

    });
</script>