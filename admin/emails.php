<?php require_once('../header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">E-Posta Adresleri</h2>
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
                            <div class="table-responsive">

                            <?php 
                            
                            global $db;
                            $query = $db -> query("SELECT * FROM emails");
                            $query -> execute();

                            ?>
                                <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable">
                                    <thead>
                                        <tr>
                                            <th><span class="text-muted">Ad</span></th>
                                            <th><span class="text-muted">Soyad</span></th>
                                            <th><span class="text-muted">E-Posta</span></th>
                                            <th><span class="text-muted">Telefon</span></th>
                                            <th><span class="text-muted">Cinsiyet</span></th>
                                            <th><span class="text-muted">Kayıt Tarihi</span></th>
                                            <th><span class="text-muted">İşlem</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    

                                    <?php foreach($query as $row) { ?>
                                        <tr data-id="<?php echo $row['id']; ?>">
                                            <td>
                                                <span class="text-color"><?php echo $row['name']; ?></span>
                                            </td>
                                            <td>
                                                <span class="text-color"><?php echo $row['surname']; ?></span>
                                            </td>
                                            <td class="flex">
                                                <span href="#" class="item-title text-color"><?php echo $row['email']; ?></span>
                                                <!-- <div class="item-except text-muted text-sm h-1x">
                                                    Alibaba made a smart screen to help blind people shop and it costs next to nothing
                                                </div> -->
                                            </td>
                                            <td>
                                                <span class="item-amount d-none d-sm-block text-sm "><?php echo $row['phone']; ?></span>
                                            </td>
                                            <td>
                                                <span class="item-amount d-none d-sm-block text-sm [object Object]"><?php if($row['gender'] == 0 ) { echo 'Bilinmiyor'; } else if($row['gender'] == 1 ) { echo 'Erkek'; } else { echo 'Kadın'; } ?></span>
                                            </td>
                                            <td>
                                                <span class="item-amount d-none d-sm-block text-sm [object Object]"><?php echo $row['register_time']; ?></span>
                                            </td>
                                            <td>
                                                <div class="item-action dropdown">
                                                    <a href="#" data-toggle="dropdown" class="text-muted">
                                                        <i data-feather="more-vertical"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                        <a href="<?php echo get_option('site_url') . '/edit/email/?id=' . $row['id']; ?>" class="dropdown-item edit">
                                                            Düzenle
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a href="<?php echo get_option('site_url') . '/edit/email/?id=' . $row['id'] . '&delete=yes' ; ?>" class="dropdown-item bg-danger">
                                                            Sil
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
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