<?php 
/**
 * Inovasi Page Controller
 * @category  Controller
 */
class InovasiController extends SecureController{
	function __construct(){
		parent::__construct();
		$this->tablename = "inovasi";
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
		$fields = array("id_inovasi", 
			"nama_opd", 
			"nama_inovasi", 
			"tahapan_inovasi", 
			"inisiator_inovasi", 
			"waktu_uji_coba", 
			"waktu_inovasi_diterapkan", 
			"nilai");
		$pagination = $this->get_pagination(MAX_RECORD_COUNT); // get current pagination e.g array(page_number, page_limit)
		//search table record
		if(!empty($request->search)){
			$text = trim($request->search); 
			$search_condition = "(
				inovasi.id_inovasi LIKE ? OR 
				inovasi.nama_opd LIKE ? OR 
				inovasi.nama_inovasi LIKE ? OR 
				inovasi.tahapan_inovasi LIKE ? OR 
				inovasi.inisiator_inovasi LIKE ? OR 
				inovasi.jenis_inovasi LIKE ? OR 
				inovasi.bentuk_inovasi LIKE ? OR 
				inovasi.inovasi_tematik LIKE ? OR 
				inovasi.urusan_inovasi LIKE ? OR 
				inovasi.waktu_uji_coba LIKE ? OR 
				inovasi.waktu_inovasi_diterapkan LIKE ? OR 
				inovasi.rencangan_bangun_inovasi LIKE ? OR 
				inovasi.tujuan_inovasi LIKE ? OR 
				inovasi.manfaat_inovasi LIKE ? OR 
				inovasi.hasil_inovasi LIKE ? OR 
				inovasi.anggaran LIKE ? OR 
				inovasi.nilai LIKE ?
			)";
			$search_params = array(
				"%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%","%$text%"
			);
			//setting search conditions
			$db->where($search_condition, $search_params);
			 //template to use when ajax search
			$this->view->search_template = "inovasi/search.php";
		}
		if(!empty($request->orderby)){
			$orderby = $request->orderby;
			$ordertype = (!empty($request->ordertype) ? $request->ordertype : ORDER_TYPE);
			$db->orderBy($orderby, $ordertype);
		}
		else{
			$db->orderBy("inovasi.id_inovasi", ORDER_TYPE);
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
		$page_title = $this->view->page_title = "Inovasi";
		$this->view->report_filename = date('Y-m-d') . '-' . $page_title;
		$this->view->report_title = $page_title;
		$this->view->report_layout = "report_layout.php";
		$this->view->report_paper_size = "A4";
		$this->view->report_orientation = "portrait";
		$this->render_view("inovasi/list.php", $data); //render the full page
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
		$fields = array("inovasi.id_inovasi", 
			"inovasi.nama_opd", 
			"inovasi.nama_inovasi", 
			"inovasi.tahapan_inovasi", 
			"inovasi.inisiator_inovasi", 
			"inovasi.jenis_inovasi", 
			"inovasi.bentuk_inovasi", 
			"inovasi.inovasi_tematik", 
			"inovasi.urusan_inovasi", 
			"inovasi.waktu_uji_coba", 
			"inovasi.waktu_inovasi_diterapkan", 
			"inovasi.rencangan_bangun_inovasi", 
			"inovasi.tujuan_inovasi", 
			"inovasi.manfaat_inovasi", 
			"inovasi.hasil_inovasi", 
			"inovasi.anggaran", 
			"inovasi.nilai");
		if($value){
			$db->where($rec_id, urldecode($value)); //select record based on field name
		}
		else{
			$db->where("inovasi.id_inovasi", $rec_id);; //select record based on primary key
		}
		$db->join("indikator", "inovasi.id_inovasi = indikator.id_indikator", "INNER ");  
		$record = $db->getOne($tablename, $fields );
		if($record){
			$page_title = $this->view->page_title = "View  Inovasi";
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
		return $this->render_view("inovasi/view.php", $record);
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
			$fields = $this->fields = array("nama_opd","nama_inovasi","tahapan_inovasi","inisiator_inovasi","jenis_inovasi","bentuk_inovasi","inovasi_tematik","urusan_inovasi","waktu_uji_coba","waktu_inovasi_diterapkan","rencangan_bangun_inovasi","tujuan_inovasi","manfaat_inovasi","hasil_inovasi","anggaran");
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'nama_opd' => 'required',
				'nama_inovasi' => 'required',
				'tahapan_inovasi' => 'required',
				'inisiator_inovasi' => 'required',
				'jenis_inovasi' => 'required',
				'bentuk_inovasi' => 'required',
				'inovasi_tematik' => 'required',
				'urusan_inovasi' => 'required',
				'waktu_uji_coba' => 'required',
				'waktu_inovasi_diterapkan' => 'required',
				'rencangan_bangun_inovasi' => 'required',
				'tujuan_inovasi' => 'required',
				'manfaat_inovasi' => 'required',
				'hasil_inovasi' => 'required',
				'anggaran' => 'required',
			);
			$this->sanitize_array = array(
				'nama_opd' => 'sanitize_string',
				'nama_inovasi' => 'sanitize_string',
				'tahapan_inovasi' => 'sanitize_string',
				'inisiator_inovasi' => 'sanitize_string',
				'jenis_inovasi' => 'sanitize_string',
				'bentuk_inovasi' => 'sanitize_string',
				'inovasi_tematik' => 'sanitize_string',
				'urusan_inovasi' => 'sanitize_string',
				'waktu_uji_coba' => 'sanitize_string',
				'waktu_inovasi_diterapkan' => 'sanitize_string',
				'rencangan_bangun_inovasi' => 'sanitize_string',
				'tujuan_inovasi' => 'sanitize_string',
				'manfaat_inovasi' => 'sanitize_string',
				'hasil_inovasi' => 'sanitize_string',
				'anggaran' => 'sanitize_string',
			);
			$this->filter_vals = true; //set whether to remove empty fields
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if($rec_id){
					$this->set_flash_msg("Record added successfully", "success");
					return	$this->redirect("inovasi");
				}
				else{
					$this->set_page_error();
				}
			}
		}
		$page_title = $this->view->page_title = "Add New Inovasi";
		$this->render_view("inovasi/add.php");
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
		$fields = $this->fields = array("id_inovasi","nama_opd","nama_inovasi","tahapan_inovasi","inisiator_inovasi","jenis_inovasi","bentuk_inovasi","inovasi_tematik","urusan_inovasi","waktu_uji_coba","waktu_inovasi_diterapkan","rencangan_bangun_inovasi","tujuan_inovasi","manfaat_inovasi","hasil_inovasi","anggaran","nilai");
		if($formdata){
			$postdata = $this->format_request_data($formdata);
			$this->rules_array = array(
				'nama_opd' => 'required',
				'nama_inovasi' => 'required',
				'tahapan_inovasi' => 'required',
				'inisiator_inovasi' => 'required',
				'jenis_inovasi' => 'required',
				'bentuk_inovasi' => 'required',
				'inovasi_tematik' => 'required',
				'urusan_inovasi' => 'required',
				'waktu_uji_coba' => 'required',
				'waktu_inovasi_diterapkan' => 'required',
				'rencangan_bangun_inovasi' => 'required',
				'tujuan_inovasi' => 'required',
				'manfaat_inovasi' => 'required',
				'hasil_inovasi' => 'required',
				'anggaran' => 'required',
				'nilai' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'nama_opd' => 'sanitize_string',
				'nama_inovasi' => 'sanitize_string',
				'tahapan_inovasi' => 'sanitize_string',
				'inisiator_inovasi' => 'sanitize_string',
				'jenis_inovasi' => 'sanitize_string',
				'bentuk_inovasi' => 'sanitize_string',
				'inovasi_tematik' => 'sanitize_string',
				'urusan_inovasi' => 'sanitize_string',
				'waktu_uji_coba' => 'sanitize_string',
				'waktu_inovasi_diterapkan' => 'sanitize_string',
				'rencangan_bangun_inovasi' => 'sanitize_string',
				'tujuan_inovasi' => 'sanitize_string',
				'manfaat_inovasi' => 'sanitize_string',
				'hasil_inovasi' => 'sanitize_string',
				'anggaran' => 'sanitize_string',
				'nilai' => 'sanitize_string',
			);
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("inovasi.id_inovasi", $rec_id);;
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount(); //number of affected rows. 0 = no record field updated
				if($bool && $numRows){
					$this->set_flash_msg("Record updated successfully", "success");
					return $this->redirect("inovasi/view/$rec_id");
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
						return	$this->redirect("inovasi/view/$rec_id");
					}
				}
			}
		}
		$db->where("inovasi.id_inovasi", $rec_id);;
		$data = $db->getOne($tablename, $fields);
		$page_title = $this->view->page_title = "Edit  Inovasi";
		if(!$data){
			$this->set_page_error();
		}
		return $this->render_view("inovasi/edit.php", $data);
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
		$fields = $this->fields = array("id_inovasi","nama_opd","nama_inovasi","tahapan_inovasi","inisiator_inovasi","jenis_inovasi","bentuk_inovasi","inovasi_tematik","urusan_inovasi","waktu_uji_coba","waktu_inovasi_diterapkan","rencangan_bangun_inovasi","tujuan_inovasi","manfaat_inovasi","hasil_inovasi","anggaran","nilai");
		$page_error = null;
		if($formdata){
			$postdata = array();
			$fieldname = $formdata['name'];
			$fieldvalue = $formdata['value'];
			$postdata[$fieldname] = $fieldvalue;
			$postdata = $this->format_request_data($postdata);
			$this->rules_array = array(
				'nama_opd' => 'required',
				'nama_inovasi' => 'required',
				'tahapan_inovasi' => 'required',
				'inisiator_inovasi' => 'required',
				'jenis_inovasi' => 'required',
				'bentuk_inovasi' => 'required',
				'inovasi_tematik' => 'required',
				'urusan_inovasi' => 'required',
				'waktu_uji_coba' => 'required',
				'waktu_inovasi_diterapkan' => 'required',
				'rencangan_bangun_inovasi' => 'required',
				'tujuan_inovasi' => 'required',
				'manfaat_inovasi' => 'required',
				'hasil_inovasi' => 'required',
				'anggaran' => 'required',
				'nilai' => 'required|numeric',
			);
			$this->sanitize_array = array(
				'nama_opd' => 'sanitize_string',
				'nama_inovasi' => 'sanitize_string',
				'tahapan_inovasi' => 'sanitize_string',
				'inisiator_inovasi' => 'sanitize_string',
				'jenis_inovasi' => 'sanitize_string',
				'bentuk_inovasi' => 'sanitize_string',
				'inovasi_tematik' => 'sanitize_string',
				'urusan_inovasi' => 'sanitize_string',
				'waktu_uji_coba' => 'sanitize_string',
				'waktu_inovasi_diterapkan' => 'sanitize_string',
				'rencangan_bangun_inovasi' => 'sanitize_string',
				'tujuan_inovasi' => 'sanitize_string',
				'manfaat_inovasi' => 'sanitize_string',
				'hasil_inovasi' => 'sanitize_string',
				'anggaran' => 'sanitize_string',
				'nilai' => 'sanitize_string',
			);
			$this->filter_rules = true; //filter validation rules by excluding fields not in the formdata
			$modeldata = $this->modeldata = $this->validate_form($postdata);
			if($this->validated()){
				$db->where("inovasi.id_inovasi", $rec_id);;
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
		$db->where("inovasi.id_inovasi", $arr_rec_id, "in");
		$bool = $db->delete($tablename);
		if($bool){
			$this->set_flash_msg("Record deleted successfully", "success");
		}
		elseif($db->getLastError()){
			$page_error = $db->getLastError();
			$this->set_flash_msg($page_error, "danger");
		}
		return	$this->redirect("inovasi");
	}
}
