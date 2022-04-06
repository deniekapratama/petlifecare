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
$route['default_controller'] 	= 'home';
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;


///**ROUTES DLL**//
$route['register']					= 'login/register';
$route['login/process']				= 'login/login_process';
$route['login/process_register']	= 'login/register_process';
$route['logout']					= 'login/logout';

///**ROUTES ADMIN**//
$route['admin']								= 'admin/beranda';
///***CARE ORDER***//
$route['care']								= 'admin/care';
$route['care_fail']							= 'admin/care/care_fail';
$route['search_care']						= 'admin/care/search';
$route['confirm_order_care']				= 'admin/care/confirm_order';
$route['confirm_care/(:any)']				= 'admin/care/confirm/$1';
$route['tolak_care/(:any)']					= 'admin/care/tolak/$1';
///***DAYCARE ORDER***//
$route['daycare']							= 'admin/daycare';
$route['daycare_fail']						= 'admin/daycare/daycare_fail';
$route['search_daycare']					= 'admin/daycare/search';
$route['confirm_order_daycare']				= 'admin/daycare/confirm_order';
$route['confirm_daycare/(:any)']			= 'admin/daycare/confirm/$1';
$route['tolak_daycare/(:any)']				= 'admin/daycare/tolak/$1';
///***SALES ORDER***//
$route['sales']								= 'admin/sales';
$route['sales_fail']						= 'admin/sales/sales_fail';
$route['search']							= 'admin/sales/search';
$route['confirm_order']						= 'admin/sales/confirm_order';
$route['confirm/(:any)']					= 'admin/sales/confirm/$1';
$route['tolak/(:any)']						= 'admin/sales/tolak/$1';
///***PRODUCT***//
$route['product']							= 'admin/product';
$route['add_product']						= 'admin/product/page_tambah_product';
$route['process_add_product']				= 'admin/product/tambah_product';
$route['edit_product/(:any)']				= 'admin/product/page_edit_product/$1';
$route['process_edit_product']				= 'admin/product/edit_product';
$route['status_product_inactive/(:any)']	= 'admin/product/status_product_inactive/$1';
$route['status_product_active/(:any)']		= 'admin/product/status_product_active/$1';
///***PRODUCT CATEGORY***///
$route['product_category']					= 'admin/product/product_category';
$route['add_category']						= 'admin/product/page_tambah_product_category';
$route['process_add_category']				= 'admin/product/tambah_category';
$route['edit_category/(:any)']				= 'admin/product/page_edit_product_category/$1';
$route['process_edit_category']				= 'admin/product/edit_category';
$route['status_category_inactive/(:any)']	= 'admin/product/status_category_inactive/$1';
$route['status_category_active/(:any)']		= 'admin/product/status_category_active/$1';
///***USER MANAGE***///
$route['user']								= 'admin/user';
$route['change_level/(:any)']				= 'admin/user/change_level/$1';
$route['status_user_inactive/(:any)']		= 'admin/user/status_user_inactive/$1';
$route['status_user_active/(:any)']			= 'admin/user/status_user_active/$1';
///***BANK***//
$route['bank']								= 'admin/bank';
$route['add_bank']							= 'admin/bank/page_tambah_bank';
$route['process_add_bank']					= 'admin/bank/tambah_bank';
$route['edit_bank/(:any)']					= 'admin/bank/page_edit_bank/$1';
$route['process_edit_bank']					= 'admin/bank/edit_bank';
$route['status_bank_inactive/(:any)']		= 'admin/bank/status_bank_inactive/$1';
$route['status_bank_active/(:any)']			= 'admin/bank/status_bank_active/$1';

///***PUBLIC***///
$route['pet_shop/(:any)']					= 'home/page_pet_shop/$1';
$route['pet_shop/(:any)/(:any)']			= 'home/page_pet_shop/$1/$1';
$route['detail_product/(:any)']				= 'home/detail_product/$1';
$route['check_order']						= 'home/check_order';
$route['check_order_data']					= 'home/order';

$route['pet_daycare']						= 'daycare';
$route['catdaycare']						= 'daycare/cat_daycare';
$route['dogdaycare']						= 'daycare/dog_daycare';
$route['co_daycare']						= 'daycare/checkout';
$route['order_daycare']						= 'daycare/order';
$route['invoice_daycare/(:any)']			= 'daycare/invoice/$1';
$route['invoice_daycare/timer/(:any)']		= 'daycare/timer/$1';
$route['process_invoice_daycare']			= 'daycare/process_invoice';

$route['pet_care']							= 'care';
$route['catcare']							= 'care/cat_care';
$route['dogcare']							= 'care/dog_care';
$route['co_care/(:any)']					= 'care/checkout/$1';
$route['co_care_dog/(:any)']				= 'care/checkout/$1';
$route['order_care']						= 'care/order';
$route['invoice_care/(:any)']				= 'care/invoice/$1';
$route['invoice_care/timer/(:any)']			= 'care/timer/$1';
$route['process_invoice_care']				= 'care/process_invoice';

$route['checkout']							= 'cart/checkout';
$route['order']								= 'cart/order';
$route['invoice/(:any)']					= 'cart/invoice/$1';
$route['invoice/timer/(:any)']				= 'cart/timer/$1';
$route['process_invoice']					= 'cart/process_invoice';