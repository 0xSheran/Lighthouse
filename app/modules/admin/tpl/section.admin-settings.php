<main>
    <?php require_once 'partial/admin-leftmenu.php'; ?>
    <section class="admin-body-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <form id="settingsForm" method="post" action="admin-settings" autocomplete="off">
                            <div class="card-body p-xl-20">
                                <div class="display-5 fw-medium">Community info</div>
                                <div class="text-muted mt-1">Configure details and setup your community</div>
                                <div class="row mt-20">
                                    <div class="col-xl-6">
                                        <label for="" class="form-label">Community name</label>
                                        <input type="text" class="form-control form-control-lg mb-6"
                                             value="<?php echo $__page->community->dao_name; ?>" name="dao_name"
                                             id="dao_name">
                                    </div>
                                    <div class="col-xl-6">
                                        <label for="" class="form-label">Blockchain</label>
                                        <div id="selected_blockchain" class="d-flex align-items-center form-control form-control-lg py-3 mb-6">
                                            <?php if($__page->community->blockchain == SOLANA){ ?>
                                                <img src="<?php echo app_cdn_path; ?>img/solana-sol-logo.png" class="mx-3" width="40">
                                                <div class="fs-3">Solana</div>
                                            <?php }else if($__page->community->blockchain == GNOSIS_CHAIN){ ?>
                                                <img src="<?php echo app_cdn_path; ?>img/gnosis-chain-logo.png" class="me-3">
                                                <div class="fs-3">Gnosis Chain</div>
                                            <?php }else{ ?>
                                                <img src="<?php echo app_cdn_path; ?>img/optimism-logo.png" class="mx-3" width="40">
                                                <div class="fs-3">Optimism</div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-xl-12">
                                    <div class="col">
                                        <label for="NTTTicker" class="form-label">Contact address:</label>
                                        <div class="d-flex align-items-center mb-6">
                                            <div class="fw-semibold fs-3">FCFgr8r2V2J5AmvzRXKzPJiA19gfqE9kaPra5LM5ygrE</div>
                                            <i data-feather="copy" class="ms-3 text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="row mt-xl-12">
                                  <div class="col">
                                    <label for="NTTTicker" class="form-label">Personalize claim form</label>
                                    <div class="d-flex flex-column flex-xl-row align-items-center">
                                        <div class="card bg-lighter card-image-uploads p-6 rounded-3">
                                            <input type="file" name="background_imag[]" id="background_imag" multiple hidden onchange="javascript:updateList()" />
                                            <label class="card-body d-flex flex-column align-items-center" for="background_imag">
                                                <div class="upload-logo my-8">                                                    
                                                    <i data-feather="image"></i>
                                                </div>
                                                <div id="fileList"></div>
                                                <div class="fw-medium text-hide"><span class="text-primary">Browse images</span></div>
                                                <div class="text-muted mt-2 mb-8 text-center">1060px x 1080px recommended. Max 1MB (png, jpg)</div>
                                            </label>
                                        </div>
                                        <ul id="bg_images" class="upload-image-view">
                                            <?php
/*                                            foreach ($__page->community->getClaimImages() as $id => $image){ */?>
                                              <li class="upload-image-item" id="claim-img-<?php /*echo $id; */?>">
                                                  <a class="image-del" href="delete-claim-img?id=<?php /*echo $id; */?>">
                                                      <i data-feather="x"></i>
                                                  </a>
                                                  <img width="220" height="250" src="<?php /*echo app_cdn_path.$image; */?>" class="rounded-3">
                                              </li>
                                            <?php /*} */?>
                                        </ul>
                                    </div>
                                  </div>
                                </div>-->
                            </div>
                            <div class="card-body border-top d-flex justify-content-end gap-3">
                              <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <div class="card shadow mt-12 mb-6">
                        <div class="card-body p-xl-20">
                            <div class="display-5 fw-medium">Gas tank</div>
                            <?php if($__page->community->blockchain == SOLANA){ ?>
                            <div class="text-muted mt-1">Send SOL on Solana Mainnet to run Lighthouse gas-free for your community</div>
                            <?php }else if($__page->community->blockchain == GNOSIS_CHAIN){ ?>
                                <div class="text-muted mt-1">Send Eth on Gnosis Mainnet to run Lighthouse gas-free for your community</div>
                            <?php }else{ ?>
                                <div class="text-muted mt-1">Send Eth on Optimism Mainnet to run Lighthouse gas-free for your community</div>
                            <?php } ?>
                            <div class="mt-23">
                                <label class="form-label mb-4">Send to :</label>
                                <div class="fs-3 fw-semibold"><?php echo $__page->community->token_address; ?></div>
                             </div>
                            <div class="mt-16">
                                <label class="form-label mb-4">Current balance :</label>
                                <div class="fs-3 fw-semibold" id="balance"></div>
                            </div>
                            <a role="button" class="btn btn-primary mt-16" href="#">View Transactions</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once app_root . '/templates/admin-foot.php'; ?>
<script>
    $(document).ready(function() {


        $('#settingsForm').validate({
            rules: {
                dao_name: {
                    required: true
                }
            },
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    type: 'post',
                    dataType: 'json',
                    success: function (data) {
                        if (data.success == true) {
/*                            if(data.tick_change == true) {
                                $('#ticker_imag_link').attr("src", data.ticket_img_url);
                                $('#ticker_imag_name').html('');
                            }
                            if(data.bg_change == true) {
                                $('#bg_images').html(data.bg_img_html);
                                $('#fileList').html('');
                            }*/
                            feather.replace();
                            showMessage('success',10000,'Success! Your changes have been saved.');
                        } else {
                            if(data.element) {
                                $('#' + data.element).addClass('form-control-lg error');
                                $('<label class="error">' + data.msg + '</label>').insertAfter('#' + data.element);
                            }
                            else
                                showMessage('danger', 10000, data.msg);
                        }
                    }
                });
            }
        });

        $(document).on("click", '.image-del', function(event) {
            event.preventDefault();
            var dao_name = $(this);
            $.ajax({
                url: dao_name.attr('href'),
                dataType: 'json',
                success: function(data) {
                    if (data.success == true) {
                        $('#claim-img-'+data.id).remove();
                    }
                }
            });
        });
    });
    getBalance();
    // File upload
    updateTickerImage = function () {
        var input = document.getElementById('ticker_imag');
        if(input.files.item(0)) {
            $('#ticker_imag_name').html('( ' + input.files.item(0).name + ' )');
            $('#ticker_imag_link').attr("src",URL.createObjectURL(input.files.item(0)));
            $('#ticker_imag_link').removeClass('d-none');
            $('#ticker_d_imag_link').addClass('d-none');
        }
    }

    updateList = function() {
        var input = document.getElementById('background_imag');
        var output = document.getElementById('fileList');
        var appBanners = document.getElementsByClassName('text-hide');

        output.innerHTML = '<ul>';
        for (var i = 0; i < input.files.length; ++i) {
            output.innerHTML += '<li>' + input.files.item(i).name + '</li>';
            //appBanners[i].style.display = 'none';
            $('#bg_images').append('<li class="upload-image-item" id="claim-img-'+i+'"><a class="image-del" href="delete-claim-img?id='+i+'"><i data-feather="x"></i></a><img width="220" height="250" src="'+URL.createObjectURL(input.files.item(i))+'" class="rounded-3"></li>');
        }
        feather.replace();
        output.innerHTML += '</ul>';
    }

    function getBalance() {
        $.ajax({
            url: 'gas_tank_balance',
            dataType: 'json',
            type: 'GET',
            success: function (response) {
                if (response.success == true) {
                    $('#balance').html(response.balance);
                }
            }
        });
    }

</script>