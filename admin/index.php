<?php require_once('../header.php'); ?>
            <!-- ############ Content START-->
            <div id="content" class="flex ">
                <!-- ############ Main START-->
                <div>
                    <div class="page-hero page-container " id="page-hero">
                        <div class="padding d-flex">
                            <div class="page-title">
                                <h2 class="text-md text-highlight">Pano</h2>
                                <small class="text-muted">Hoşgeldin, <strong><?php echo user('name') . ' ' . user('surname'); ?>.</strong></small>
                            </div>
                            <div class="flex"></div>
                        </div>
                    </div>
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row row-sm sr">
                                <div class="col-md-12 col-lg-8">
                                    <div class="row row-sm">
                                        <div class="col-md-8">
                                            <div class="row row-sm">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row row-sm">
                                                                <div class="col-4">
                                                                    <small class="text-muted">Your status</small>
                                                                    <div class="mt-2 font-weight-500"><span class="text-info">Pro</span> user</div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Your balance</small>
                                                                    <div class="text-highlight mt-2 font-weight-500">$3,500</div>
                                                                </div>
                                                                <div class="col-4">
                                                                    <small class="text-muted">Next payment</small>
                                                                    <div class="mt-2 font-weight-500">15 Nov</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row row-sm">
                                                <div class="col-6 d-flex">
                                                    <div class="card flex">
                                                        <div class="card-body">
                                                            <small>Profile complete:
                                                                <strong class="text-primary">65%</strong>
                                                            </small>
                                                            <div class="progress my-3 circle" style="height:6px;">
                                                                <div class="progress-bar circle gd-primary" data-toggle="tooltip" title="65%" style="width: 65%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6 d-flex">
                                                    <div class="card flex">
                                                        <div class="card-body">
                                                            <small>Payment process:
                                                                <strong class="text-primary">25%</strong>
                                                            </small>
                                                            <div class="progress my-3 circle" style="height:6px;">
                                                                <div class="progress-bar circle gd-warning" data-toggle="tooltip" title="25%" style="width: 25%"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex">
                                            <div class="card flex">
                                                <div class="card-body text-center">
                                                    <small class="text-muted">Total Sale &amp; Referral</small>
                                                    <div class="pt-3">
                                                        <div style="height: 120px" class="pos-rlt">
                                                            <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                                <div>
                                                                    <div class="text-highlight text-md">
                                                                        <span data-plugin="countTo" data-option="{
													from: 100,
												    to: 39500,
												    refreshInterval: 15,
												    speed: 1000,
												    formatter: function (value, options) {
												      return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
												    }
												    }"></span>
                                                                    </div>
                                                                    <small class="text-muted">usd</small>
                                                                </div>
                                                            </div>
                                                            <canvas data-plugin="chartjs" id="chart-pie-1"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-md-flex">
                                                        <div class="flex">
                                                            <div class="text-highlight">30%</div>
                                                            <small class="h-1x">Conversion</small>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted">+ 3.5%</small>
                                                        </div>
                                                    </div>
                                                    <div class="w-50" style="height: 30px;">
                                                        <canvas data-plugin="chartjs" id="chart-line-1">
                                                        </canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-md-flex">
                                                        <div class="flex">
                                                            <div class="text-highlight">25%</div>
                                                            <small class="h-1x">Search engine</small>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted">- 2.0%</small>
                                                        </div>
                                                    </div>
                                                    <div class="w-50" style="height: 30px;">
                                                        <canvas data-plugin="chartjs" id="chart-line-2">
                                                        </canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-md-flex">
                                                        <div class="flex">
                                                            <div class="text-highlight">45%</div>
                                                            <small class="h-1x">Directly</small>
                                                        </div>
                                                        <div>
                                                            <small class="text-muted">+ 4.5%</small>
                                                        </div>
                                                    </div>
                                                    <div class="w-50" style="height: 30px;">
                                                        <canvas data-plugin="chartjs" id="chart-line-3">
                                                        </canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-lg-4 d-flex">
                                    <div class="card flex">
                                        <div class="card-body">
                                            <div class="px-4">
                                                <div id="jqvmap-world" data-plugin="vectorMap" style="height: 200px" class="d-flex align-items-center justify-content-center">
                                                    <div class="loading"></div>
                                                </div>
                                                <div class="text-center mb-3">
                                                    <small class="text-muted">Your top countries</small>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col">
                                                        <span class="text-primary">USA</span>
                                                        <div class="text-muted text-sm">$1,250</div>
                                                    </div>
                                                    <div class="col">
                                                        UK
                                                        <div class="text-muted text-sm">$650</div>
                                                    </div>
                                                    <div class="col">
                                                        India
                                                        <div class="text-muted text-sm">$200</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex">
                                    <div class="card flex">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center text-hover-success">
                                                <div class="avatar w-56 m-2 no-shadow gd-success">
                                                    <i data-feather="trending-up"></i>
                                                </div>
                                                <div class="px-4 flex">
                                                    <div>Weekly top sell</div>
                                                    <div class="text-success mt-2">
                                                        + 2.50%
                                                    </div>
                                                </div>
                                                <a href="#" class="text-muted">
                                                    <i data-feather="arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 d-flex">
                                    <div class="card flex">
                                        <div class="card-body">
                                            <div class="row row-sm">
                                                <div class="col-sm-6">
                                                    <div class="mb-2">
                                                        <small class="text-muted">Task statistics</small>
                                                    </div>
                                                    <div class="row row-sm">
                                                        <div class="col-4">
                                                            <div class="text-highlight text-md">52</div>
                                                            <small>Tasks</small>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="text-danger text-md">+15</div>
                                                            <small>Added</small>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="text-md">45.5%</div>
                                                            <small>Remain</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <div class="mb-2 mt-2 mt-sm-0">
                                                        <small class="text-muted">This week</small>
                                                    </div>
                                                    <div>Task completion</div>
                                                    <div class="progress no-bg mt-2 align-items-center circle" style="height:6px;">
                                                        <div class="progress-bar circle gd-danger" style="width: 65%"></div>
                                                        <span class="mx-2">65%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row row-sm">
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="pos-rlt" style="height: 78px">
                                                        <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                            <small>35%</small>
                                                        </div>
                                                        <canvas data-plugin="chartjs" id="chart-pie-2"></canvas>
                                                    </div>
                                                    <div class="px-3 pt-3 text-center">
                                                        <small>Weekly</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="pos-rlt" style="height: 78px">
                                                        <div class="pos-abt w-100 h-100 d-flex align-items-center justify-content-center">
                                                            <small>25%</small>
                                                        </div>
                                                        <canvas data-plugin="chartjs" id="chart-pie-3"></canvas>
                                                    </div>
                                                    <div class="px-3 pt-3 text-center">
                                                        <small>Monthly</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="card pb-3">
                                                <div class="p-3-4">
                                                    <div class="d-flex">
                                                        <div>
                                                            <div>Upcoming tasks</div>
                                                            <small class="text-muted">Active: 9</small>
                                                        </div>
                                                        <span class="flex"></span>
                                                        <div>
                                                            <div class="btn-group-toggle" data-toggle="buttons">
                                                                <label class="btn">
                                                                    <input type="radio" name="options"> 1h
                                                                </label>
                                                                <label class="btn active">
                                                                    <input type="radio" name="options"> 1d
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="list list-row">
                                                    <div class="list-item " data-id="3">
                                                        <div>
                                                            <label class="ui-check m-0 ui-check-rounded ui-check-md">
                                                                <input type="checkbox" name="id" value="3">
                                                                <i></i>
                                                            </label>
                                                        </div>
                                                        <div class="flex">
                                                            <a href="#" class="item-title text-color h-1x">Html5 dashboard conference</a>
                                                            <div class="item-except text-muted text-sm h-1x">
                                                                Less than a month till we head over to the UK & Ireland with @NextUI
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="item-action dropdown">
                                                                <a href="#" data-toggle="dropdown" class="text-muted">
                                                                    <i data-feather="more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                    <a class="dropdown-item" href="#">
                                                                        See detail
                                                                    </a>
                                                                    <a class="dropdown-item download">
                                                                        Download
                                                                    </a>
                                                                    <a class="dropdown-item edit">
                                                                        Edit
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item trash">
                                                                        Delete item
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-item " data-id="6">
                                                        <div>
                                                            <label class="ui-check m-0 ui-check-rounded ui-check-md">
                                                                <input type="checkbox" name="id" value="6">
                                                                <i></i>
                                                            </label>
                                                        </div>
                                                        <div class="flex">
                                                            <a href="#" class="item-title text-color h-1x">eBay Dashboard</a>
                                                            <div class="item-except text-muted text-sm h-1x">
                                                                This makes me believe there are good people in the world still
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="item-action dropdown">
                                                                <a href="#" data-toggle="dropdown" class="text-muted">
                                                                    <i data-feather="more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                    <a class="dropdown-item" href="#">
                                                                        See detail
                                                                    </a>
                                                                    <a class="dropdown-item download">
                                                                        Download
                                                                    </a>
                                                                    <a class="dropdown-item edit">
                                                                        Edit
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item trash">
                                                                        Delete item
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="list-item " data-id="20">
                                                        <div>
                                                            <label class="ui-check m-0 ui-check-rounded ui-check-md">
                                                                <input type="checkbox" name="id" value="20">
                                                                <i></i>
                                                            </label>
                                                        </div>
                                                        <div class="flex">
                                                            <a href="#" class="item-title text-color h-1x">Netflix hackathon ios app</a>
                                                            <div class="item-except text-muted text-sm h-1x">
                                                                Netflix hackathon creates eye tracking option for iOS app
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="item-action dropdown">
                                                                <a href="#" data-toggle="dropdown" class="text-muted">
                                                                    <i data-feather="more-vertical"></i>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                    <a class="dropdown-item" href="#">
                                                                        See detail
                                                                    </a>
                                                                    <a class="dropdown-item download">
                                                                        Download
                                                                    </a>
                                                                    <a class="dropdown-item edit">
                                                                        Edit
                                                                    </a>
                                                                    <div class="dropdown-divider"></div>
                                                                    <a class="dropdown-item trash">
                                                                        Delete item
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="p-3-4">
                                            <div class="d-flex mb-3">
                                                <div>
                                                    <div>Summary</div>
                                                    <small class="text-muted">All mentions: 12,340</small>
                                                </div>
                                                <span class="flex"></span>
                                                <div>
                                                    <div class="btn-group btn-group-toggle" id="btn_l_4" data-toggle="buttons">
                                                        <label class="btn active">
                                                            <input type="radio" name="options"> Month
                                                        </label>
                                                        <label class="btn">
                                                            <input type="radio" name="options"> Week
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2" style="height: 364px">
                                                <canvas data-plugin="chartjs" id="chart-line-4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="card">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div>Top groups</div>
                                                    <small class="text-muted">Total: 230</small>
                                                </div>
                                                <span class="flex"></span>
                                                <div>
                                                    <a href="#" class="btn btn-sm btn-white">More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-theme v-middle m-0">
                                            <tbody>
                                                <tr class=" " data-id="8">
                                                    <td style="min-width:30px;text-align:center">
                                                        0
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group ">
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Egestas">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a3.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Est">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a9.jpg" alt=".">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="flex">
                                                        <a href="page.invoice.detail.html" class="item-company ajax h-1x">
                                                            Jet
                                                        </a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            lawrence-cole@jet.com
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="item-amount d-none d-sm-block text-sm ">
					              220
					            </span>
                                                    </td>
                                                    <td>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class=" " data-id="1">
                                                    <td style="min-width:30px;text-align:center">
                                                        1
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group ">
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="At">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a5.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Mauris">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a4.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Semper">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a13.jpg" alt=".">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="flex">
                                                        <a href="page.invoice.detail.html" class="item-company ajax h-1x">
                                                            Samsum Inc.
                                                        </a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            joyce-mccoy@samsuminc..com
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="item-amount d-none d-sm-block text-sm ">
					              210
					            </span>
                                                    </td>
                                                    <td>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class=" " data-id="7">
                                                    <td style="min-width:30px;text-align:center">
                                                        2
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group ">
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Sollicitudin">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a6.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Nisl">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a12.jpg" alt=".">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="flex">
                                                        <a href="page.invoice.detail.html" class="item-company ajax h-1x">
                                                            Lostcorp
                                                        </a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            frank-kelley@lostcorp.com
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="item-amount d-none d-sm-block text-sm ">
					              510
					            </span>
                                                    </td>
                                                    <td>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class=" " data-id="20">
                                                    <td style="min-width:30px;text-align:center">
                                                        3
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group ">
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Maecenas">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a13.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Elit">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a11.jpg" alt=".">
                                                            </a>
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Ultrices">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a7.jpg" alt=".">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="flex">
                                                        <a href="page.invoice.detail.html" class="item-company ajax h-1x">
                                                            Netflix
                                                        </a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            gloria-williams@netflix.com
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="item-amount d-none d-sm-block text-sm ">
					              120
					            </span>
                                                    </td>
                                                    <td>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class=" " data-id="2">
                                                    <td style="min-width:30px;text-align:center">
                                                        4
                                                    </td>
                                                    <td>
                                                        <div class="avatar-group ">
                                                            <a href="#" class="avatar ajax w-32" data-toggle="tooltip" title="Et,">
                                                                <img src="<?php echo get_option('site_url'); ?>/assets/img/a3.jpg" alt=".">
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="flex">
                                                        <a href="page.invoice.detail.html" class="item-company ajax h-1x">
                                                            Microsoft
                                                        </a>
                                                        <div class="item-mail text-muted h-1x d-none d-sm-block">
                                                            kathy-alexander@microsoft.com
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="item-amount d-none d-sm-block text-sm ">
					              10
					            </span>
                                                    </td>
                                                    <td>
                                                        <div class="item-action dropdown">
                                                            <a href="#" data-toggle="dropdown" class="text-muted">
                                                                <i data-feather="more-vertical"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right bg-black" role="menu">
                                                                <a class="dropdown-item" href="#">
                                                                    See detail
                                                                </a>
                                                                <a class="dropdown-item download">
                                                                    Download
                                                                </a>
                                                                <a class="dropdown-item edit">
                                                                    Edit
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item trash">
                                                                    Delete item
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex">
                                    <div class="card flex">
                                        <div class="p-3-4">
                                            <div class="d-flex">
                                                <div>
                                                    <div>Courses</div>
                                                    <small class="text-muted">on-going: 12</small>
                                                </div>
                                                <span class="flex"></span>
                                                <div>
                                                    <a href="#" class="p-1 text-muted">
                                                        <i data-feather="more-horizontal"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="list list-row">
                                            <div class="list-item " data-id="1">
                                                <div>
                                                    <span class="badge badge-circle text-primary"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">WordPress dashboard redesign</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              5
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="3">
                                                <div>
                                                    <span class="badge badge-circle text-primary"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">Html5 dashboard conference</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              50
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="14">
                                                <div>
                                                    <span class="badge badge-circle text-warning"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">Database management</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              20
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="20">
                                                <div>
                                                    <span class="badge badge-circle text-warning"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">Netflix hackathon ios app</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              20
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="12">
                                                <div>
                                                    <span class="badge badge-circle text-info"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">Sales Support</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              20
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="17">
                                                <div>
                                                    <span class="badge badge-circle text-warning"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">AI Could Uber</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              25
	      			            </span>
                                                </div>
                                            </div>
                                            <div class="list-item " data-id="17">
                                                <div>
                                                    <span class="badge badge-circle text-warning"></span>
                                                </div>
                                                <div class="flex">
                                                    <a href="#" class="item-title text-color h-1x">AI Could Uber</a>
                                                </div>
                                                <div>
                                                    <span class="item-amount d-none d-sm-block text-sm text-muted">
	      			              53
	      			            </span>
                                                </div>
                                            </div>
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