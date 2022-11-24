<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// FOR ADMINISTRATOR ROUTING QUERIES
// Data Entry
$route['InsertOldEdtsFile2020'] 		= 'PaldCtrl/InsertOldEdtsFile2020';
$route['InsertOldEdtsFile2019'] 		= 'PaldCtrl/InsertOldEdtsFile2019';
$route['Upload-Old-EDTS-File'] 			= 'PaldCtrl/UploadOldEdtsFile';
$route['DataEntry-Masterlist'] 			= 'PaldCtrl/DataEntryMasterlist';
$route['PaldAdminAddEntry'] 			= 'PaldCtrl/PaldAdminAddEntry';
$route['GenerateNum-PALD'] 				= 'PaldCtrl/PaldGenerateNum';
$route['DataEntry-PALD'] 				= 'PaldCtrl/PaldDataEntry';
$route['DataEntry-Details'] 			= 'PaldCtrl/DataEntryDetails';
$route['UpdateEdts'] 					= 'PaldCtrl/UpdateEdts';
$route['Delete-DataEntry'] 				= 'PaldCtrl/DeleteDataEntry';
$route['DeleteEdts'] 					= 'PaldCtrl/DeleteEdts';



// admin general
$route['Update-WebSideBanner'] 			= 'AdminCtrl/UpdateSideBanner';
$route['Update-WebBanner'] 				= 'AdminCtrl/UpdateBanner';
$route['Update-WebIcon'] 				= 'AdminCtrl/UpdateIcon';
$route['Update-SystemMissionVission'] 	= 'AdminCtrl/UpdateSystemMissionVision';
$route['Update-SystemContact'] 			= 'AdminCtrl/UpdateSystemContact';
$route['Update-SystemDetails'] 			= 'AdminCtrl/UpdateSystemDetails';
$route['Admin-Manage-SystemInfo'] 		= 'AdminCtrl/ManageSystemInfo';
$route['Admin-Update-Image'] 			= 'AdminCtrl/UpdateImage';
$route['Admin-Update-Password'] 		= 'AdminCtrl/UpdatePassword';
$route['Admin-Update-Username'] 		= 'AdminCtrl/UpdateUsername';
$route['Admin-Update-DivRole'] 			= 'AdminCtrl/UpdateDivRole';
$route['Admin-Update-Security'] 		= 'AdminCtrl/UpdateSecurity';
$route['Admin-Update-Personal-Info'] 	= 'AdminCtrl/UpdatePersonalInfo';
$route['Admin-Personal-Info'] 			= 'AdminCtrl/PersonalInfo';
$route['Admin-Logout'] 					= 'AdminCtrl/Logout';
$route['Admin-Dashboard'] 				= 'AdminCtrl/AdminDashboard';
$route['Admin-Manage-Received'] 		= 'AdminCtrl/ManageReceived';
$route['addAnnualYear'] 				= 'AdminCtrl/addAnnualYear';
$route['Delete-Year'] 					= 'AdminCtrl/DeleteAnnualYear';
$route['delAnnualYear'] 				= 'AdminCtrl/delAnnualYear';
$route['Export-Database'] 				= 'AdminCtrl/ExportDatabase';
$route['exportDB'] 						= 'AdminCtrl/exportDB';


// need to be update
$route['InsertSpelsFile'] 				= 'PaldCtrl/InsertSpelsFile';
$route['SPELS-Masterlist'] 				= 'PaldCtrl/SpelsMasterlist';
$route['Edit-Spels'] 					= 'PaldCtrl/EditSpels';
$route['onday_receiver'] 				= 'PaldCtrl/onday_receiver';





//  ********************************************************************************************88

// FOR USER
$route['received_document'] 			= 'RegionUserCtrl/received_document';
$route['user-dashboard'] 				= 'RegionUserCtrl/user_dashboard';
$route['user_logout'] 					= 'RegionUserCtrl/UserLogout';












// user account
$route['Update-User-Password'] 			= 'ManageUserCtrl/UpdatePassword';
$route['Update-User-Username'] 			= 'ManageUserCtrl/UpdateUsername';
$route['Update-User-Image'] 			= 'ManageUserCtrl/UpdateImage';
$route['Update-User-DivRole'] 			= 'ManageUserCtrl/UpdateDivRole';
$route['Update-User-Security'] 			= 'ManageUserCtrl/UpdateSecurity';
$route['Update-User-Info'] 				= 'ManageUserCtrl/UpdateUserInfo';
$route['Edit-UserAccount'] 				= 'ManageUserCtrl/EditUserAccount';
$route['Create-UserAccount'] 			= 'ManageUserCtrl/CreateUserAccount';
$route['Manage-UserAccount'] 			= 'ManageUserCtrl/ManageUserAccount';

// RO User



// need to tranfer in PaldCtrl
// $route['PaldUpdateDataEntryUser'] 		= 'PaldUserCtrl/PaldUpdateDataEntryUser';
// $route['User-Edit-DataEntry'] 			= 'PaldUserCtrl/EditDataEntry';
// $route['User-DataEntry-Masterlist'] 	= 'PaldUserCtrl/DataEntryMasterlist';
// $route['PaldAddEntryUser'] 				= 'PaldUserCtrl/PaldAddEntryUser';
// $route['GenerateNum-PALDuser'] 			= 'PaldUserCtrl/PaldGenerateNum';





// $route['Pald-User-DataEntry'] 			= 'PaldUserCtrl/PaldUserDataEntry';
// $route['Pald-Logout'] 					= 'PaldUserCtrl/Paldlogout';
// $route['Pald-User-Dashboard'] 			= 'PaldUserCtrl/PaldUserDashboard';

// // ORD
// $route['Ord-User-Dashboard'] 			= 'OrdUserCtrl/OrdUserDashboard';
// $route['Ord-Logout'] 					= 'OrdUserCtrl/Logout';
// $route['Ord-Masterlist-Internal'] 		= 'OrdUserCtrl/OrdMasterlistInternal';
// $route['Ord-Masterlist-SPELS'] 			= 'OrdUserCtrl/OrdMasterlistSpels';




// guest
$route['data-received-masterlist'] 		= 'GuestCtrl/data_received_masterlist';
$route['UserLogin'] 					= 'GuestCtrl/UserLogin';
$route['default_controller'] 			= 'GuestCtrl';
$route['404_override'] 					= '';
$route['translate_uri_dashes'] 			= FALSE;
