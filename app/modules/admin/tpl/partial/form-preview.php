<?php use lighthouse\Form; ?>
<div class="card-body mb-auto">
    <div class="display-5 fw-medium"><?php echo $form_title; ?></div>
    <div class="text-muted mt-1"><?php echo $form_description; ?></div>
    <div class="col-xl-12">
        <label class="form-label mt-10">Which wallet do you want to contribute to?</label>
        <input type="text" name="wallet_address" id="wallet_address" class="form-control form-control-lg">
        <?php
        foreach ($questions as $index => $ele){
            $label_name = strtolower(preg_replace("/\s+/", "_", $ele['e_label']));
            $ele['e_name'] = $label_name;
            $ele['e_id']   = $label_name;
            ?>
            <label class="form-label mt-10"><?php echo $ele['e_label']; ?></label>
            <?php
            switch ($ele['e_type']) {
                case Form::QT_SHORT_ANSWER:
                    ?>
                    <input type="text" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_description']; ?>" class="form-control form-control-lg">
                    <?php
                    break;
                case Form::QT_PARAGRAPH:
                    ?>
                    <textarea class="form-control form-control-lg fs-3" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" rows="2" placeholder="<?php echo $ele['e_placeholder']; ?>"></textarea>
                    <?php
                    break;
                case Form::QT_MULTIPLE_CHOICE:
                    $choices = json_decode($ele['e_description']);
                    foreach ($choices as $index => $choice){ ?>
                        <br><input type="radio" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" value="<?php echo $choice; ?>"> <label for="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></label><br>
                        <?php
                    }
                    break;
                case Form::QT_CHECKBOXES:
                    $choices = json_decode($ele['e_description']);
                    foreach ($choices as $index => $choice){ ?>
                        <br><input type="checkbox" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" value="<?php echo $choice; ?>"> <label for="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></label><br>
                        <?php
                    }
                    break;
                case Form::QT_DROPDOWN:
                    $list = json_decode($ele['e_description']);
                    ?>
                    <select class="form-control form-control-lg fs-3" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>">
                        <?php foreach ($choices as $index => $choice){ ?>
                            <option value="<?php echo $choice; ?>"><?php echo ucfirst(strtolower($choice)); ?></option>
                        <?php } ?>
                    </select>
                    <?php
                    break;
                case Form::QT_TAGS:
                    ?>
                    <select style="width: width: 100px !important;" class="form-control form-control-lg tags" multiple="multiple" name="<?php echo $ele['e_name']; ?>" id="<?php echo $ele['e_id']; ?>" placeholder="<?php echo $ele['e_description']; ?>"></select>
                    <?php
                    break;
            }
        }
        ?>
    </div>
</div>
<div class="border-top d-flex justify-content-end gap-3 py-6 px-18">
    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
    <button type="submit" id="btn_submit" class="btn btn-primary">Submit</button>
</div>
<script>

    $(document).ready(function() {
        selectedAccount = sessionStorage.getItem("lh_sel_wallet_add");
        if (selectedAccount) {
            $("#wallet_address").val(selectedAccount);
        }

        $(".tags").select2({
            tags: true,
            tokenSeparators: [',']
        });
    });
</script>
