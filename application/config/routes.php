<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'MainController/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//** MAINCONTROLLER ROUTES */
$route['login'] = 'LoginController/Login/handleLoginDecision';
$route['home'] = 'MainController/homePage';
$route['home_dash'] = 'MainController/homeDashboard';
$route['showTimeLogs'] = "TimeLogController/TimeLogManagement/ShowTimeLogs";
$route['show_under_employee/(:any)'] = "DepartmentController/HandledDepartment/ShowUnderEmp/$1";

//**Tabs */
$route['profile'] = 'TabController/ProfileController/showProfileTab';
$route['notification'] = 'NotificationController/Notification/ShowAllNotification';
$route['view_employee'] = 'TabController/ViewEmployeeTab/ShowEmployeeTab';
$route['view_departments'] = 'TabController/ViewDepartmentsTab/ShowDepartmentsTab';
$route['view_positions'] = 'TabController/ViewPositionsTab/ShowPositionsTab';

$route['edit-profile-tab'] = 'TabController/ProfileController/editProfile';
$route['save_changes'] = 'TabController/ProfileController/saveChanges';

//** TIMELOG ROUTES */
$route['timeIn'] = "TimeLogController/TimeLogManagement/TimeIn";
$route['timeOut'] = "TimeLogController/TimeLogManagement/TimeOut";

//** USER ROUTES */
$route['users/loadUserTable'] = 'UserController/Users/LoadUserTable';
$route['addUser'] = 'UserController/Users/LoadAddUserModal';
$route['submitRegister'] = 'UserController/DataManagement/Action/Create';
$route['editUser'] = 'UserController/Users/LoadEditUserModal';
$route['submitEditUser'] = 'UserController/DataManagement/Action/Edit';
//$route['users/confirmDelete/(:any)']['DELETE'] = 'UserController/DataManagement/Action/Delete/$1';
$route['delete_user'] = 'UserController/DataManagement/Action/Delete';
$route['users/update/(:any)/(:any)'] = 'UserController/DataManagement/Action/Update/$1/$2';

//** SORT USERS TABLE*/
$route['sort_user_by/(:any)'] = 'UserController/DataManagement/SortBy/$1';
$route['sort_dept_by/(:any)'] = 'DepartmentController/DepartmentManagement/SortBy/$1';
$route['sort_position_by/(:any)'] = 'PositionController/PositionManagement/SortBy/$1';

//** SEARCH DATA*/
$route['search/search_user'] ='UserController/DataManagement/SearchUser';
$route['search/search_user'] = 'DepartmentController/DepartmentManagement/SearchDepertment';

//** DEPARTMENT ROUTES*/
$route['users/loadDeptTable'] = 'DepartmentController/Department/LoadDeptTable';
$route['editDepartment'] = 'DepartmentController/Department/LoadEditDeptModal';
$route['addDepartment'] = 'DepartmentController/Department/LoadAddDeptModal';
$route['submitDepartment'] = 'DepartmentController/DepartmentManagement/Create';
$route['submitEditDepartment'] = 'DepartmentController/DepartmentManagement/Edit';
$route['deleteDepartment']= 'DepartmentController/DepartmentManagement/Delete';

//** POSITION ROUTES */
$route['users/loadPositionTable'] = 'PositionController/Position/LoadPositionTable';
$route['addPosition'] = 'PositionController/Position/LoadAddPostModal';
$route['submitPosition'] = 'PositionController/PositionManagement/Create';
$route['addPosition'] = 'PositionController/Position/LoadAddPostModal';
$route['editPosition'] = 'PositionController/Position/LoadEditPostModal';
$route['submitEditPosition'] = 'PositionController/PositionManagement/Edit';
$route['deletePosition']= 'PositionController/PositionManagement/Delete';

//** SESSION MANAGEMENT */
$route['login/processLogin'] = 'LoginController/SessionManagement/handleLoginFormSubmission';
$route['logout'] = 'LoginController/SessionManagement/LogOutUser';