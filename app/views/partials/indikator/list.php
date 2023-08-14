<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("indikator/add");
$can_edit = ACL::is_allowed("indikator/edit");
$can_view = ACL::is_allowed("indikator/view");
$can_delete = ACL::is_allowed("indikator/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Indikator</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("indikator/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Indikator 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('indikator'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('indikator'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('indikator'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="indikator-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  class="td-regulasi_inovasi"> Regulasi Inovasi</th>
                                                <th  class="td-ketersediaan_sdm"> Ketersediaan Sdm</th>
                                                <th  class="td-dukungan_anggaran"> Dukungan Anggaran</th>
                                                <th  class="td-bimtek_inovasi"> Bimtek Inovasi</th>
                                                <th  class="td-integrasi_program"> Integrasi Program</th>
                                                <th  class="td-keterlibatan_aktor"> Keterlibatan Aktor</th>
                                                <th  class="td-pelaksana_inovasi"> Pelaksana Inovasi</th>
                                                <th  class="td-jejaring_inovasi"> Jejaring Inovasi</th>
                                                <th  class="td-sosialisasi_inovasi"> Sosialisasi Inovasi</th>
                                                <th  class="td-pedoman_teknis"> Pedoman Teknis</th>
                                                <th  class="td-kemudahan_informasi_layanan"> Kemudahan Informasi Layanan</th>
                                                <th  class="td-kecepatan_penciptaan_inovasi"> Kecepatan Penciptaan Inovasi</th>
                                                <th  class="td-kemudahan_proses_inovasi"> Kemudahan Proses Inovasi</th>
                                                <th  class="td-penyelesaian_layanan"> Penyelesaian Layanan</th>
                                                <th  class="td-online_sistem"> Online Sistem</th>
                                                <th  class="td-replikasi"> Replikasi</th>
                                                <th  class="td-penggunaan_it"> Penggunaan It</th>
                                                <th  class="td-kemanfaatan_inovasi"> Kemanfaatan Inovasi</th>
                                                <th  class="td-monev_inovasi"> Monev Inovasi</th>
                                                <th  class="td-kualitas_inovasi"> Kualitas Inovasi</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id_indikator']) ? urlencode($data['id_indikator']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_indikator'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-regulasi_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['regulasi_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="regulasi_inovasi" 
                                                            data-title="Enter Regulasi Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['regulasi_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-ketersediaan_sdm">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['ketersediaan_sdm']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="ketersediaan_sdm" 
                                                            data-title="Enter Ketersediaan Sdm" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['ketersediaan_sdm']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-dukungan_anggaran">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['dukungan_anggaran']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="dukungan_anggaran" 
                                                            data-title="Enter Dukungan Anggaran" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['dukungan_anggaran']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-bimtek_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['bimtek_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="bimtek_inovasi" 
                                                            data-title="Enter Bimtek Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['bimtek_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-integrasi_program">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['integrasi_program']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="integrasi_program" 
                                                            data-title="Enter Integrasi Program" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['integrasi_program']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-keterlibatan_aktor">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['keterlibatan_aktor']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="keterlibatan_aktor" 
                                                            data-title="Enter Keterlibatan Aktor" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['keterlibatan_aktor']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pelaksana_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['pelaksana_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="pelaksana_inovasi" 
                                                            data-title="Enter Pelaksana Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pelaksana_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jejaring_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['jejaring_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="jejaring_inovasi" 
                                                            data-title="Enter Jejaring Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['jejaring_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-sosialisasi_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['sosialisasi_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="sosialisasi_inovasi" 
                                                            data-title="Enter Sosialisasi Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['sosialisasi_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pedoman_teknis">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['pedoman_teknis']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="pedoman_teknis" 
                                                            data-title="Enter Pedoman Teknis" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pedoman_teknis']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kemudahan_informasi_layanan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kemudahan_informasi_layanan']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="kemudahan_informasi_layanan" 
                                                            data-title="Enter Kemudahan Informasi Layanan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kemudahan_informasi_layanan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kecepatan_penciptaan_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kecepatan_penciptaan_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="kecepatan_penciptaan_inovasi" 
                                                            data-title="Enter Kecepatan Penciptaan Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kecepatan_penciptaan_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kemudahan_proses_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kemudahan_proses_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="kemudahan_proses_inovasi" 
                                                            data-title="Enter Kemudahan Proses Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kemudahan_proses_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-penyelesaian_layanan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['penyelesaian_layanan']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="penyelesaian_layanan" 
                                                            data-title="Enter Penyelesaian Layanan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['penyelesaian_layanan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-online_sistem">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['online_sistem']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="online_sistem" 
                                                            data-title="Enter Online Sistem" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['online_sistem']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-replikasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['replikasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="replikasi" 
                                                            data-title="Enter Replikasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['replikasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-penggunaan_it">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['penggunaan_it']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="penggunaan_it" 
                                                            data-title="Enter Penggunaan It" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['penggunaan_it']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kemanfaatan_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kemanfaatan_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="kemanfaatan_inovasi" 
                                                            data-title="Enter Kemanfaatan Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kemanfaatan_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-monev_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['monev_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="monev_inovasi" 
                                                            data-title="Enter Monev Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['monev_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kualitas_inovasi">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kualitas_inovasi']; ?>" 
                                                            data-pk="<?php echo $data['id_indikator'] ?>" 
                                                            data-url="<?php print_link("indikator/editfield/" . urlencode($data['id_indikator'])); ?>" 
                                                            data-name="kualitas_inovasi" 
                                                            data-title="Enter Kualitas Inovasi" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kualitas_inovasi']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("indikator/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("indikator/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("indikator/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("indikator/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
