<!-- Main Banner Starts -->

<!-- Main Banner Ends -->
<!-- Breadcrumb Starts -->
<div class="breadcrumb">
    <div class="container px-md-0">
        <ul class="list-unstyled list-inline">
            <li class="list-inline-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
            <li class="list-inline-item active"><?php echo $page_data['page_title']; ?></li>
        </ul>
    </div>
</div>
<!-- Breadcrumb Ends -->
<!-- Main Container Starts -->
<div class="container px-md-0 main-container">
    <h3 class="main-heading2 mt-0"><?php echo $page_data['title']; ?></h3>
    <?php echo $page_data['description']; ?>
    <div class="box2 form-box">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success"><i class="icon-text-ml far fa-check-circle"></i>' . $this->session->flashdata('success') . '</div>';
        }
        ?>
        <div class="tabs-panel tabs-product">

                <div class="tab-pane fade show active" id="new-patient" role="tabpanel"
                     aria-labelledby="tab-new-patient">
                    <?php echo form_open($this->uri->uri_string(), array('class' => 'form-horizontal frm-submit-data')); ?>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label><?= translate('school_name') ?> <span class="required">*</span></label>
                                <input type="text" class="form-control" name="schoolname"
                                       value="<?php echo get_type_name_by_id('branch', $branchID, 'school_name'); ?>"
                                       readonly/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><?= translate('class') ?> <span
                                            class="required">*</span></label>
                                <?php
                                $arrayClass = $this->app_lib->getClass($branchID);
                                echo form_dropdown("class_id", $arrayClass, set_value('class_id'), "class='form-control' data-plugin-selectTwo onchange='getSectionByClass(this.value)'");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><?= translate('section') ?> <span class="required">*</span></label>
                                <?php
                                $arraySection = $this->app_lib->getSections(set_value('class_id'), false);
                                echo form_dropdown("section_id", $arraySection, set_value('section_id'), "class='form-control' data-plugin-selectTwo id='section_id' ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-sm">
                            <div class="form-group">
                                <label class="control-label"> <?= translate('first_name') ?> <span
                                            class="required">*</span></label>
                                <input type="text" class="form-control" name="first_name"
                                       value="<?= set_value('first_name') ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-sm">
                            <div class="form-group">
                                <label class="control-label"> <?= translate('last_name') ?> <span
                                            class="required">*</span></label>
                                <input type="text" class="form-control" name="last_name"
                                       value="<?= set_value('last_name') ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-sm">
                            <div class="form-group">
                                <label class="control-label"> <?= translate('gender') ?> <span class="required">*</span></label>
                                <?php
                                $arrayGender = array(
                                    '' => translate('select'),
                                    'male' => translate('male'),
                                    'female' => translate('female')
                                );
                                echo form_dropdown("gender", $arrayGender, set_value('gender'), "class='form-control' data-plugin-selectTwo ");
                                ?>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="birthday"><?= translate('birthday') ?> <span
                                            class="required">*</span></label>
                                <input type="text" class="form-control" data-plugin-datepicker name="birthday" readonly
                                       value="<?php echo set_value('birthday'); ?>" id="birthday" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mobile_no"><?= translate('mobile_no') ?> <span
                                            class="required">*</span></label>
                                <input type="text" name="mobile_no" class="form-control"
                                       value="<?php echo set_value('mobile_no'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email"><?= translate('email') ?></label>
                                <input type="text" name="email" class="form-control"
                                       value="<?php echo set_value('email'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?= translate('address') ?> <span class="required">*</span></label>
                                <textarea class="form-control" id="address" name="address" rows="2"
                                          placeholder="Enter Address"><?php echo set_value('address'); ?></textarea>
                                <span class="error"><?= form_error('class_id') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?= translate('guardian_name') ?> <span
                                            class="required">*</span></label>
                                <input type="text" class="form-control" name="guardian_name"
                                       value="<?php echo set_value('guardian_name'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?= translate('relation') ?> <span
                                            class="required">*</span></label>
                                <input type="text" name="guardian_relation" class="form-control"
                                       value="<?php echo set_value('guardian_relation'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="father_name"><?= translate('father_name') ?></label>
                                <input type="text" name="father_name" class="form-control"
                                       value="<?php echo set_value('father_name'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mother_name"><?= translate('mother_name') ?></label>
                                <input type="text" name="mother_name" class="form-control"
                                       value="<?php echo set_value('mother_name'); ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><?= translate('occupation') ?> <span
                                            class="required">*</span></label>
                                <input type="text" class="form-control" name="grd_occupation"
                                       value="<?= set_value('grd_occupation') ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><?= translate('income') ?></label>
                                <input class="form-control" name="grd_income" value="<?= set_value('grd_income') ?>"
                                       type="text" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label"><?= translate('education') ?></label>
                                <input type="text" class="form-control" name="grd_education"
                                       value="<?= set_value('grd_education') ?>" autocomplete="off"/>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?= translate('guardian') . " " . translate('email') ?></label>
                                <input type="text" class="form-control" name="grd_email"
                                       value="<?= set_value('grd_email') ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label"><?= translate('guardian') . " " . translate('mobile_no') ?>
                                    <span class="required">*</span></label>
                                <input type="text" class="form-control" name="grd_mobile_no"
                                       value="<?= set_value('grd_mobile_no') ?>" autocomplete="off"/>
                                <span class="error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message"><?= translate('guardian') . " " . translate('address') ?> <span
                                    class="required">*</span></label>
                        <textarea class="form-control" id="grd_address" name="grd_address"
                                  placeholder="Enter Address"><?php echo set_value('grd_address'); ?></textarea>
                        <span class="error"></span>
                    </div>
                    <!--custom fields details-->
                    <div class="row" id="customFields">
                        <?php echo render_custom_Fields('online_admission', $branchID); ?>
                    </div>

                    <?php if ($cms_setting['captcha_status'] == 'enable'): ?>
                        <div class="form-group">
                            <?php echo $recaptcha['widget'];
                            echo $recaptcha['script']; ?>
                            <span class="error"></span>
                        </div>
                    <?php endif; ?>

                    <button type="submit" class="btn btn-1 btn-primary" style="margin-bottom: 20px"
                            data-loading-text="<i class='fa fa-refresh'></i> Processing"><i
                                class="fa fa-save"></i> <?= translate('submit') ?></button>
                    <?php echo form_close(); ?>
                </div>
            </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">

    $("form.frm-submit-datafrm-submit-data").on('submit', function (e) {
        e.preventDefault();
        var $this = $(this);
        var btn = $this.find('[type="submit"]');
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false,
            beforeSend: function () {
                btn.button('loading');
            },
            success: function (data) {
                $('.error').html("");
                if (data.status == "fail") {
                    $.each(data.error, function (index, value) {
                        $this.find("[name='" + index + "']").parents('.form-group').find('.error').html(value);
                    });
                    btn.button('reset');
                } else {
                    location.reload(true);
                }
            },
            error: function () {
                btn.button('reset');
            }
        });
    });
</script>