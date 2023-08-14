<?php 
/**
 * Indikator Page Controller
 * @category  Controller
 */
class IndikatorController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "indikator";
	}
	/**
     * List page records
     * @param $fieldname (filter record by a field) 
     * @param $fieldvalue (filter field value)
     * @return BaseView
     */
	function index($fieldname = null , $fieldvalue = null){
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$fields = array("indikator.id_indikator", 
			"indikator.regulasi_inovasi", 
			"indikator.ketersediaan_sdm", 
			"indikator.dukungan_anggaran", 
			"indikator.bimtek_inovasi", 
			"indikator.integrasi_program", 
			"indikator.keterlibatan_aktor", 
			"indikator.pelaksana_inovasi", 
			"indikator.jejaring_inovasi", 
			"indikator.sosialisasi_inovasi", 
			"indikator.pedoman_teknis", 
			"indikator.kemudahan_informasi_layanan", 
			"indikator.kecepatan_penciptaan_inovasi", 
			"indikator.kemudahan_proses_inovasi", 
			"indikator.penyelesaian_layanan", 
			"indikator.online_sistem", 
			"indikator.replikasi", 
			"indikator.penggunaan_it", 
			"indikator.kemanfaatan_inovasi", 
			"indikator.monev_inovasi", 
			"indikator.kualitas_inovasi");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				indikator.id_indikator LIKE ? OR 
				indikator.regulasi_inovasi LIKE ? OR 
				indikator.ketersediaan_sdm LIKE ? OR 
				indikator.dukungan_anggaran LIKE ? OR 
				indikator.bimtek_inovasi LIKE ? OR 
				indikator.integrasi_program LIKE ? OR 
				indikator.keterlibatan_aktor LIKE ? OR 
				indikator.pelaksana_inovasi LIKE ? OR 
				indikator.jejaring_inovasi LIKE ? OR 
				indikator.sosialisasi_inovasi LIKE ? OR 
				indikator.pedoman_teknis LIKE ? OR 
				indikator.kemudahan_informasi_layanan LIKE ? OR 
				indikator.kecepatan_penciptaan_inovasi LIKE ? OR 
				indikator.kemudahan_proses_inovasi LIKE ? OR 
				indikator.penyelesaian_layanan LIKE ? OR 
				indikator.online_sistem LIKE ? OR 
				indikator.replikasi LIKE ? OR 
				indikator.penggunaan_it LIKE ? OR 
				indikator.kemanfaatan_inovasi LIKE ? OR 
				indikator.monev_inovasi LIKE ? OR 
				indikator.kualitas_inovasi LIKE ? OR 
				indikator.foto_inovasi LIKE ? OR 
				indikator.video_inovasi LIKE ? OR 
				indikator.dokument_file_inovasi LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "indikator/search.php";
		}
		$db->join("pendaftaran_lomba", "indikator.regulasi_inovasi = pendaftaran_lomba.opd", "RIGHT");
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("indikator.id_indikator", ORDER_TYPE);
		}
		if($fieldname){
			$db->where($fieldname , $fieldvalue); //filter by a single field name
		}
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $pagination, $fields);
		$records_count = count($records);
		$total_records = intval($tc->totalCount);
		$page_limit = $pagination[1];
		$total_pages = ceil($total_records / $page_limit);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = $records_count;
		$data->total_records = $total_records;
		$data->total_page = $total_pages;
		if($db->getLastError()){
			$this->set_page_error();
		}
		$page_title = $this->view->page_title = "Indikator";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("indikator/list.php", $data); //render the full page
	}
	/**
     * View record detail 
	 * @param $rec_id (select record by table primary key) 
     * @param $value value (select record by value of field name(rec_id))
     * @return BaseView
     */
	function view($rec_id = null, $value = null){
		$request = $this->request;
		$db = $this->GetModel();
		$rec_id = $this->rec_id = urldecode($rec_id);
		$tablename = $this->tablename;
		$fields = array("id_indikator", 
			"regulasi_inovasi", 
			"ketersediaan_sdm", 
			"dukungan_anggaran", 
			"bimtek_inovasi", 
			"integrasi_program", 
			"keterlibatan_aktor", 
			"pelaksana_inovasi", 
			"jejaring_inovasi", 
			"sosialisasi_inovasi", 
			"pedoman_teknis", 
			"kemudahan_informasi_layanan", 
			"kecepatan_penciptaan_inovasi", 
			"kemudahan_proses_inovasi", 
			"penyelesaian_layanan", 
			"online_sistem", 
			"replikasi", 
			"penggunaan_it", 
			"kemanfaatan_inovasi", 
			"monev_inovasi", 
			"kualitas_inovasi", 
			"foto_inovasi", 
			"video_inovasi", 
			"dokument_file_inovasi");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("indikator.id_indikator", $rec_id);; //select record based on primary key
		}
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Indikator";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		}
		else{
			if($db->getLastError()){
				$this->set_page_error();
			}
			else{
				$this->set_page_error("No record found");
			}
		}
		return $this->render_view("indikator/view.php", $record);
	}
	/**
     * Insert new record to the database table
	 * @param $formdata array() from $_POST
     * @return BaseView
     */
	function add($formdata = null){
		if($formdata){
			$db = $this->GetModel();
			$tablename = $this->tablename;
			$request = $this->request;
			//fillable fields
			$fields = $this->fields = array("regulasi_inovasi","ketersediaan_sdm","dukungan_anggaran","bimtek_inovasi","integrasi_program","keterlibatan_aktor","pelaksana_inovasi","jejaring_inovasi","sosialisasi_inovasi","pedoman_teknis","kemudahan_informasi_layanan","kecepatan_penciptaan_inovasi","kemudahan_proses_inovasi","penyelesaian_layanan","online_sistem","replikasi","penggunaan_it","kemanfaatan_inovasi","monev_inovasi","kualitas_inovasi","foto_inovasi","video_inovasi","dokument_file_inovasi");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'ketersediaan_sdm' => 'required',
				'dukungan_anggaran' => 'required',
				'bimtek_inovasi' => 'required',
				'integrasi_program' => 'required',
				'keterlibatan_aktor' => 'required',
				'pelaksana_inovasi' => 'required',
				'jejaring_inovasi' => 'required',
				'sosialisasi_inovasi' => 'required',
				'pedoman_teknis' => 'required',
				'kemudahan_informasi_layanan' => 'required',
				'kecepatan_penciptaan_inovasi' => 'required',
				'kemudahan_proses_inovasi' => 'required',
				'penyelesaian_layanan' => 'required',
				'online_sistem' => 'required',
				'replikasi' => 'required',
				'penggunaan_it' => 'required',
				'kemanfaatan_inovasi' => 'required',
				'monev_inovasi' => 'required',
				'kualitas_inovasi' => 'required',
				'foto_inovasi' => 'required',
				'video_inovasi' => 'required',
				'dokument_file_inovasi' => 'required',
			);
			$this->sanitize_array = array(
				'ketersediaan_sdm' => 'sanitize_string',
				'dukungan_anggaran' => 'sanitize_string',
				'bimtek_inovasi' => 'sanitize_string',
				'integrasi_program' => 'sanitize_string',
				'keterlibatan_aktor' => 'sanitize_string',
				'pelaksana_inovasi' => 'sanitize_string',
				'jejaring_inovasi' => 'sanitize_string',
				'sosialisasi_inovasi' => 'sanitize_string',
				'pedoman_teknis' => 'sanitize_string',
				'kemudahan_informasi_layanan' => 'sanitize_string',
				'kecepatan_penciptaan_inovasi' => 'sanitize_string',
				'kemudahan_proses_inovasi' => 'sanitize_string',
				'penyelesaian_layanan' => 'sanitize_string',
				'online_sistem' => 'sanitize_string',
				'replikasi' => 'sanitize_string',
				'penggunaan_it' => 'sanitize_string',
				'kemanfaatan_inovasi' => 'sanitize_string',
				'monev_inovasi' => 'sanitize_string',
				'kualitas_inovasi' => 'sanitize_string',
				'foto_inovasi' => 'sanitize_string',
				'video_inovasi' => 'sanitize_string',
				'dokument_file_inovasi' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("indikator/view/$rec_id");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Indikator";
		$this->render_view("indikator/add.php");
	}
	/**
     * Update table record with formdata
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function edit($rec_id = null, $formdata = null){
		$request = $this->request;
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		 //editable fields
		$fields = $this->fields = array("id_indikator","regulasi_inovasi","ketersediaan_sdm","dukungan_anggaran","bimtek_inovasi","integrasi_program","keterlibatan_aktor","pelaksana_inovasi","jejaring_inovasi","sosialisasi_inovasi","pedoman_teknis","kemudahan_informasi_layanan","kecepatan_penciptaan_inovasi","kemudahan_proses_inovasi","penyelesaian_layanan","online_sistem","replikasi","penggunaan_it","kemanfaatan_inovasi","monev_inovasi","kualitas_inovasi","foto_inovasi","video_inovasi","dokument_file_inovasi");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'ketersediaan_sdm' => 'required',
				'dukungan_anggaran' => 'required',
				'bimtek_inovasi' => 'required',
				'integrasi_program' => 'required',
				'keterlibatan_aktor' => 'required',
				'pelaksana_inovasi' => 'required',
				'jejaring_inovasi' => 'required',
				'sosialisasi_inovasi' => 'required',
				'pedoman_teknis' => 'required',
				'kemudahan_informasi_layanan' => 'required',
				'kecepatan_penciptaan_inovasi' => 'required',
				'kemudahan_proses_inovasi' => 'required',
				'penyelesaian_layanan' => 'required',
				'online_sistem' => 'required',
				'replikasi' => 'required',
				'penggunaan_it' => 'required',
				'kemanfaatan_inovasi' => 'required',
				'monev_inovasi' => 'required',
				'kualitas_inovasi' => 'required',
				'foto_inovasi' => 'required',
				'video_inovasi' => 'required',
				'dokument_file_inovasi' => 'required',
			);
			$this->sanitize_array = array(
				'ketersediaan_sdm' => 'sanitize_string',
				'dukungan_anggaran' => 'sanitize_string',
				'bimtek_inovasi' => 'sanitize_string',
				'integrasi_program' => 'sanitize_string',
				'keterlibatan_aktor' => 'sanitize_string',
				'pelaksana_inovasi' => 'sanitize_string',
				'jejaring_inovasi' => 'sanitize_string',
				'sosialisasi_inovasi' => 'sanitize_string',
				'pedoman_teknis' => 'sanitize_string',
				'kemudahan_informasi_layanan' => 'sanitize_string',
				'kecepatan_penciptaan_inovasi' => 'sanitize_string',
				'kemudahan_proses_inovasi' => 'sanitize_string',
				'penyelesaian_layanan' => 'sanitize_string',
				'online_sistem' => 'sanitize_string',
				'replikasi' => 'sanitize_string',
				'penggunaan_it' => 'sanitize_string',
				'kemanfaatan_inovasi' => 'sanitize_string',
				'monev_inovasi' => 'sanitize_string',
				'kualitas_inovasi' => 'sanitize_string',
				'foto_inovasi' => 'sanitize_string',
				'video_inovasi' => 'sanitize_string',
				'dokument_file_inovasi' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("indikator.id_indikator", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("indikator");
				}
				else{
					if($db->getLastError()){
						$this->set_page_error();
					}
					elseif(!$numRows){
						//not an error, but no record was updated
						$page_error = "No record updated";
						$this->set_page_error($page_error);
						$this->set_flash_msg($page_error, "warning");
						return	$this->redirect("indikator");
					}
				}
			}
		}
		$db->where("indikator.id_indikator", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Indikator";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("indikator/edit.php", $data);
	}
	/**
     * Update single field
	 * @param $rec_id (select record by table primary key)
	 * @param $formdata array() from $_POST
     * @return array
     */
	function editfield($rec_id = null, $formdata = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename;
		//editable fields
		$fields = $this->fields = array("id_indikator","regulasi_inovasi","ketersediaan_sdm","dukungan_anggaran","bimtek_inovasi","integrasi_program","keterlibatan_aktor","pelaksana_inovasi","jejaring_inovasi","sosialisasi_inovasi","pedoman_teknis","kemudahan_informasi_layanan","kecepatan_penciptaan_inovasi","kemudahan_proses_inovasi","penyelesaian_layanan","online_sistem","replikasi","penggunaan_it","kemanfaatan_inovasi","monev_inovasi","kualitas_inovasi","foto_inovasi","video_inovasi","dokument_file_inovasi");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'ketersediaan_sdm' => 'required',
				'dukungan_anggaran' => 'required',
				'bimtek_inovasi' => 'required',
				'integrasi_program' => 'required',
				'keterlibatan_aktor' => 'required',
				'pelaksana_inovasi' => 'required',
				'jejaring_inovasi' => 'required',
				'sosialisasi_inovasi' => 'required',
				'pedoman_teknis' => 'required',
				'kemudahan_informasi_layanan' => 'required',
				'kecepatan_penciptaan_inovasi' => 'required',
				'kemudahan_proses_inovasi' => 'required',
				'penyelesaian_layanan' => 'required',
				'online_sistem' => 'required',
				'replikasi' => 'required',
				'penggunaan_it' => 'required',
				'kemanfaatan_inovasi' => 'required',
				'monev_inovasi' => 'required',
				'kualitas_inovasi' => 'required',
				'foto_inovasi' => 'required',
				'video_inovasi' => 'required',
				'dokument_file_inovasi' => 'required',
			);
			$this->sanitize_array = array(
				'ketersediaan_sdm' => 'sanitize_string',
				'dukungan_anggaran' => 'sanitize_string',
				'bimtek_inovasi' => 'sanitize_string',
				'integrasi_program' => 'sanitize_string',
				'keterlibatan_aktor' => 'sanitize_string',
				'pelaksana_inovasi' => 'sanitize_string',
				'jejaring_inovasi' => 'sanitize_string',
				'sosialisasi_inovasi' => 'sanitize_string',
				'pedoman_teknis' => 'sanitize_string',
				'kemudahan_informasi_layanan' => 'sanitize_string',
				'kecepatan_penciptaan_inovasi' => 'sanitize_string',
				'kemudahan_proses_inovasi' => 'sanitize_string',
				'penyelesaian_layanan' => 'sanitize_string',
				'online_sistem' => 'sanitize_string',
				'replikasi' => 'sanitize_string',
				'penggunaan_it' => 'sanitize_string',
				'kemanfaatan_inovasi' => 'sanitize_string',
				'monev_inovasi' => 'sanitize_string',
				'kualitas_inovasi' => 'sanitize_string',
				'foto_inovasi' => 'sanitize_string',
				'video_inovasi' => 'sanitize_string',
				'dokument_file_inovasi' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("indikator.id_indikator", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					return render_json(
						array(
							'num_rows' =>$numRows,
							'rec_id' =>$rec_id,
						)
					);
				}
				else{
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					render_error($page_error);
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		return null;
	}
	/**
     * Delete record from the database
	 * Support multi delete by separating record id by comma.
     * @return BaseView
     */
	function delete($rec_id = null){
		Csrf::cross_check();
		$request = $this->request;
		$db = $this->GetModel();
		$tablename = $this->tablename;
		$this->rec_id = $rec_id;
		//form multiple delete, split record id separated by comma into array
		$arr_rec_id = array_map('trim', explode(",", $rec_id));
		$db->where("indikator.id_indikator", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("indikator");
	}
}
