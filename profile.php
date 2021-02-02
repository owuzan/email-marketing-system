<?php require_once('header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Profil</h2>
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
                            <?php
                                global $db;

                                if(isset($_FILES['profile-img-src'])) {
                                    
                                    $maxSize = 1024*1024;
                                    $uzanti  = substr($_FILES["profile-img-src"]["name"],-4,4);
                                    $name       = uniqid().$uzanti;
                                    $src      = "images/".$name;

                                    
                                    if($_FILES['profile-img-src']['size'] > $maxSize) {

                                    } else {

                                        $img = $_FILES['profile-img-src']['type'];

                                        if($img == "image/jpeg" || $img == "image/png"){

                                            if(is_uploaded_file($_FILES['profile-img-src']['tmp_name'])) {
                                                
                                                $tasi = move_uploaded_file($_FILES["profile-img-src"]["tmp_name"],  $src);
				 
                                                $kayit = $db->prepare("UPDATE users SET img_src=? WHERE id=?");
                                                
                                                // $resimTuru = $_FILES["profile-img-src"]["type"];
                                                $resimSize = $_FILES["profile-img-src"]["size"];
                                                $id = user('id');
                                                
                                                $kayit->execute(array($src,$id));
                                            }
                                        }
                                    }
                                }

                                ?>
                                <div class="col-sm-4 mb-5">
                                    <div class="profile-img text-center">
                                        <img src="<?php echo get_option('site_url') . '/' . user('img_src'); ?>" class="circle">
                                    </div>
                                </div>
                                <div class="col-sm-8 mb-5">
                                    <div class="img-info">
                                        <h4><?php echo user('name') . ' ' . user('surname') ;?></h4>
                                        <div class="file-upload">
                                            <form action="" enctype="multipart/form-data" method="POST">
                                                <span class="mr-2">Yeni profil resmi yükle:</span>
                                                <input type="file" name="profile-img-src" id="choose-file">
                                                <input type="submit" name="update-img" value="Yükle" class="btn btn-light my-2 btn-block">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">

                                
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Profil Ayarları</strong>
                                        </div>
                                        <div class="card-body">

                                        <?php
                                        if(isset($_POST['update-profile'])) {

                                            if(update_profile() == true) { ?>

                                            <div class="alert alert-success dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                <span class="mx-2">Hesap ayarları başarıyla güncellendi.</span>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <?php } else { ?>
                                            <div class="alert alert-danger dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                <span class="mx-2">Hesap ayarları güncellenemedi.</span>
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
                                                            <label class="text-muted d-block mt-2" for="profile-username">Kullanıcı adı</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" readonly="readonly" disabled="disabled" name="profile-username" value="<?php echo user('username') ?>" class="form-control" id="profile-username">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="profile-name">Ad</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="profile-name" value="<?php echo user('name') ?>" class="form-control" id="profile-name">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="profile-surname">E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="text" name="profile-surname" value="<?php echo user('surname'); ?>" class="form-control" id="profile-surname">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="profile-email">E-Posta Adresi</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="email" name="profile-email" value="<?php echo user('email'); ?>" class="form-control" id="profile-email">
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update-profile" class="btn btn-primary float-right">Kaydet</button>

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
                                            <strong>Parola Ayarları</strong>
                                        </div>
                                        <div class="card-body">

                                            <?php
                                            if(isset($_POST['update-password'])) {

                                                if(update_password() == true) { ?>

                                                    <div class="alert alert-success dismissible fade show" role="alert">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                        <span class="mx-2">Parolanız başarıyla güncellendi.</span>
                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                <?php } else { ?>
                                                    <div class="alert alert-danger dismissible fade show" role="alert">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        <span class="mx-2">Parolanız güncellenemedi.</span>
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
                                                            <label class="text-muted d-block mt-2" for="current-password">Mevcut Parolanız</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="password" name="current-password" class="form-control" id="current-password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="new-password">Yeni Parola</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="password" name="new-password" class="form-control" id="new-password">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="new-password-again">Tekrar Yeni Parola</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <input type="password" name="new-password-again" class="form-control" id="new-password-again">
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="update-password" class="btn btn-danger float-right">Parolayı Değiştir</button>

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