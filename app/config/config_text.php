<?php 
// echo $GLOBALS['config_LOGIN_FIELDS_ADMIN_DASHBOARD'];


// -------------- Error
$config['CAD_ERROR_400'] = 'Browser do not responding and try again.';
$config['CAD_ERROR_500_0'] = 'Please check internet connection and try again.';
$config['CAD_ERROR_408'] = 'Operation timed out';
$config['CAD_ERROR_OTHER'] = 'Internet can not respound.';


//--------------- Menu text
$config['CAD_MENU_DASHBOARD'] = 'Dashboard';
$config['CAD_MENU_COURSES'] = 'Courses';
$config['CAD_MENU_GROUPS'] = 'Groups';
$config['CAD_MENU_USERS'] = 'Users';
$config['CAD_MENU_LIBRARY'] = 'Library';
$config['CAD_MENU_REPORTS'] = 'Reports';
$config['CAD_MENU_CERTIFICATION'] = 'Certifications';
$config['CAD_MENU_ADMIN_CONFIGURATION'] = 'Admin Configuration';
$config['CAD_MENU_CERTIFICATION_USERS'] = 'Certification by Users';
$config['CAD_MENU_CERTIFICATION_COURSES'] = 'Certification by Courses';
$config['CAD_MENU_COURSE_GROUPS'] = 'Map Courses to Groups';
$config['CAD_MENU_IMAGES'] = 'Images';
$config['CAD_MENU_VIDEOS'] = 'Videos';
$config['CAD_MENU_CREATE_USER'] = 'Create Users';


//--------------- Messages text
$config['CAD_MSG_SELECT_USER'] = 'Please select user.';
$config['CAD_MSG_SELECT_COURSE'] = 'Please select Course.';
$config['CAD_MSG_NO_USER'] = 'User list not found.';
$config['CAD_MSG_NO_COURSE'] = 'Course list not found.';
$config['CAD_MSG_NO_RECORD'] = 'Record not found.';
$config['CAD_MSG_REQUIRED_ALL_FIELD'] = '* All field required.';
$config['CAD_MSG_PASS_NOT_MATCH'] = '* Entered password does not match.';
$config['CAD_MSG_VALID_EMAIL'] = '* The email must be a valid email address.';
$config['CAD_MSG_VALID_PHONE'] = '* The phone number must be a valid phone number.';
$config['CAD_MSG_MIN_LENGTH'] = '* Min length is 3 characters.';
$config['CAD_MSG_PASS_BOTH_CATE'] = '* Password should contains both lower and uppercase characters.';
$config['CAD_MSG_PASS_BOTH_NUMBER_CATE'] = '* Password should contains both numbers and characters.';
$config['CAD_MSG_PASS_SPECIAL'] = '* Password should contains minimum one special character.';
$config['CAD_MSG_NO'] = 'No';
$config['CAD_MSG_YES'] = 'Yes';
$config['CAD_MSG_NAME_CATE'] = '* Name should contains only characters.';
$config['CAD_MSG_NAME_MIN_LENGTH'] = '* Name should contains minimum 3 character.';
$config['CAD_MSG_SURNAME_CATE'] = '* Surname should contains only characters.';
$config['CAD_MSG_SURNAME_MIN_LENGTH'] = '* Surname should contains minimum 3 character.';


//--------------- Common text
$config['CAD_OTHER_DOMAIN'] = '.raccoon.in';
$config['CAD_OTHER_TITLE'] = 'Raccoon Admin';
$config['CAD_OTHER_LOGOUT'] = 'Logout';
$config['CAD_OTHER_SAVE'] = 'Save';
$config['CAD_OTHER_ADD'] = 'Add';
$config['CAD_OTHER_EDIT'] = 'Edit';
$config['CAD_OTHER_REMOVE'] = 'Remove';
$config['CAD_OTHER_DELETE'] = 'Delete';
$config['CAD_OTHER_COPY'] = 'Copy';
$config['CAD_OTHER_YES'] = 'Yes';
$config['CAD_OTHER_NO'] = 'No';
$config['CAD_OTHER_DEACTIVATE'] = 'Deactivate';
$config['CAD_OTHER_ACTIVATE'] = 'Activate';
$config['CAD_OTHER_LOADING'] = 'Loading...';
$config['CAD_OTHER_FOOTER_COMPANY_DETAILS_RIGHT'] = 'Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_blank">CAN Brand Services</a>';
$config['CAD_OTHER_FOOTER_COMPANY_DETAILS_LEFT'] = '<span id="year-copy">2016</span> &copy; <a href="javascript:void(0);" target="_blank">RACCOON</a>';

$config['CAD_OTHER_APP_URL'] = 'http://'.HTTP_HOST.'/';
$config['CAD_OTHER_APP_URL2'] = 'http://'.HTTP_HOST;
$config['CAD_OTHER_LOADING_IMAGE_LINK'] = $config['CAD_OTHER_APP_URL'].'assets/images/loading_spinner.gif';
$config['CAD_OTHER_LOADING_IMAGE'] = '<img class="img50" src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" />';
$config['CAD_OTHER_LOADING_IMAGE1'] = '<img src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" />';
$config['CAD_OTHER_TABLE_LOADING_IMAGE'] = '<tr style="display:block;"><td style="width: 100%;display:block; text-align:center !important;"><img class="img50" src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" /></td></tr>';
$config['CAD_OTHER_TABLE_LOADING_IMAGE2'] = '<tr><td colspan="2" class="text-center"><img class="img50" src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" /></td></tr>';
$config['CAD_OTHER_TABLE_LOADING_IMAGE3'] = '<td colspan="2" class="text-center"><img class="img50" src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" /></td>';
$config['CAD_OTHER_TABLE_LOADING_IMAGE4'] = '<div class="text-center"><img class="img50" src="'.$config['CAD_OTHER_LOADING_IMAGE_LINK'].'" /></div>';


//--------------- Configration
$config['CAD_ADMIN_HEADER_BASIC_SETTINGS'] = '<strong>Basic </strong> Settings';
$config['CAD_ADMIN_HEADER_SECURITY_OPTIONS'] = '<strong>Security </strong> Options';
$config['CAD_ADMIN_HEADER_COMPANY_LOGO'] = '<strong>Company </strong> Logo';
$config['CAD_ADMIN_HEADER_VISUAL_OPTIONS'] = '<strong>Visual </strong> Options';

$config['CAD_ADMIN_FIELDS_COMPANY_NAME'] = 'Company Name';
$config['CAD_ADMIN_FIELDS_LANGUAGES'] = 'Languages';
$config['CAD_ADMIN_FIELDS_TIME_ZONE'] = 'Time Zone';
$config['CAD_ADMIN_FIELDS_MESSAGE_FAILURE'] = 'Message After Course Failure';
$config['CAD_ADMIN_FIELDS_MESSAGE_COMPLETION'] = 'Message After Succsessful Course Completion';
$config['CAD_ADMIN_FIELDS_DASHBOARD_BASE_COLOR'] = 'Dashboard Base Color';
$config['CAD_ADMIN_FIELDS_LOCK_SYSTEM'] = 'Lock System';
$config['CAD_ADMIN_FIELDS_STRONG_PASSWORD'] = 'Enforce Strong Password';
$config['CAD_ADMIN_FIELDS_WEBSITE_NAME'] = 'Website SubDomain';
$config['CAD_ADMIN_FIELDS_DEFAULT_GROUP'] = 'Default Group';
$config['CAD_ADMIN_FIELDS_NOTIFICATIONS'] = 'Notifications';

$config['CAD_ADMIN_PLACEHOLDER_COMPANY_NAME'] = 'Website SubDomain';
$config['CAD_ADMIN_PLACEHOLDER_COMPANY_NAME2'] = 'Company Name';
$config['CAD_ADMIN_PLACEHOLDER_CONTENT'] = 'Content..';
$config['CAD_ADMIN_PLACEHOLDER_DASHBOARD_COLOR'] = 'Dashboard Base Color';
$config['CAD_ADMIN_PLACEHOLDER_COMPANY_LOGO'] = 'Company Logo';

$config['CAD_ADMIN_MSG_NAME'] = '* Please enter company name.';
$config['CAD_ADMIN_MSG_WEBSITE_NAME'] = '* Please enter website name.';
$config['CAD_ADMIN_MSG_VALID_WEBSITE_NAME'] = '* Please enter valid company subdomain.';
$config['CAD_ADMIN_MSG_DASHBOARD_COLOR'] = '* Please select color.';
$config['CAD_ADMIN_MSG_COURSE_COMPLETE'] = '* Please enter course completion message.';
$config['CAD_ADMIN_MSG_COURSE_FAILURE'] = '* Please enter course failure message';


//--------------- Login
$config['CAD_LOGIN_FIELDS_ADMIN_DASHBOARD'] = 'Administrator Dashboard';
$config['CAD_LOGIN_FIELDS_LOGIN_DASHBOARD'] = 'Login to Dashboard';
$config['CAD_LOGIN_FIELDS_FORGOT_PASSWORD'] = 'Forgot password?';
$config['CAD_LOGIN_FIELDS_SIGNUP'] = 'Signup';
$config['CAD_LOGIN_FIELDS_RESET_PASSWORD'] = 'Reset Password';
$config['CAD_LOGIN_FIELDS_REMEMBER_PASSWORD'] = 'Did you remember your password?';
$config['CAD_LOGIN_FIELDS_LOGIN'] = 'Login';
$config['CAD_LOGIN_FIELDS_WEBSITE_NAME'] = 'Website SubDomain';
$config['CAD_LOGIN_FIELDS_DEFAULT_GROUP'] = 'Default Group';
$config['CAD_LOGIN_FIELDS_NOTIFICATIONS'] = 'Notifications';

$config['CAD_LOGIN_PLACEHOLDER_EMAIL'] = 'Email';
$config['CAD_LOGIN_PLACEHOLDER_PASSWORD'] = 'Password';


//--------------- Sign Up
$config['CAD_SIGNUP_CCI_VALUE'] = 20;

$config['CAD_SIGNUP_FIELDS_ADMIN_DASHBOARD'] = 'Administrator Dashboard';
$config['CAD_SIGNUP_FIELDS_SIGNUP'] = 'Sign Up';
$config['CAD_SIGNUP_FIELDS_INFORMATION'] = 'Information';
$config['CAD_SIGNUP_FIELDS_1_MEMBERSHIP'] = '<span>1 </span> Membership Plan';
$config['CAD_SIGNUP_FIELDS_2_INFORMATION'] = '<span>2 </span> Information';
$config['CAD_SIGNUP_FIELDS_3_PAYMENT'] = '<span>3 </span> Payment';
$config['CAD_SIGNUP_FIELDS_USER'] = 'User';
$config['CAD_SIGNUP_FIELDS_USERS'] = 'Users';
$config['CAD_SIGNUP_FIELDS_COURSE'] = 'Course';
$config['CAD_SIGNUP_FIELDS_COURSES'] = 'Courses';
$config['CAD_SIGNUP_FIELDS_MEMBERSHIP_TYPE'] = 'Membership Type: ';
$config['CAD_SIGNUP_FIELDS_COMPANY_SUBDOMAIN'] = 'Your subdomain will be created like "<span class="website">Website_Subdomain</span>.raccoon.in"';
$config['CAD_SIGNUP_FIELDS_UPLOAD_LOGO'] = 'Upload Logo';
$config['CAD_SIGNUP_FIELDS_MEMBERSHIP_PLAN'] = 'Membership Plan';
$config['CAD_SIGNUP_FIELDS_CREDIT_CARD_INFO'] = 'Enter Your Credit Card Info';
$config['CAD_SIGNUP_FIELDS_CREDIT_NUMBER'] = 'Enter Credit Card Number';
$config['CAD_SIGNUP_FIELDS_EXPIRY_DATE'] = 'Expiry Date';

$config['CAD_SIGNUP_PLACEHOLDER_CVV'] = 'CVV';
$config['CAD_SIGNUP_PLACEHOLDER_EMAIL_ID'] = 'Email ID';
$config['CAD_SIGNUP_PLACEHOLDER_FNAME'] = 'First Name';
$config['CAD_SIGNUP_PLACEHOLDER_LNAME'] = 'Last name';
$config['CAD_SIGNUP_PLACEHOLDER_CNAME'] = 'Company Name';
$config['CAD_SIGNUP_PLACEHOLDER_WEBSITE_NAME'] = 'Website Subdomain';
$config['CAD_SIGNUP_PLACEHOLDER_CCN'] = 'Credit Card Number';


//--------------- Certification
$config['CAD_CERTIFI_HEADER_CERTIFICATION'] = 'Certifications';
$config['CAD_CERTIFI_HEADER_CERTIFICATION_by'] = 'Certifications by';
$config['CAD_CERTIFI_HEADER_USERS'] = 'Users';
$config['CAD_CERTIFI_HEADER_COURSES'] = 'Courses';

$config['CAD_CERTIFI_FIELDS_VERSION'] = 'Version';

$config['CAD_CERTIFI_MSG_CERTIFICATION_COURSE'] = '<div class="block-title"><h2 class="certification_header">Certifications</h2></div><h4 class="certification_body">'.$config['CAD_MSG_SELECT_COURSE'].'</h4><div class="row media-filter-items certificates"></div><div class="clearFix"></div>';

$config['CAD_CERTIFI_MSG_CERTIFICATION_USER'] = '<div class="block-title"><h2 class="certification_header">Certifications</h2></div><h4 class="certification_body">'.$config['CAD_MSG_SELECT_USER'].'</h4><div class="row media-filter-items certificates"></div><div class="clearFix"></div>';
$config['CAD_CERTIFI_MSG_CERTIFICATION_IMG'] = '<div class="block-title"><h2 class="certification_header">Certifications</h2></div><h4 class="certification_body">'.$config['CAD_OTHER_TABLE_LOADING_IMAGE4'].'</h4><div class="row media-filter-items certificates"></div><div class="clearFix"></div>';


$config['CAD_CERTIFI_PLACEHOLDER_SEARCH'] = 'Search';


//---------------- Course 
$config['CAD_COURSE_HEADER_COURSES_LIST'] = 'List of Courses';
$config['CAD_COURSE_HEADER_SORT_BY'] = 'Sort By';
$config['CAD_COURSE_HEADER_ALL_VERSIONS'] = 'Show All Versions';
$config['CAD_COURSE_HEADER_SWITCH_LIST_VIEW'] = 'Switch to List View';
$config['CAD_COURSE_HEADER_SWITCH_GRID_VIEW'] = 'Switch to Grid View';

$config['CAD_COURSE_FIELDS_CODE'] = 'Code';
$config['CAD_COURSE_FIELDS_VERSION'] = 'Version';
$config['CAD_COURSE_FIELDS_USERS'] = 'Users';
$config['CAD_COURSE_FIELDS_USERS2'] = 'Users:';
$config['CAD_COURSE_FIELDS_NAME'] = 'Name';
$config['CAD_COURSE_FIELDS_VERSION2'] = 'Version:';

$config['CAD_COURSE_MSG_DELETE_COURSE'] = 'Delete Course';
$config['CAD_COURSE_MSG_ALL_DELETE'] = 'Are you sure want to delete all the data associated with the course ?';
$config['CAD_COURSE_MSG_SEE_COURSES'] = 'See Courses';


//----------------- Dashboard
$config['CAD_DASHBOARD_FIELDS_USERS'] = 'Users';
$config['CAD_DASHBOARD_FIELDS_COURSES'] = 'Courses';
$config['CAD_DASHBOARD_FIELDS_IMGS'] = 'Images';
$config['CAD_DASHBOARD_FIELDS_VIDEOS'] = 'Videos';
$config['CAD_DASHBOARD_FIELDS_APPROVALS'] = 'Approvals';
$config['CAD_DASHBOARD_FIELDS_ACTIVITY'] = 'Activity';
$config['CAD_DASHBOARD_FIELDS_USER'] = 'User';
$config['CAD_DASHBOARD_FIELDS_COURSE'] = 'Course';
$config['CAD_DASHBOARD_FIELDS_IMG'] = 'Image';
$config['CAD_DASHBOARD_FIELDS_VIDEO'] = 'Video';
$config['CAD_DASHBOARD_FIELDS_APPROVAL'] = 'Approval';


//----------------- Groups
$config['CAD_GROUPS_HEADER_GROUPS'] = 'Groups';
$config['CAD_GROUPS_HEADER_COURSES'] = 'Courses';
$config['CAD_GROUPS_HEADER_USERS'] = 'Users';
$config['CAD_GROUPS_HEADER_COURSES_LIST'] = 'List of courses';
$config['CAD_GROUPS_HEADER_ADD_GROUP'] = 'Add Group';

$config['CAD_GROUPS_FIELDS_GROUPS_NAME'] = 'Group Name';
$config['CAD_GROUPS_FIELDS_HASH'] = '#';
$config['CAD_GROUPS_FIELDS_NO_OF_COURSES'] = 'No. of Courses';
$config['CAD_GROUPS_FIELDS_NO_OF_USERS'] = 'No. of Users';
$config['CAD_GROUPS_FIELDS_ADD_NEW_GROUP'] = 'Add New Group';
$config['CAD_GROUPS_FIELDS_CODE'] = 'Code';
$config['CAD_GROUPS_FIELDS_NAME'] = 'Name';
$config['CAD_GROUPS_FIELDS_USERS'] = 'Users';
$config['CAD_GROUPS_FIELDS_USERS2'] = 'Users:';
$config['CAD_GROUPS_FIELDS_VERSION'] = 'Version';
$config['CAD_GROUPS_FIELDS_NAME'] = 'Name';
$config['CAD_GROUPS_FIELDS_SURNAME'] = 'Surname';
$config['CAD_GROUPS_FIELDS_EMAIL'] = 'Email';
$config['CAD_GROUPS_FIELDS_ACTION'] = 'Action';
$config['CAD_GROUPS_FIELDS_PHOTO'] = 'Photo';
$config['CAD_GROUPS_FIELDS_CREATE_GROUP'] = 'Create Group';
$config['CAD_GROUPS_FIELDS_SORT_BY'] = 'Sort By';
$config['CAD_GROUPS_FIELDS_'] = '';

$config['CAD_GROUPS_MSG_NO_GROUP'] = 'Group list not found.';
$config['CAD_GROUPS_MSG_SELECT_GROUP_LIST'] = 'Please Select Group From Group List';

$config['CAD_GROUPS_PLACEHOLDER_GROUP_NAME'] = 'Group Name';
$config['CAD_GROUPS_PLACEHOLDER_SEARCH'] = 'Search';


// ---------------- Library 
$config['CAD_LIBRARY_HEADER_DELETE_VIDEO'] = 'Delete Video';
$config['CAD_LIBRARY_HEADER_DELETE_IMAGE'] = 'Delete Image';

$config['CAD_LIBRARY_MSG_UPLOAD_VALIDATION'] = '<div class="alert alert-danger">Please upload only .png, .jpeg and .jpg files.</div>';
$config['CAD_LIBRARY_MSG_UPLOAD_VALIDATION1'] = '<div class="alert alert-danger">* Maximum file size is 6MB. <br/>* File type .AVI or .MP4.</div>';
$config['CAD_LIBRARY_MSG_DELETE_VIDEO'] = 'Are you sure want to delete this video?';
$config['CAD_LIBRARY_MSG_DELETE_IMAGE'] = 'Are you sure want to delete this image?';


// ----------------- Report 
$config['CAD_REPORT_HEADER_FILTER'] = 'Filter';

$config['CAD_REPORT_FIELDS_USERS'] = 'Users';
$config['CAD_REPORT_FIELDS_ACTIVE_COURSES'] = 'Active Courses';
$config['CAD_REPORT_FIELDS_APPROVALS'] = 'Approvals';
$config['CAD_REPORT_FIELDS_COURSES_APPROVED'] = 'Courses Approved';
$config['CAD_REPORT_FIELDS_VIEWBY'] = 'View By:';
$config['CAD_REPORT_FIELDS_USER'] = 'User';
$config['CAD_REPORT_FIELDS_COURSES'] = 'Courses';
$config['CAD_REPORT_FIELDS_STATUS'] = 'Status';
$config['CAD_REPORT_FIELDS_GO'] = 'Go';
$config['CAD_REPORT_FIELDS_ACTIVE'] = 'Active';
$config['CAD_REPORT_FIELDS_PENDING'] = 'Pending';
$config['CAD_REPORT_FIELDS_FAILED'] = 'Failed';
$config['CAD_REPORT_FIELDS_ID'] = 'ID';
$config['CAD_REPORT_FIELDS_COURSE_NAME'] = 'Course Name';
$config['CAD_REPORT_FIELDS_COURSE_CODE'] = 'Course Code';
$config['CAD_REPORT_FIELDS_NAME'] = 'Name';
$config['CAD_REPORT_FIELDS_APPROVAL_DATE'] = 'Approval Date';
$config['CAD_REPORT_FIELDS_EMAIL'] = 'Email';
$config['CAD_REPORT_FIELDS_USER_STATUS'] = 'User Status';
$config['CAD_REPORT_FIELDS_INACTIVE'] = 'Inactive';
$config['CAD_REPORT_FIELDS_SELECT_DATE'] = 'Select Date';
$config['CAD_REPORT_FIELDS_ACTIVE_ONLY'] = 'Active Only';
$config['CAD_REPORT_FIELDS_INACTIVE_ONLY'] = 'Inactive Only';

$config['CAD_REPORT_MSG_DOWNLOAD'] = 'Download Report <br><small>(In CSV Formate)</small>';

$config['CAD_REPORT_PLACEHOLDER_SEARCH'] = 'Search';
$config['CAD_REPORT_PLACEHOLDER_COURSE_NAME'] = 'Course Name';
$config['CAD_REPORT_PLACEHOLDER_COURSE_CODE'] = 'Course Code';
$config['CAD_REPORT_PLACEHOLDER_FROM'] = 'From';
$config['CAD_REPORT_PLACEHOLDER_TO'] = 'tO';
$config['CAD_REPORT_PLACEHOLDER_'] = '';
$config['CAD_REPORT_PLACEHOLDER_'] = '';
$config['CAD_REPORT_PLACEHOLDER_'] = '';


// -------------- User 
$config['CAD_USER_FIELDS_NAME'] = 'Name *';
$config['CAD_USER_FIELDS_SURNAME'] = 'Surname *';
$config['CAD_USER_FIELDS_EMAIL'] = 'Email *';
$config['CAD_USER_FIELDS_DEPARTMENT'] = 'Department *';
$config['CAD_USER_FIELDS_PHONE'] = 'Phone *';
$config['CAD_USER_FIELDS_PASSWORD'] = 'Password *';
$config['CAD_USER_FIELDS_NEW_PASSWORD'] = 'New Password *';
$config['CAD_USER_FIELDS_CONFIRM_PASSWORD'] = 'Confirm Password *';
$config['CAD_USER_FIELDS_PERSONAL_INFO'] = 'Personal Information';
$config['CAD_USER_FIELDS_CHANGE_PASSWORD'] = 'Change Password';


$config['CAD_USER_HEADER_NAME'] = 'Name';
$config['CAD_USER_HEADER_SURNAME'] = 'Surname';
$config['CAD_USER_HEADER_EMAIL'] = 'Email';
$config['CAD_USER_HEADER_DEPARTMENT'] = 'Department';
$config['CAD_USER_HEADER_PHOTO'] = 'Photo';
$config['CAD_USER_HEADER_ACTIONS'] = 'Actions';
$config['CAD_USER_HEADER_LAST_ONLINE'] = 'Last Online';
$config['CAD_USER_HEADER_ADD_USERS'] = 'Add Users';
$config['CAD_USER_HEADER_EDIT_USER'] = 'Edit User';
$config['CAD_USER_HEADER_DELETE_USER'] = 'Delete User';
$config['CAD_USER_HEADER_DEACTIVATE_USER'] = 'Deactivate User';
$config['CAD_USER_HEADER_ACTIVATE_USER'] = 'Activate User';

$config['CAD_USER_MSG_DELETE'] = 'Are you sure want to delete all the data associated with this User ?';
$config['CAD_USER_MSG_DEACTIVE'] = 'Are you sure want to Deactivate this User ?';
$config['CAD_USER_MSG_ACTIVE'] = 'Are you sure want to Activate this User ?';
$config['CAD_USER_MSG_NO_USER_LIST'] = '<div class="block"><p class="text-center">'.$config['CAD_MSG_NO_USER'].'</p></div>';

$config['CAD_USER_PLACEHOLDER_SEARCH'] = 'Search';
$config['CAD_USER_PLACEHOLDER_NAME'] = 'Name';
$config['CAD_USER_PLACEHOLDER_SURNAME'] = 'Surname';
$config['CAD_USER_PLACEHOLDER_PHONE'] = 'Phone';
$config['CAD_USER_PLACEHOLDER_EMAIL'] = 'Email';
$config['CAD_USER_PLACEHOLDER_DEPARTMENT'] = 'Department';
$config['CAD_USER_PLACEHOLDER_PASSWORD'] = 'Password';
$config['CAD_USER_PLACEHOLDER_CONFIRM_PASSWORD'] = 'Confirm Password';
$config['CAD_USER_PLACEHOLDER_NEW_PASSWORD'] = 'New Password';

