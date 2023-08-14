<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Add New Indikator</h4>
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
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form id="indikator-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-horizontal needs-validation" action="<?php print_link("indikator/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="ketersediaan_sdm">Ketersediaan Sdm <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-ketersediaan_sdm"  value="<?php  echo $this->set_field_value('ketersediaan_sdm',""); ?>" type="text" placeholder="Enter Ketersediaan Sdm"  required="" name="ketersediaan_sdm"  class="form-control " />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="dukungan_anggaran">Dukungan Anggaran <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-dukungan_anggaran"  value="<?php  echo $this->set_field_value('dukungan_anggaran',""); ?>" type="text" placeholder="Enter Dukungan Anggaran"  required="" name="dukungan_anggaran"  class="form-control " />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="bimtek_inovasi">Bimtek Inovasi <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-bimtek_inovasi"  value="<?php  echo $this->set_field_value('bimtek_inovasi',""); ?>" type="text" placeholder="Enter Bimtek Inovasi"  required="" name="bimtek_inovasi"  class="form-control " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="integrasi_program">Integrasi Program <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-integrasi_program"  value="<?php  echo $this->set_field_value('integrasi_program',""); ?>" type="text" placeholder="Enter Integrasi Program"  required="" name="integrasi_program"  class="form-control " />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="keterlibatan_aktor">Keterlibatan Aktor <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-keterlibatan_aktor"  value="<?php  echo $this->set_field_value('keterlibatan_aktor',""); ?>" type="text" placeholder="Enter Keterlibatan Aktor"  required="" name="keterlibatan_aktor"  class="form-control " />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="pelaksana_inovasi">Pelaksana Inovasi <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-pelaksana_inovasi"  value="<?php  echo $this->set_field_value('pelaksana_inovasi',""); ?>" type="text" placeholder="Enter Pelaksana Inovasi"  required="" name="pelaksana_inovasi"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="jejaring_inovasi">Jejaring Inovasi <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        <input id="ctrl-jejaring_inovasi"  value="<?php  echo $this->set_field_value('jejaring_inovasi',""); ?>" type="text" placeholder="Enter Jejaring Inovasi"  required="" name="jejaring_inovasi"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div class="row">
                                                                    <div class="col-sm-4">
                                                                        <label class="control-label" for="sosialisasi_inovasi">Sosialisasi Inovasi <span class="text-danger">*</span></label>
                                                                    </div>
                                                                    <div class="col-sm-8">
                                                                        <div class="">
                                                                            <input id="ctrl-sosialisasi_inovasi"  value="<?php  echo $this->set_field_value('sosialisasi_inovasi',""); ?>" type="text" placeholder="Enter Sosialisasi Inovasi"  required="" name="sosialisasi_inovasi"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <label class="control-label" for="pedoman_teknis">Pedoman Teknis <span class="text-danger">*</span></label>
                                                                        </div>
                                                                        <div class="col-sm-8">
                                                                            <div class="">
                                                                                <input id="ctrl-pedoman_teknis"  value="<?php  echo $this->set_field_value('pedoman_teknis',""); ?>" type="text" placeholder="Enter Pedoman Teknis"  required="" name="pedoman_teknis"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="row">
                                                                            <div class="col-sm-4">
                                                                                <label class="control-label" for="kemudahan_informasi_layanan">Kemudahan Informasi Layanan <span class="text-danger">*</span></label>
                                                                            </div>
                                                                            <div class="col-sm-8">
                                                                                <div class="">
                                                                                    <input id="ctrl-kemudahan_informasi_layanan"  value="<?php  echo $this->set_field_value('kemudahan_informasi_layanan',""); ?>" type="text" placeholder="Enter Kemudahan Informasi Layanan"  required="" name="kemudahan_informasi_layanan"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div class="row">
                                                                                <div class="col-sm-4">
                                                                                    <label class="control-label" for="kecepatan_penciptaan_inovasi">Kecepatan Penciptaan Inovasi <span class="text-danger">*</span></label>
                                                                                </div>
                                                                                <div class="col-sm-8">
                                                                                    <div class="">
                                                                                        <input id="ctrl-kecepatan_penciptaan_inovasi"  value="<?php  echo $this->set_field_value('kecepatan_penciptaan_inovasi',""); ?>" type="text" placeholder="Enter Kecepatan Penciptaan Inovasi"  required="" name="kecepatan_penciptaan_inovasi"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div class="row">
                                                                                    <div class="col-sm-4">
                                                                                        <label class="control-label" for="kemudahan_proses_inovasi">Kemudahan Proses Inovasi <span class="text-danger">*</span></label>
                                                                                    </div>
                                                                                    <div class="col-sm-8">
                                                                                        <div class="">
                                                                                            <input id="ctrl-kemudahan_proses_inovasi"  value="<?php  echo $this->set_field_value('kemudahan_proses_inovasi',""); ?>" type="text" placeholder="Enter Kemudahan Proses Inovasi"  required="" name="kemudahan_proses_inovasi"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-4">
                                                                                            <label class="control-label" for="penyelesaian_layanan">Penyelesaian Layanan <span class="text-danger">*</span></label>
                                                                                        </div>
                                                                                        <div class="col-sm-8">
                                                                                            <div class="">
                                                                                                <input id="ctrl-penyelesaian_layanan"  value="<?php  echo $this->set_field_value('penyelesaian_layanan',""); ?>" type="text" placeholder="Enter Penyelesaian Layanan"  required="" name="penyelesaian_layanan"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div class="row">
                                                                                            <div class="col-sm-4">
                                                                                                <label class="control-label" for="online_sistem">Online Sistem <span class="text-danger">*</span></label>
                                                                                            </div>
                                                                                            <div class="col-sm-8">
                                                                                                <div class="">
                                                                                                    <input id="ctrl-online_sistem"  value="<?php  echo $this->set_field_value('online_sistem',""); ?>" type="text" placeholder="Enter Online Sistem"  required="" name="online_sistem"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group ">
                                                                                            <div class="row">
                                                                                                <div class="col-sm-4">
                                                                                                    <label class="control-label" for="replikasi">Replikasi <span class="text-danger">*</span></label>
                                                                                                </div>
                                                                                                <div class="col-sm-8">
                                                                                                    <div class="">
                                                                                                        <input id="ctrl-replikasi"  value="<?php  echo $this->set_field_value('replikasi',""); ?>" type="text" placeholder="Enter Replikasi"  required="" name="replikasi"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group ">
                                                                                                <div class="row">
                                                                                                    <div class="col-sm-4">
                                                                                                        <label class="control-label" for="penggunaan_it">Penggunaan It <span class="text-danger">*</span></label>
                                                                                                    </div>
                                                                                                    <div class="col-sm-8">
                                                                                                        <div class="">
                                                                                                            <input id="ctrl-penggunaan_it"  value="<?php  echo $this->set_field_value('penggunaan_it',""); ?>" type="text" placeholder="Enter Penggunaan It"  required="" name="penggunaan_it"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group ">
                                                                                                    <div class="row">
                                                                                                        <div class="col-sm-4">
                                                                                                            <label class="control-label" for="kemanfaatan_inovasi">Kemanfaatan Inovasi <span class="text-danger">*</span></label>
                                                                                                        </div>
                                                                                                        <div class="col-sm-8">
                                                                                                            <div class="">
                                                                                                                <input id="ctrl-kemanfaatan_inovasi"  value="<?php  echo $this->set_field_value('kemanfaatan_inovasi',""); ?>" type="text" placeholder="Enter Kemanfaatan Inovasi"  required="" name="kemanfaatan_inovasi"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group ">
                                                                                                        <div class="row">
                                                                                                            <div class="col-sm-4">
                                                                                                                <label class="control-label" for="monev_inovasi">Monev Inovasi <span class="text-danger">*</span></label>
                                                                                                            </div>
                                                                                                            <div class="col-sm-8">
                                                                                                                <div class="">
                                                                                                                    <input id="ctrl-monev_inovasi"  value="<?php  echo $this->set_field_value('monev_inovasi',""); ?>" type="text" placeholder="Enter Monev Inovasi"  required="" name="monev_inovasi"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group ">
                                                                                                            <div class="row">
                                                                                                                <div class="col-sm-4">
                                                                                                                    <label class="control-label" for="kualitas_inovasi">Kualitas Inovasi <span class="text-danger">*</span></label>
                                                                                                                </div>
                                                                                                                <div class="col-sm-8">
                                                                                                                    <div class="">
                                                                                                                        <input id="ctrl-kualitas_inovasi"  value="<?php  echo $this->set_field_value('kualitas_inovasi',""); ?>" type="text" placeholder="Enter Kualitas Inovasi"  required="" name="kualitas_inovasi"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group ">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-sm-4">
                                                                                                                        <label class="control-label" for="foto_inovasi">Foto Inovasi <span class="text-danger">*</span></label>
                                                                                                                    </div>
                                                                                                                    <div class="col-sm-8">
                                                                                                                        <div class="">
                                                                                                                            <div class="dropzone required" input="#ctrl-foto_inovasi" fieldname="foto_inovasi"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload <br><b>Max 2 MB</b>"    btntext="Browse" filesize="2" maximum="1">
                                                                                                                                <input name="foto_inovasi" id="ctrl-foto_inovasi" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('foto_inovasi',""); ?>" type="text"  />
                                                                                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                                                                    <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group ">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-sm-4">
                                                                                                                            <label class="control-label" for="video_inovasi">Video Inovasi <span class="text-danger">*</span></label>
                                                                                                                        </div>
                                                                                                                        <div class="col-sm-8">
                                                                                                                            <div class="">
                                                                                                                                <div class="dropzone required" input="#ctrl-video_inovasi" fieldname="video_inovasi"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload <br><b>Max 10 MB</b>"    btntext="Browse" filesize="10" maximum="1">
                                                                                                                                    <input name="video_inovasi" id="ctrl-video_inovasi" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('video_inovasi',""); ?>" type="text"  />
                                                                                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                                                                        <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group ">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <label class="control-label" for="dokument_file_inovasi">Dokument File Inovasi <span class="text-danger">*</span></label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-8">
                                                                                                                                <div class="">
                                                                                                                                    <div class="dropzone required" input="#ctrl-dokument_file_inovasi" fieldname="dokument_file_inovasi"    data-multiple="false" dropmsg="Choose files or drag and drop files to upload <br><b>Max 2 MB</b>"    btntext="Browse" filesize="2" maximum="1">
                                                                                                                                        <input name="dokument_file_inovasi" id="ctrl-dokument_file_inovasi" required="" class="dropzone-input form-control" value="<?php  echo $this->set_field_value('dokument_file_inovasi',""); ?>" type="text"  />
                                                                                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please a choose file</div>-->
                                                                                                                                            <div class="dz-file-limit animated bounceIn text-center text-danger"></div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                                                        <div class="form-ajax-status"></div>
                                                                                                                        <button class="btn btn-primary" type="submit">
                                                                                                                            Submit
                                                                                                                            <i class="fa fa-send"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </section>
