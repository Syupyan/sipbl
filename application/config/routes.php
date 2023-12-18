<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']            = 'auth/Auth/index ';
$route['404_override']                  = 'Page_Error/index';
$route['translate_uri_dashes']          = TRUE;

$route['page'] = 'Page_Error/search_page';

//modules admin//
$route['admin'] 				        = 'admin/Admin/index';
$route['admin/access-manager'] 	        = 'admin/Access_Manager/index';
// $route['admin/menu-manager'] 	        = 'admin/Menu_Manager/index';
$route['admin/master-pengguna']         = 'admin/Master_Pengguna/index';
$route['admin/master-prodi'] 	        = 'admin/Master_Prodi/index';
$route['admin/master-usulan']       	= 'admin/Master_Usulan/index';
$route['admin/master-mahasiswa'] 	    = 'admin/Master_Mahasiswa/index';
$route['admin/master-ruangan'] 	        = 'admin/Master_Ruangan/index';
$route['admin/master-matakuliah']       = 'admin/Master_Matakuliah/index';
//modules admin//

$route['sadmin/menu-manager'] 	        = 'sadmin/Menu_Manager/index';
$route['sadmin/master-menu'] 	        = 'sadmin/Master_Menu/index';


//modules pengusul
$route['pengusul']					    =	'pengusul/pengusul/index';
$route['pengusul/write-usulan']		    =	'pengusul/Write/write_usulan';
//modules pengusul

//modules reviewer
$route['reviewer']					    =	'reviewer/Data_Proyek/index';
$route['reviewer/proyek-diterima']		=	'reviewer/Data_Proyek/proyek_diterima';
$route['reviewer/proyek-ditolak']		=	'reviewer/Data_Proyek/proyek_ditolak';
//modules reviewer

//modules peninjau
$route['pm']					        =	'pm/Data_Kelola_Proyek_Manajer/index';
$route['pm/kelola-proyek/(:num)']		=	'pm/Data_Kelola_Proyek_Manajer/kelola_proyek_pm/$1';
$route['pm/ajukan-rpp/(:num)']		    =	'pm/Data_Kelola_Proyek_Manajer/ajukan_rpp/$1';
$route['pm/lihat-rpp/(:num)']		    =	'pm/Data_Kelola_Proyek_Manajer/lihat_rpp/$1';
$route['pm/data-monitoring/(:num)']		=	'pm/Data_Kelola_Proyek_Manajer/data_monitoring/$1';
$route['pm/data-qc/(:num)']		        =	'pm/Data_Kelola_Proyek_Manajer/data_qc/$1';
//modules peninjau

//modules peninjau
$route['cpo']					        =	'cpo/Data_Kelola_Cpo/index';
$route['cpo/kelola-proyek/(:num)']		=	'cpo/Data_Kelola_Cpo/kelola_proyek_cpo/$1';
$route['cpo/ajukan-rpp/(:num)']		    =	'cpo/Data_Kelola_Cpo/ajukan_rpp/$1';
$route['cpo/lihat-rpp/(:num)']		    =	'cpo/Data_Kelola_Cpo/lihat_rpp/$1';
$route['cpo/data-monitoring/(:num)']    =	'cpo/Data_Kelola_Cpo/data_monitoring/$1';
$route['cpo/data-qc/(:num)']		    =	'cpo/Data_Kelola_Cpo/data_qc/$1';

//modules peninjau
$route['direktur']					    =	'direktur/Data_Direktur/index';
$route['direktur/kelola-proyek/(:num)']	=	'direktur/Data_Direktur/kelola_proyek_direktur/$1';
$route['direktur/ajukan-rpp/(:num)']		    =	'direktur/Data_Direktur/ajukan_rpp/$1';
$route['direktur/lihat-rpp/(:num)']		    =	'direktur/Data_Direktur/lihat_rpp/$1';
$route['direktur/data-monitoring/(:num)']    =	'direktur/Data_Direktur/data_monitoring/$1';
$route['direktur/data-qc/(:num)']		    =	'direktur/Data_Direktur/data_qc/$1';
//modules peninjau

//modules auth Controller Auth
$route['login']				            = 'auth/Auth/index';
$route['forgot-password'] 	            = 'auth/Auth/lupapassword';
$route['reset-password'] 	            = 'auth/Auth/resetpassword';
$route['logout']			            = 'auth/Auth/logout';
//

// modules user controller User
$route['user'] 					        = 'user/User/index';
$route['user/user-profile'] 	        = 'user/User/index';
$route['user/edit-profile'] 	        = 'user/User/edit_profile';
$route['user/change-password'] 	        = 'user/User/change_password';
// $route['example/(:any)'] = 'controller/method/$1';