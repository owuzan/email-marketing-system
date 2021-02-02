<?php 

require_once('../connection.php');
require_once('../functions.php');

if(is_login()) {
    header('Location:' . get_option('site_url') . '/admin');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo get_option('site_name'); ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo get_option('site_url'); ?>/assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="<?php echo get_option('site_url'); ?>/assets/vendors/css/vendor.addons.css" />
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?php echo get_option('site_url'); ?>/assets/css/shared/style.css" />
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="<?php echo get_option('site_url'); ?>/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="<?php echo get_option('site_url'); ?>/assets/images/favicon.ico" />
  </head>
  <body>
    <div class="authentication-theme auth-style_1">
      <div class="row">
        <div class="col-12 logo-section">
          <a href="../../index.html" class="logo">
            <img src="<?php echo get_option('site_url'); ?>/assets/images/logo.svg" alt="logo" />
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
          <div class="grid">
            <div class="grid-body">
              <div class="row">
                <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">
                  
                  <?php if(isset($_GET['activation_key']) && isset($_GET['id'])) {

                    $id = $_GET['id'];
                    $key = $_GET['activation_key'];

                    $query = $db -> query("SELECT register_key FROM users WHERE id='$id'");
                    $user = $query ->fetch(PDO::FETCH_ASSOC);


                    if($user['register_key'] == $key) {
                        
                        $update = $db -> prepare("UPDATE users SET register_key=:register_key, active=:active WHERE id=:id");
                        
                        $result = $update -> execute([
                            "register_key" => "",
                            "active" => 1,
                            "id" => $id
                        ]);
                        
                        echo '
                        <h2>Kaydınız tamamlandı.</h2>
                        <p>Giriş sayfasına yönlendiriliyorsunuz...</p>';
                        header("Location:" . get_option('site_url'));
                    } else {
                        echo '
                        <h2>Zaman aşımı</h2>
                        <p>Bu bağlantının süresi dolmuş. Giriş sayfasına yönlendirileceksiniz.</p>';
                        header("Location:" . get_option('site_url'));
                    }
                    
                } else {
                    
                    echo '
                    <h2>Zaman aşımı</h2>
                    <p>Bu bağlantının süresi dolmuş. Giriş sayfasına yönlendirileceksiniz.</p>';
                    header("Location:" . get_option('site_url'));
                      
                  } ?>
                  <div class="signup-link">
                    <a href="<?php echo get_option('site_url'); ?>">Otomatik yönlendirme çalışmıyorsa buraya tıklayın.</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="auth_footer">
        <p class="text-muted text-center">© Label Inc 2019</p>
      </div>
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    <script src="<?php echo get_option('site_url'); ?>/assets/vendors/js/core.js"></script>
    <script src="<?php echo get_option('site_url'); ?>/assets/vendors/js/vendor.addons.js"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <!-- Vendor Js For This Page Ends-->
    <!-- build:js -->
    <script src="<?php echo get_option('site_url'); ?>/assets/js/template.js"></script>
    <!-- endbuild -->
  </body>
</html>