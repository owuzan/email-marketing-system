<?php require_once('../header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Kampanya Gönder</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="<?php echo get_option('site_url') . '/admin'; ?>" class="btn btn-md btn-white">
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
                                            <strong>Kampanya Gönder</strong>
                                        </div>
                                        <div class="card-body">


                                        <?php

                                        global $db;

                                        
                                        if(isset($_POST['send-campaign'])) {
                                            if(isset($_POST['campaign-id']) && isset($_POST['list-id'])) {
                                                $campaign_id = $_POST['campaign-id'];
                                                $list_id = $_POST['list-id'];

                                                $list_emails = $db -> prepare("SELECT * FROM lists WHERE id=:id ORDER BY id DESC");
                                                $list_emails -> execute([
                                                    "id" => $list_id
                                                ]);

                                                $query = $db -> query("SELECT * FROM campaigns WHERE id=$campaign_id");
                                                $campaign = $query -> fetch(PDO::FETCH_ASSOC);

                                                $arr = "";
                                                foreach($list_emails as $email) {
                                                    $arr .= $email['emails'];
                                                    $arr = ltrim($arr, ' ');
                                                    $arr = rtrim($arr, ' ');
                                                    $arr = explode(' ', $arr);
                                                }

                                                $count = 0;
                                                foreach($arr as $id) {
                                                    $query = $db -> query("SELECT email FROM emails WHERE id='$id' LIMIT 1");
                                                    $result = $query -> fetch(PDO::FETCH_ASSOC);

                                                    $arr[$count] = $result['email'];
                                                    $count++;   
                                                }

                                                $count = count($arr);

                                                for ($i=0; $i < $count; $i++) { 

                                                    $to = $arr[$i];
                                                    $subject = 'Test';
                                                    $content = $campaign['campaign_content'];

                                                    echo $to . ' - ';
                                                    
                                                    send_mail($to, $subject, $content);

                                                    echo '<br>';
                                                    
                                                }        
                                            }
                                        }
                                        

                                        $campaigns = $db -> prepare("SELECT * FROM campaigns ORDER BY id DESC");
                                        $campaigns -> execute();

                                        $lists = $db -> prepare("SELECT * FROM lists ORDER BY id DESC");
                                        $lists -> execute();


                                        ?>
                                            <form action="" method="POST">
                                            

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-address">Gönderilecek Kampanya</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <select name="campaign-id" id="campaign-id" class="form-control">
                                                            <?php foreach($campaigns as $row) { ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['campaign_title']; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <label class="text-muted d-block mt-2" for="email-address">Gönderilecek Liste</label>
                                                        </div>
                                                        <div class="col-sm">
                                                            <select name="list-id" id="list-id" class="form-control">
                                                            <?php foreach($lists as $row) { ?>
                                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['list_title']; ?></option>
                                                            <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" name="send-campaign" class="btn btn-primary float-right">Gönder</button>
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