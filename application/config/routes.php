<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'auth';
$route['login'] = 'auth/login';
$route['404_override'] = 'pages_404';
$route['coming_soon'] = 'pages_comingsoon';
$route['translate_uri_dashes'] = FALSE;
//strategi_penjualan
$route['lending'] = 'strategi_penjualan/lending';
$route['performa_so'] = 'strategi_penjualan/performa_so';
$route['performa_so_detail/(:any)'] = 'strategi_penjualan/performa_so_detail';
// $route['performa_so_detail/(:num)'] = 'performa_so_detail/index/$1';
$route['performa_dealer'] = 'strategi_penjualan/performa_dealer';
$route['performa_dealer_detail/(:any)'] = 'strategi_penjualan/performa_dealer_detail';
$route['performa_produk'] = 'strategi_penjualan/performa_produk';
$route['performa_produk_detail/(:any)'] = 'strategi_penjualan/performa_produk_detail';
$route['history_assets'] = 'strategi_penjualan/history_assets';
$route['history_assets_detail/(:any)'] = 'strategi_penjualan/history_assets_detail';
$route['history_assets_jbrand_detail/(:any)'] = 'strategi_penjualan/history_assets_jbrand_detail';
$route['segment_customer'] = 'strategi_penjualan/segment_customer';
$route['profit'] = 'strategi_penjualan/profit';
$route['performa_profit_detail/(:any)'] = 'strategi_penjualan/performa_profit_detail';
$route['customer_retention'] = 'strategi_penjualan/customer_retention';
//strategi_collection
$route['epd_monitoring'] = 'strategi_collection/epd_monitoring';
$route['tod_monitoring'] = 'strategi_collection/tod_monitoring';
$route['tod_monitoring_detail/(:any)'] = 'strategi_collection/tod_monitoring_detail';
$route['npl_monitoring'] = 'strategi_collection/npl_monitoring';
$route['cwo_monitoring'] = 'strategi_collection/cwo_monitoring';
$route['performa_armo'] = 'strategi_collection/performa_armo';
$route['performa_armo_detail/(:any)'] = 'strategi_collection/performa_armo_detail';

