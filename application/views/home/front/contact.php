<section class="w3l-contact-breadcrum">
    <div class="breadcrum-bg py-sm-5 py-4">
        <div class="container py-lg-3">
            <h2>Contact Us</h2>
            <p><a href="index.html">Home</a> &nbsp; / &nbsp; Contact</p>
        </div>
    </div>
</section>
<section class="w3l-contacts-12" id="contact">
    <div class="contact-top pt-5">
        <div class="container py-md-3">
            <?php if ($this->session->flashdata('msg_success')): ?>
                <div class="alert alert-success">
                    <i class="icon-text-ml far fa-check-circle"></i> <?php echo $this->session->flashdata('msg_success'); ?>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('msg_error')): ?>
                <div class="alert alert-danger">
                    <?php echo $this->session->flashdata('msg_error'); ?>
                </div>
            <?php endif; ?>
            <div class="row cont-main-top">

                <!-- contact address -->
                <div class="contact col-lg-4">
                    <div class="cont-subs">
                        <div class="cont-add">

                            <div class="cont-add-rgt">
                                <h4>Address:</h4>
                                <p class="contact-text-sub">House # 40, Road # 07, Sector # 13, Uttara</p>
                            </div>
                            <div class="cont-add-lft">
                                <span aria-hidden="true" class="fa fa-map-marker"></span>
                            </div>
                        </div>
                        <div class="cont-add add-2">

                            <div class="cont-add-rgt">
                                <h4>Email:</h4>
                                <a href="mailto:info@mastermindabacusbd.com">
                                    <p class="contact-text-sub">info@mastermindabacusbd.com</p>
                                </a>
                            </div>
                            <div class="cont-add-lft">
                                <span aria-hidden="true" class="fa fa-envelope"></span>
                            </div>
                        </div>
                        <div class="cont-add">

                            <div class="cont-add-rgt">
                                <h4>Phone:</h4>
                                <a href="tel:+880-1865-598364">
                                    <p class="contact-text-sub">+880-1865-598364</p>
                                </a>
                            </div>
                            <div class="cont-add-lft">
                                <span aria-hidden="true" class="fa fa-phone"></span>
                            </div>
                        </div>
                        <div class="cont-add add-3">

                            <div class="cont-add-rgt">
                                <h4>Find Us On</h4>
                                <div class="main-social-1 mt-2">
                                    <a class="facebook" href="#facebook"><span class="fa fa-facebook"></span></a>
                                    <a class="twitter" href="#twitter"><span class="fa fa-twitter"></span></a>
                                    <a class="instagram" href="#instagram"><span class="fa fa-instagram"></span></a>
                                    <a class="google-plus" href="#google-plus"><span
                                                class="fa fa-google-plus"></span></a>
                                    <a class="linkedin" href="#linkedin"><span class="fa fa-linkedin"></span></a>
                                </div>
                            </div>
                            <div class="cont-add-lft">

                            </div>
                        </div>
                    </div>
                </div>
                <!-- //contact address -->
                <!-- contact form -->
                <div class="contacts12-main col-lg-8 mt-lg-0 mt-5">
                    <?php echo form_open($this->uri->uri_string(), array('class' => 'main-input')); ?>

                    <div class="top-inputs d-grid">
                        <input name="name" id="name" value="<?php echo set_value('name'); ?>" placeholder="Name"
                               required="" type="text">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email"
                               value="<?php echo set_value('email'); ?>">
                    </div>
                    <input type="text" class="form-control" name="phoneno" p id="phoneno"
                           value="<?php echo set_value('phoneno'); ?>" placeholder="Phone Number">
                    <br>
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                           value="<?php echo set_value('subject'); ?>">
                    <textarea id="w3lMessage" name="message"  placeholder="Message" required=""><?php echo set_value('message'); ?></textarea>
                    <?php if ($cms_setting['captcha_status'] == 'enable'): ?>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <?php echo $recaptcha['widget']; echo $recaptcha['script']; ?>
                                <span class="text-danger"><?php echo form_error('g-recaptcha-response'); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="text-right">
                        <button class="btn btn-theme2" type="submit">Submit Now</button>
                    </div>
                    </form>
                </div>
                <!-- //contact form -->
            </div>
        </div>
        <!-- map -->
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14594.119465413867!2d90.3879868!3d23.8708226!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xac45ad92561cfc45!2sMastermind%20Abacus!5e0!3m2!1sen!2sbd!4v1606757617340!5m2!1sen!2sbd"
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
        </div>
        <!-- //map -->
    </div>
</section>
</section>