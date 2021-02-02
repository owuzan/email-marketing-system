<?php require_once('../header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Notlarım</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                            <div>
                                <a href="<?php echo get_option('site_url') . '/add/note'; ?>" class="btn btn-md btn-white t ext-muted">
                                    <span class="d-none d-sm-inline mx-1">Yeni Not</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus mx-2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">


                            <?php 
                            
                            global $db;

                            if(isset($_POST['delete-note'])) {
                                
                                $id = note_control();
                                
                                if($id) {
    
                                    $query = $db->prepare("DELETE FROM notes WHERE id=:id");
                                    
                                    $delete = $query->execute(array(
                                        'id' => $id
                                    ));
    
                                }

                            }
                            
                              
                            $user_id = user('id');
                            
                            $query = $db -> prepare("SELECT * FROM notes WHERE user_id=$user_id ORDER BY id DESC");
                            
                            $query -> execute();

                            foreach($query as $row) { ?>
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $row['note_title']; ?></h5>
                                            <p class="card-text"><?php echo $row['note_content']; ?></p>

                                            <form action="<?php echo get_option('site_url') . '/edit/note'; ?>" method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="submit" name="edit-note" class="btn btn-sm btn-primary">Düzenle</button>
                                            </form>

                                            <form action="" method="POST" class="d-inline">
                                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete-note-modal-<?php echo $row['id']; ?>">Sil</button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="delete-note-modal-<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="delete-note-title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="delete-note-title">Notu sil</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>"<b><?php echo $row['note_title']; ?></b>" başlıklı notu silmek istediğinize emin misiniz?</p>                                                                
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="submit" name="delete-note" class="btn btn-sm btn-danger" value="Evet, sil">
                                                                <button type="button" class="btn btn-sm btn-light" data-dismiss="modal">Kapat</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <small class="text-muted float-right mt-1"><?php echo date(get_option('date_format') . ' - ' . get_option('time_format'), strtotime($row['note_date'])); ?></small>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

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