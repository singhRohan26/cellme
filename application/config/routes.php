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
$route['default_controller'] = 'admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
$route['admin/change-password'] = 'admin/change_password';
$route['admin/forgot-password'] = 'admin/forgot_password';
/* user list  */
$route['admin/users'] = 'Users/index';
$route['admin/users/view-user-info/(:any)'] = 'Users/view_user_info/$1';

/* booking Detailsce and devi*/
$route['admin/booking'] = 'Booking/index';
$route['admin/booking/invoice/(:any)'] = 'Booking/invoice/$1';
$route['admin/pricelist'] = 'Booking/getAllDeviceList/';
$route['admin/pricelist/view-price/(:any)'] = 'Booking/getDeviceListById/$1';
$route['admin/pricelist/add-price'] = 'Booking/add_Price/';
$route['admin/pricelist/do-add-device'] = 'Booking/do_add_device/';
$route['admin/booking/status_wrapper/(:any)/(:any)'] = 'Booking/status_wrapper/$1/$2';
$route['admin/booking/Follow-up/(:any)/(:any)'] = 'Booking/Follow_up/$1/$2';
$route['admin/booking/addprice/(:any)/(:any)'] = 'Booking/addprice/$1/$2';
$route['admin/pricelist/add-excel'] = 'Booking/upload_excel/';
//Notification Management
$route['admin/notification'] = 'Notification/index';
$route['admin/view-user-notification/(:any)'] = 'Notification/view_user_notification/$1';
$route['admin/do-send-notification'] = "Notification/do_send_notification";

/*Wrrenty */
$route['admin/warrenty-repair'] = 'Warrenty/index';
$route['admin/warrenty-repair/view/(:any)'] = 'Warrenty/view/$1';
$route['admin/warrenty-repair/status_wrapper/(:any)/(:any)'] = 'Warrenty/status_wrapper/$1/$2';
$route['admin/warrenty-repair/update/(:any)/(:any)/(:any)'] = 'Warrenty/warrentyupdatestatus/$1/$2/$3';


/*order status change in one week*/
$route['admin/order/status'] = 'Order/index';


/*setting */
$route['admin/settings/faqs'] = 'setting/index';
$route['admin/settings/faqs/add'] = 'setting/add_faqs';
$route['admin/settings/faq/view-details/(:any)'] = 'setting/view-details/$1';
$route['admin/settings/faqs/chnage-status/(:any)'] = 'setting/faqs_chnage_status/$1';
$route['admin/settings/term-and-conditions'] = 'Setting/terms/';
$route['admin/settings/about-us'] = 'Setting/about/';

