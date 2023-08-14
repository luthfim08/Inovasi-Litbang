<?php
/**
 * Menu Items
 * All Project Menu
 * @category  Menu List
 */

class Menu{
	
	
			public static $navbarsideleft = array(
		array(
			'path' => 'home', 
			'label' => 'Home', 
			'icon' => '<i class="fa fa-home "></i>'
		),
		
		array(
			'path' => 'user', 
			'label' => 'User', 
			'icon' => '<i class="fa fa-users "></i>'
		),
		
		array(
			'path' => 'galery', 
			'label' => 'Galery', 
			'icon' => '<i class="fa fa-file-photo-o "></i>'
		),
		
		array(
			'path' => 'jurusan', 
			'label' => 'Jurusan', 
			'icon' => ''
		),
		
		array(
			'path' => 'pendaftaran_lomba', 
			'label' => 'Pendaftaran Lomba', 
			'icon' => '<i class="fa fa-registered "></i>'
		),
		
		array(
			'path' => 'inovasi', 
			'label' => 'Inovasi', 
			'icon' => '<i class="fa fa-binoculars "></i>','submenu' => array(
		array(
			'path' => 'inovasi', 
			'label' => 'Data Inovasi', 
			'icon' => '<i class="fa fa-database "></i>'
		),
		
		array(
			'path' => 'indikator', 
			'label' => 'Data Indikator Inovasi', 
			'icon' => ''
		)
	)
		),
		
		array(
			'path' => 'pengumuman', 
			'label' => 'Pengumuman', 
			'icon' => '<i class="fa fa-bullhorn "></i>'
		),
		
		array(
			'path' => 'role_permissions', 
			'label' => 'Role Permissions', 
			'icon' => ''
		),
		
		array(
			'path' => 'roles', 
			'label' => 'Roles', 
			'icon' => ''
		)
	);
		
	
	
			public static $jenis_kelamin = array(
		array(
			"value" => "L", 
			"label" => "Laki-Laki", 
		),
		array(
			"value" => "P", 
			"label" => "Perempuan", 
		),);
		
			public static $account_status = array(
		array(
			"value" => "Active", 
			"label" => "Active", 
		),
		array(
			"value" => "Pending", 
			"label" => "Pending", 
		),
		array(
			"value" => "Blocked", 
			"label" => "Blocked", 
		),);
		
}