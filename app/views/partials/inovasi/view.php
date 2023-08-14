<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("inovasi/add");
$can_edit = ACL::is_allowed("inovasi/edit");
$can_view = ACL::is_allowed("inovasi/view");
$can_delete = ACL::is_allowed("inovasi/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">View  Inovasi</h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id_inovasi']) ? urlencode($data['id_inovasi']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-nama_opd">
                                        <th class="title"> Nama Opd: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/inovasi_nama_opd_option_list'); ?>' 
                                                data-value="<?php echo $data['nama_opd']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="nama_opd" 
                                                data-title="Enter Nama Opd" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_opd']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nama_inovasi">
                                        <th class="title"> Nama Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="nama_inovasi" 
                                                data-title="Enter Nama Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nama_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tahapan_inovasi">
                                        <th class="title"> Tahapan Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tahapan_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="tahapan_inovasi" 
                                                data-title="Enter Tahapan Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tahapan_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-inisiator_inovasi">
                                        <th class="title"> Inisiator Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['inisiator_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="inisiator_inovasi" 
                                                data-title="Enter Inisiator Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['inisiator_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jenis_inovasi">
                                        <th class="title"> Jenis Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jenis_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="jenis_inovasi" 
                                                data-title="Enter Jenis Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jenis_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-bentuk_inovasi">
                                        <th class="title"> Bentuk Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['bentuk_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="bentuk_inovasi" 
                                                data-title="Enter Bentuk Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['bentuk_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-inovasi_tematik">
                                        <th class="title"> Inovasi Tematik: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['inovasi_tematik']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="inovasi_tematik" 
                                                data-title="Enter Inovasi Tematik" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['inovasi_tematik']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-urusan_inovasi">
                                        <th class="title"> Urusan Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['urusan_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="urusan_inovasi" 
                                                data-title="Enter Urusan Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['urusan_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-waktu_uji_coba">
                                        <th class="title"> Waktu Uji Coba: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['waktu_uji_coba']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="waktu_uji_coba" 
                                                data-title="Enter Waktu Uji Coba" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['waktu_uji_coba']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-waktu_inovasi_diterapkan">
                                        <th class="title"> Waktu Inovasi Diterapkan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                data-value="<?php echo $data['waktu_inovasi_diterapkan']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="waktu_inovasi_diterapkan" 
                                                data-title="Enter Waktu Inovasi Diterapkan" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="flatdatetimepicker" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['waktu_inovasi_diterapkan']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-rencangan_bangun_inovasi">
                                        <th class="title"> Rencangan Bangun Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="rencangan_bangun_inovasi" 
                                                data-title="Rancang bangun inovasi daerah dan pokok perubahan yang akan dilakukan *(minimal 300 kata)*" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="textarea" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['rencangan_bangun_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tujuan_inovasi">
                                        <th class="title"> Tujuan Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tujuan_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="tujuan_inovasi" 
                                                data-title="Enter Tujuan Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['tujuan_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-manfaat_inovasi">
                                        <th class="title"> Manfaat Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['manfaat_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="manfaat_inovasi" 
                                                data-title="Enter Manfaat Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['manfaat_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-hasil_inovasi">
                                        <th class="title"> Hasil Inovasi: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['hasil_inovasi']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="hasil_inovasi" 
                                                data-title="Enter Hasil Inovasi" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['hasil_inovasi']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-anggaran">
                                        <th class="title"> Anggaran: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['anggaran']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="anggaran" 
                                                data-title="Enter Anggaran" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['anggaran']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-nilai">
                                        <th class="title"> Nilai: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['nilai']; ?>" 
                                                data-pk="<?php echo $data['id_inovasi'] ?>" 
                                                data-url="<?php print_link("inovasi/editfield/" . urlencode($data['id_inovasi'])); ?>" 
                                                data-name="nilai" 
                                                data-title="Enter Nilai" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['nilai']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("inovasi/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("inovasi/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
