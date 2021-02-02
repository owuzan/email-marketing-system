<?php require_once('../header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">E-Posta Düzenle</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="<?php echo get_option('site_url') . '/add/email'; ?>" class="btn btn-md btn-white t ext-muted">
                                    <span class="d-none d-sm-inline mx-1">Yeni E-Posta</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mx-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">
                                <div class="col-12">


                                

                                <?php if(isset($_POST['save-email'])) {
                                    if(edit_email() == true) { ?>

                                    <div class="alert alert-success dismissible fade show" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                        <span class="mx-2">E-Posta adresi başarıyla güncellendi.</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <?php } else { ?>
                                    <div class="alert alert-danger dismissible fade show" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        <span class="mx-2">E-Posta adresi güncellenemedi.</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Kapat">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                <?php } }?>

                                <?php


                                if(isset($_GET['id']) && isset($_GET['delete'])) {

                                    global $db;
                                    
                                    $id = $_GET['id'];
                                    
                                    if($_GET['delete'] == 'yes') {

                                        $query = $db->prepare("DELETE FROM emails WHERE id=:id");
                                    
                                        $delete = $query->execute(array(
                                            'id' => $id
                                        ));

                                        header('Location:' . get_option('site_url') . '/admin/emails');
                                        exit;
                                    }
                                } 
                                
                                if(isset($_GET['id'])) {
                                    global $db;

                                    $id = $_GET['id'];

                                    $query = $db -> query("SELECT * FROM emails WHERE id='$id'");
                                    $result = $query -> fetch(PDO::FETCH_ASSOC);

                                    $name = $result['name'];
                                    $surname = $result['surname'];
                                    $email = $result['email'];
                                    $phone = $result['phone'];
                                    $gender = $result['gender'];
                                    $emails_sent = $result['emails_sent'];

                                }
                                
                                ?>


                                    <div class="card">
                                        <div class="card-header">
                                            <strong>E-Posta Düzenle</strong>
                                        </div>
                                        <div class="card-body">
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <label class="text-muted" for="name">Ad</label>
                                                    <input type="text" name="name" <?php if(isset($_GET['id'])) { echo 'value="' . $name . '"';} ?> autofocus="autofocus" onfocus="this.select()" class="form-control" id="name">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted" for="surname">Soyad</label>
                                                    <input type="text" name="surname" <?php if(isset($_GET['id'])) { echo 'value="' . $surname . '"';} ?> class="form-control" id="surname">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted" for="email">E-Posta Adresi</label>
                                                    <input type="email" name="email" <?php if(isset($_GET['id'])) { echo 'value="' . $email . '"';} ?> required="required" class="form-control" id="email">
                                                </div>
                                                <div class="form-group">
                                                    <label class="text-muted" for="phone">Telefon Numarası</label>
                                                    <input type="tel" name="phone" <?php if(isset($_GET['id'])) { echo 'value="' . $phone . '"';} ?> class="form-control" id="phone" placeholder="5XXXXXXXXX">
                                                </div>

                                                
                                                <div class="form-group">
                                                    <label class="text-muted" for="gender">Cinsiyet</label>
                                                    <select class="form-control" name="gender" id="gender">
                                                        <option value="0" <?php if(isset($_GET['id'])) { if($gender == 0 ) { echo 'selected="selected"'; } } ?>>Bilinmiyor</option>
                                                        <option value="1" <?php if(isset($_GET['id'])) { if($gender == 1 ) { echo 'selected="selected"'; } } ?>>Erkek</option>
                                                        <option value="2" <?php if(isset($_GET['id'])) { if($gender == 2 ) { echo 'selected="selected"'; } } ?>>Kadın</option>
                                                    </select>
                                                </div>
                                                <input type="hidden" name="id" value="<?php if(isset($_GET['id'])) { echo $_GET['id']; } ?>">
                                                <button type="submit" name="save-email" class="btn btn-primary float-right">Kaydet</button>
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