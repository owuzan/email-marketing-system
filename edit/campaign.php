<?php require_once('../header.php'); 

?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Kampanya Ekle</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="<?php echo get_option('site_url') . '/add/campaign'; ?>" class="btn btn-md btn-white t ext-muted">
                                    <span class="d-none d-sm-inline mx-1">Yeni Kampanya</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mx-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">

                        <?php if(isset($_POST['edit-campaign'])) {
                            
                            global $db;

                            $id = $_POST['id'];

                            $query = $db -> query("SELECT * FROM campaigns WHERE id=$id");
                            $result = $query ->fetch(PDO::FETCH_ASSOC);

                        } else if(isset($_POST['save-template'])) {

                            
                            try {
                                
                                global $db;
                                
                                $id = $_POST['id'];
                                $campaign_title = $_POST['campaign-name'];
                                $campaign_description = $_POST['campaign-description'];
                                $campaign_content = $_POST['campaign-template'];
    
                                $update = $db -> prepare("UPDATE campaigns SET campaign_title=:title, campaign_description=:description, campaign_content=:content WHERE id=:id");
                                $update -> execute([
                                    "title" => $campaign_title,
                                    "description" => $campaign_description,
                                    "content" => $campaign_content,
                                    "id" => $id
                                    ]);
                                    
                                    header('Location:' . get_option('site_url') . '/admin/campaigns');
                                    exit;
                                    
                            } catch(PDOException $e) {
                                echo $e-getMessage();
                            }

                        } else {
                            
                            header('Location:' . get_option('site_url') . '/admin/campaigns');
                            exit;

                        } ?>

                            <div class="card">
                                <div class="card-header">
                                    <strong>Kampanyayı Düzenle</strong>
                                </div>
                                <div class="card-body">
                                    <form id="form" method="POST" action="" data-plugin="parsley" data-option="{}">
                                        <div id="rootwizard" data-plugin="bootstrapWizard" data-option="{
                                            tabClass: '',
                                            nextSelector: '.button-next',
                                            previousSelector: '.button-previous',
                                            firstSelector: '.button-first',
                                            lastSelector: '.button-last',
                                            onTabClick: function(tab, navigation, index) {
                                                return false;
                                            },
                                            onNext: function(tab, navigation, index) {
                                                var instance = $('#form').parsley();
                                                instance.validate();
                                                if(!instance.isValid()) {
                                                    return false;
                                                }
                                            }
                                        }">
                                            <ul class="nav mb-3">
                                                <li class="nav-item">
                                                    <a class="nav-link text-center" href="#tab1" data-toggle="tab">
                                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">1</span>
                                                        <div class="mt-2">
                                                            <div class="text-muted">Kampanya Bilgileri</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-center" href="#tab2" data-toggle="tab">
                                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">2</span>
                                                        <div class="mt-2">
                                                            <div class="text-muted">Kampanya Şablonu</div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link text-center" href="#tab3" data-toggle="tab">
                                                        <span class="w-32 d-inline-flex align-items-center justify-content-center circle bg-light active-bg-success">3</span>
                                                        <div class="mt-2">
                                                            <div class="text-muted">Hazır</div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content p-3">

                                                
                                                <div class="tab-pane active" id="tab1">
                                                    <div class="form-group">
                                                        <label>Kampanya adı</label>
                                                        <input type="text" id="campaign-name" name="campaign-name" value="<?php echo $result['campaign_title']; ?>" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kampanya açıklaması</label>
                                                        <textarea class="form-control" id="campaign-description" name="campaign-description" rows="5" required=""><?php echo $result['campaign_description']; ?></textarea>
                                                    </div>
                                                </div>



                                                <div class="tab-pane" id="tab2">
                                                    <div class="form-row">
                                                        <textarea name="campaign-template" id="campaign-template"><?php echo $result['campaign_content']; ?></textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary hide">Submit</button>
                                                </div>


                                                <div class="tab-pane" id="tab3">
                                                    <div class="form-group">
                                                        <p>
                                                            <strong>Değişikliğin son adımı...</strong>
                                                        </p>
                                                        <p>Gerekli değişiklikleri yaptıktan sonra kaydetmek için aşağıdaki butona tıklayın.</p>
                                                        <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                                                        <button type="submit" name="save-template" class="btn btn-success btn-sm">Şablonu güncelle</button>
                                                    </div>
                                                </div>
                                                <div class="row py-3">
                                                    <div class="col-6">
                                                        <!-- <a href="#" class="btn btn-white button-next">
                                                            <i data-feather="chevron-left"></i>
                                                        </a> -->
                                                        <a href="#" class="btn btn-white button-previous">
                                                            <i data-feather="arrow-left"></i>
                                                        </a>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="#" class="btn btn-white button-next">
                                                                <i data-feather="arrow-right"></i>
                                                            </a>
                                                            <!-- <a href="#" class="btn btn-white button-last">
                                                                <i data-feather="chevron-right"></i>
                                                            </a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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