<?php require_once('header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Ayarlar</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="<?php echo get_option('site_url') . '/admin'; ?>" class="btn btn-md btn-white t ext-muted">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home mx-2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                                    <span class="d-none d-sm-inline mx-1">Pano</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Sistem Ayarları</strong>
                                        </div>
                                        <div class="card-body">

                                        <?php
                                        if(isset($_POST['system-options'])) {

                                        if(update_system_settings()) { ?>

                                            <div class="alert alert-success dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                <span class="mx-2">Sistem ayarları başarıyla güncellendi.</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <?php } else { ?>
                                            <div class="alert alert-danger dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <span class="mx-2">Sistem ayarları güncellenemedi.</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                        <?php } 
                                        }
                                        ?>

                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="site-name">Site Adı</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="site-name" value="<?php echo get_option('site_name'); ?>" class="form-control" id="site-name">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="site-url">Site URL</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="site-url" value="<?php echo get_option('site_url'); ?>" class="form-control" id="site-url">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="date-format">Gün Formatı</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="date-format" value="<?php echo get_option('date_format'); ?>" class="form-control" id="date-format">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="time-format">Zaman Formatı</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="time-format" value="<?php echo get_option('time_format'); ?>" class="form-control" id="time-format">
                                                        </div>
                                                    </div>
                                                </div>




                                                <button type="submit" name="system-options" class="btn btn-primary float-right">Kaydet</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="padding">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>E-Posta Ayarları</strong>
                                        </div>
                                        <div class="card-body">

                                        <?php 
                                        
                                        if(isset($_POST['email-options'])) {

                                            if(update_email_settings()) { ?>

                                            <div class="alert alert-success dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                <span class="mx-2">Sistem ayarları başarıyla güncellendi.</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <?php } else { ?>
                                            <div class="alert alert-danger dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <span class="mx-2">Sistem ayarları güncellenemedi.</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <?php } 
                                            }
                                            ?>

                                        
                                        
                                        

                                            <form action="" method="POST">
                                                

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-host">E-Posta Sunucusu</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-host" value="<?php echo get_option('mail_host'); ?>" class="form-control" id="email-host">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="smtp-auth">SMTP Doğrulaması</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <label class="ui-switch ui-switch-md info m-t-xs mt-2">
                                                                <input type="checkbox" name="smtp-auth" <?php if(get_option('mail_smtp_auth') == 'true') { echo 'checked="checked"'; } ?>>
                                                                <i></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-username">E-Posta Sunucusu Kullanıcı Adı</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-username" value="<?php echo get_option('mail_username'); ?>" class="form-control" id="email-username">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-password">E-Posta Sunucusu Parolası</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="password" name="email-password" value="<?php echo get_option('mail_password'); ?>" class="form-control" id="email-password">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-smtp-secure">SMTP Güvenlik Protokolü</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <select class="form-control" name="email-smtp-secure" id="email-smtp-secure">
                                                                <option value="SSL">SSL (Port: 465)</option>
                                                                <option value="TLS">TLS (Port: 587)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-port">Port</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-port" value="<?php echo get_option('mail_port'); ?>" class="form-control" id="email-port">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-default-from">Varsayılan Gönderen E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-default-from" value="<?php echo get_option('mail_default_from'); ?>" class="form-control" id="email-default-from">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-default-cc">Varsayılan CC E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-default-cc" value="<?php echo get_option('mail_default_cc'); ?>" class="form-control" id="email-default-cc">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-default-bcc">Varsayılan BCC E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-default-bcc" value="<?php echo get_option('mail_default_bcc'); ?>" class="form-control" id="email-default-bcc">
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-default-reply-to">Varsayılan Cevap E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-default-reply-to" value="<?php echo get_option('mail_default_reply_to'); ?>" class="form-control" id="email-default-reply-to">
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" name="email-options" class="btn btn-primary float-right">Kaydet</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="padding">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Test E-Postası Gönder</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST">

                                            <?php 
                            
                                            if(isset($_POST['send-test-mail'])) {
                                                if(isset($_POST['email-address']) && isset($_POST['subject']) && isset($_POST['email-message'])) {
                                                    send_mail($_POST['email-address'], $_POST['subject'], $_POST['email-message']);
                                                }
                                            }

                                            ?>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-address">Gönderilecek E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="email-address" value="<?php echo user('email'); ?>" class="form-control" id="email-address">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="subject">Konu</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="subject" value="<?php echo get_option('mail_test_subject'); ?>" class="form-control" id="subject">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-message">Mesaj</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <textarea name="email-message" rows="10" class="form-control" id="email-message"><?php echo get_option('mail_test_content'); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button type="submit" name="send-test-mail" class="btn btn-primary float-right">Gönder</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- ############ Main END-->
            </div>
            <!-- ############ Content END-->
            <!-- ############ Footer START-->
            <div id="footer" class="page-footer hide">
                <div class="d-flex p-3">
                    <span class="text-sm text-muted flex">&copy; Copyright. flatfull.com</span>
                    <div class="text-sm text-muted">Version 1.1.1</div>
                </div>
            </div>
            <!-- ############ Footer END-->
        </div>
        <!-- build:js ../assets/js/site.min.js -->
        <!-- jQuery -->
        <script src="<?php echo get_option('site_url'); ?>/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo get_option('site_url'); ?>/libs/popper.js/dist/umd/popper.min.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/libs/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- ajax page -->
        <script src="<?php echo get_option('site_url'); ?>/libs/pjax/pjax.min.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/assets/js/ajax.js"></script>
        <!-- lazyload plugin -->
        <script src="<?php echo get_option('site_url'); ?>/assets/js/lazyload.config.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/assets/js/lazyload.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/assets/js/plugin.js"></script>
        <!-- scrollreveal -->
        <script src="<?php echo get_option('site_url'); ?>/libs/scrollreveal/dist/scrollreveal.min.js"></script>
        <!-- feathericon -->
        <script src="<?php echo get_option('site_url'); ?>/libs/feather-icons/dist/feather.min.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/assets/js/plugins/feathericon.js"></script>
        <!-- theme -->
        <script src="<?php echo get_option('site_url'); ?>/assets/js/theme.js"></script>
        <script src="<?php echo get_option('site_url'); ?>/assets/js/utils.js"></script>
        <!-- endbuild -->
    </body>
</html>