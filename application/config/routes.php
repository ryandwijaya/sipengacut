<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	
	
	// authentication

	$route['login'] = 'AuthController/index';
	$route['logout'] = 'AuthController/logout';
	$route['auth/login'] = 'AuthController/login';
	

	$route['dashboard'] = 'DashboardController/index';




	$route['pegawai'] = 'PegawaiController/index';
	$route['list_biodata'] = 'PegawaiController/list_biodata';
	$route['pegawai/create'] = 'PegawaiController/create';
	$route['pegawai/edit/(:any)'] = 'PegawaiController/edit/$1';
	$route['pegawai/delete/(:any)'] = 'PegawaiController/delete/$1';
	$route['pegawai/detail/(:any)'] = 'PegawaiController/detail/$1';
	$route['biodata/(:any)'] = 'PegawaiController/biodata/$1';


	$route['jabatan'] = 'JabatanController/index';
	$route['jabatan/create'] = 'JabatanController/create';
	$route['jabatan/edit/(:any)'] = 'JabatanController/edit/$1';
	$route['jabatan/delete/(:any)'] = 'JabatanController/delete/$1';

	$route['user'] = 'UserController/index';
	$route['user/create'] = 'UserController/create';
	$route['user/edit/(:any)'] = 'UserController/edit/$1';
	$route['user/delete/(:any)'] = 'UserController/delete/$1';
	


	$route['ajax/getPegawai'] = 'PegawaiController/ajaxGetPegawai';
	

	$route['hubungan/create/(:any)'] = 'ExtendController/create_hub/$1';
	$route['delete/hubungan/(:any)'] = 'ExtendController/delete_hub/$1';
	$route['penghargaan/create/(:any)'] = 'ExtendController/create_penghargaan/$1';
	$route['delete/penghargaan/(:any)'] = 'ExtendController/delete_penghargaan/$1';
	$route['pelatihan/create/(:any)'] = 'ExtendController/create_pelatihan/$1';
	$route['delete/pelatihan/(:any)'] = 'ExtendController/delete_pelatihan/$1';
	$route['pendidikan/create/(:any)'] = 'ExtendController/create_pendidikan/$1';
	$route['delete/pendidikan/(:any)'] = 'ExtendController/delete_pendidikan/$1';
	$route['seminar/create/(:any)'] = 'ExtendController/create_seminar/$1';
	$route['delete/seminar/(:any)'] = 'ExtendController/delete_seminar/$1';


	$route['cuti'] = 'CutiController/index';
	$route['cuti/new'] = 'CutiController/new_cuti';
	$route['cuti/all'] = 'CutiController/all_cuti';
	$route['cuti/cetak/(:any)'] = 'CutiController/cetak/$1';
	$route['cuti/create'] = 'CutiController/create';
	$route['cuti/edit/(:any)'] = 'CutiController/edit/$1';
	$route['cuti/delete/(:any)'] = 'CutiController/delete/$1';
	$route['cuti/batal/(:any)'] = 'CutiController/batal/$1';
	$route['cuti/selesai/(:any)'] = 'CutiController/selesai/$1';
	
	$route['konfirmasi/cuti/(:any)'] = 'CutiController/konfirmasi/$1';
	$route['tolak/cuti/(:any)'] = 'CutiController/tolak/$1';
	$route['set_waiting/cuti/(:any)'] = 'CutiController/waiting/$1';


	$route['default_controller'] = 'AuthController/index';
	$route['404_override'] = '';
	$route['translate_uri_dashes'] = FALSE;

