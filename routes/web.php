<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UIController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\contentController;
use App\Http\Controllers\photoController;
use App\Http\Controllers\sectionController;
use App\Http\Controllers\vidoecontroller;
use App\Http\Controllers\quicklinkcontrller;
use App\Http\Controllers\frontpagecontroller;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\footerController;
use App\Http\Controllers\menuFormController;
use App\Http\Controllers\middleFormController;
use App\Http\Controllers\log;
use App\Http\Controllers\InnerpageController;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\IcmiRegistrationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|utes
*/

Route::get('/optimize-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'Optimized successfully';
});
Route::get('/key-generate', function() {
    $exitCode = Artisan::call('key:generate');
    return 'Key generated successfully';
});

Route::get('/vendor-publish', function() {
    $exitCode = Artisan::call('vendor:publish');
    return 'Vendor published successfully';
});




Route::get('/', function () { return view('welcome');});
Route::get('/refresh-captcha', [FormController::class, 'refreshCaptcha']);
Route::get('/set-language',[UIController::class,'SetLang']);
Route::get('/my-cms-mgmt',[UIController::class,'DBActions']);



//admin routes
Route::name('admin.')->namespace('Admin')->prefix('Accounts')->group(function(){
Route::match(['get','post'],'/',[AdminController::class,'Login'])->name('login');
Route::middleware(['Admin'])->group(function () {

Route::get('log-out',[AdminController::class,'Logout'])->name('logout');
Route::match(['get','post'],'change-password',[AdminController::class,'Change_Password'])->name('password-change');


//Route::middleware(['preventBackHistory'])->group(function () {


Route::middleware(['preventBackHistory','EnsureTokenIsValid'])->group(function () {
Route::get('dashboard', [AdminController::class,'Dashboard'])->name('dashboard');

    //Route::get('dashboard',[AdminController::class,'Dashboard'])->middleware('Admin')->name('dashboard');
Route::middleware(['CustomAuth'])->group(function () {   //audit log middleware



//------------------------------- contentController start  ---------------------------------------------------------//

//content page
Route::GET('/pages-list',[contentController::class,'View_Content']);
Route::get('/add-page',[contentController::class,'Add_Content']);
Route::post('/add-page-act',[contentController::class,'Add_Content_Submit']);
Route::get("/update-page/{id}",[contentController::class,"Update_Content"]);
Route::post('/update_page_act/{id}',[contentController::class,'Update_Content_Submit']);
Route::GET('/delete-page/{id}',[contentController::class,'Delete_Content']);
Route::get("/pages-list/{id}",[contentController::class,'Show_Content_Child']);
Route::get('view-content/{id?}',[contentController::class,'Show_Content'])->name('ViewContent');

//------------------------------- contentController end  ---------------------------------------------------------//


//------------------------------- gallerycontroller start  ---------------------------------------------------------//

//gallery controller
Route::get('view-gallery/{id?}',[photoController::class,'Show_Pgallery'])->name('Viewpgallery');
Route::get('/show_gallery',[photoController::class,'View_pgallery']);
Route::get('/add_gallery',[photoController::class,'Add_pgallery']);
Route::post('/addaction_gallery',[photoController::class,'Add_Pgallery_submit']);
Route::GET('/delete_galleryimage/{id}',[photoController::class,'Delete_Pgallery']);
Route::get('/updategallery/{id}',[photoController::class,'Update_pgallery']);
Route::post('/addaction_gallerypost/{id}',[photoController::class,'Update_Pgallery_submit']);

Route::post('/multimagePost',[photoController::class,'Add_Pgallery_Csubmit']);
Route::post('/multi_updte_gallery_data_submit/{id?}',[photoController::class,'Update_Pgallery_Csubmit']);
Route::GET('/delete_image/{id}',[photoController::class,'Delete_Pcgallery']);

//------------------------------- gallerycontroller end  ---------------------------------------------------------//


//------------------------------- videocontroller start  ---------------------------------------------------------//

//vidoe gallery
Route::get('/show_videogallery',[vidoecontroller::class,'View_Vgallery']);
Route::get('view-video/{id?}',[vidoecontroller::class,'Show_Vgallery'])->name('ViewVgallery');
Route::get('/add_videoget',[vidoecontroller::class,'Add_Vgallery']);
Route::post('/add_videopost',[vidoecontroller::class,'Add_Vgallery_Submit']);
Route::get('/update_videoget/{id}',[vidoecontroller::class,'Update_Vgallery']);
Route::post('/update_videopost/{id}',[vidoecontroller::class,'Update_Vgallery_Submit']);
Route::GET('/delete_vidoegallery/{id}',[vidoecontroller::class,'Delete_Vgallery']);
Route::post('/multivideopost',[vidoecontroller::class,'Add_Vgallery_Csubmit']);
Route::post('/updatemultivideopost/{id}',[vidoecontroller::class,'Update_Vgallery_Csubmit']);
Route::GET('/delete_vidoemultiplegallery/{id}',[vidoecontroller::class,'Delete_VCgallery']);

//ajax url
Route::get('/videodata', [vidoecontroller::class, 'videodata']);
Route::get('/multi_id',[vidoecontroller::class,'video_id']);


//------------------------------- videocontroller end  ---------------------------------------------------------//

//------------------------------- Quicklinkcontroller start  ---------------------------------------------------------//

//Quick link controller
Route::get('/show_link',[sectionController::class,'Show_Section']);
Route::get('/add_link',[sectionController::class,'Add_Section']);
Route::post('/add_link_action',[sectionController::class,'Add_Section_Submit']);
Route::get('/delete_link/{id}',[sectionController::class,'Delete_Section']);
Route::get('/update_link/{id}',[sectionController::class,'Update_Section']);
Route::post('/update_linkpost/{id}',[sectionController::class,'Update_Section_Submit']);


//------------------------------- Quicklinkcontroller end  ---------------------------------------------------------//


//----------------------------------------Admincontroller  start ----------------------------------------------//

//user Management
Route::get('manage-admin',[AdminController::class,'View_Admins'])->name('manageadmin');
Route::match(['get','post'],'add-edit-admin/{id?}',[AdminController::class,'Add_Admins'])->name('addadmin');
Route::get('delete-admin/{id}',[AdminController::class,'Delete_Admin']);
Route::match(['get','post'],'add-roles',[FormController::class,'Add_Roles'])->name('addRoles');
Route::get('manage-roles',[AdminController::class,'View_Roles'])->name('roles');
Route::get('delete-Role/{id}',[FormController::class,'Delete_Role']);
Route::match(['get','post'],'assign-role/{id}',[FormController::class,'Assign_Roles']);

//org member
Route::get('view-people-section/{id?}',[AdminController::class,'Show_OrganisationStructure']);
Route::match(['get','post'],'add-edit-people/{id?}',[AdminController::class,'Add_OrganisationStructure'])->name('addpeople');
Route::get('manage-people-section',[AdminController::class,'View_OrganisationStructure'])->name('people');
Route::post('manage-people-section',[AdminController::class,'View_OrganisationStructure'])->name('people');
Route::get('delete-people/{id}',[AdminController::class,'Delete_OrganisationStructure']);



//client logo
Route::match(['get','post'],'add-edit-file2url/{id?}',[AdminController::class,'Add_ClientLogo']);
Route::get('delete-file2url/{id?}',[AdminController::class,'Delete_ClientLogo']);
Route::get('file-to-url',[AdminController::class,'view_ClientLogo'])->name('filetourl');
Route::get('View-Client-logo/{id?}',[AdminController::class,'show_ClientLogo'])->name('ViewclientLogo');

//organisation details
Route::get('manage-organisation-detail',[AdminController::class,'View_OrganisationDetails'])->name('organisation');
Route::get('delete-org/{id}',[AdminController::class,'Delete_OrganisationDetails']);
Route::match(['get','post'],'add-edit-org/{id?}',[AdminController::class,'Add_OrganisationDetails'])->name('org');


//counter
Route::get('view_index/{id?}',[AdminController::class,'Show_Counter']);
Route::get('project_index/{id?}',[AdminController::class,'delete_Counter']);
Route::get('website-index',[AdminController::class,'View_Counter'])->name('websiteIndex');
Route::match(['get','post'],'add_edit_project_logo/{id?}',[AdminController::class,'add_edit_Counter']);

//banner
Route::get('view_banner/{id?}',[AdminController::class,'Show_banner']);
Route::get('manage-banners-sliders',[AdminController::class,'View_Banners'])->name('banners');
Route::match(['get','post'],'add-edit-banner/{id?}',[AdminController::class,'Add_Banners'])->name('addBanner');
Route::get('delete-banner/{id}',[AdminController::class,'Delete_Banners']);


//----------------------------------------Admincontroller  end ----------------------------------------------//

//-------------------------------------- middleFormController start ------------------------------------------------------------------//



//news & Events
Route::get('News-Event-delete/{id?}',[middleFormController::class,'delete_NewsEvent']);
Route::get('News-Event',[middleFormController::class,'View_NewsEvent']);
Route::match(['get','post'],'add-news-edit-org/{id?}',[middleFormController::class,'add_edit_NewsEvent']);
Route::get('View-News-Event/{id?}',[middleFormController::class,'show_NewsEvent']);

//industry
Route::get('view-industry/{id?}', [middleFormController::class, 'Show_industry'])->name('Show_industry');
Route::get('industry', [middleFormController::class, 'View_industry'])->name('industry');
Route::match(['get','post'],'add-industry/{id?}',[middleFormController::class,'add_edit_industry']);
Route::get('delete-industry/{id?}', [middleFormController::class, 'delete_industry']);



//-------------------------------------- middleFormController end ------------------------------------------------------------------//



//---------------------------------------- FooterController Start  -----------------------------------------------------------//


//press & media
Route::get('View_pressMedia/{id?}',[footerController::class,'Show_PressMedia']);
Route::get('press-media-delete/{id?}',[footerController::class,'Delete_pressMedia']);
Route::get('press-media',[footerController::class,'View_PressMedia']);
Route::match(['get','post'],'add-press-media-edit-org/{id?}',[footerController::class,'Add_Edit_PressMedia']);


//ANTI-RAGGING POLICY
Route::get("/show-ANTI-RAGGING/{id?}",[footerController::class,'Show_antiRagging']);
Route::get("/ANTI-RAGGING",[footerController::class,'View_antiRagging']);
Route::match(['get','post'],'add-edit-ANTI-RAGGING/{id?}',[footerController::class,'Add_Edit_antiRagging'])->name('AddEditantiRagging');
Route::get('delete-ANTI-RAGGING/{id}',[footerController::class,'Delte_antiRagging']);

//tender
Route::get("/show-tender/{id?}",[footerController::class,'Show_tender']);
Route::match(['get','post'],'add-edit-tender/{id?}',[footerController::class,'Add_Edit_tender']);
Route::get('viewtenders', [footerController::class, 'View_tender'])->name('viewtenders');
Route::get('delete-tender/{id?}',[footerController::class,'Delete_tender']);

//verdor
Route::get("/show-vender/{id?}",[footerController::class,'Show_vender']);
Route::get('vendordebarred', [footerController::class, 'View_vendor'])->name('vendordebarred');
Route::match(['get','post'],'add-edit-vendor/{id?}',[footerController::class,'Add_Edit_vendor']);
Route::get('delete-vendor/{id?}',[footerController::class,'Delete_vendor']);

//career
Route::get("/show-Career/{id?}",[footerController::class,'Show_career']);
Route::get('careershow', [footerController::class, 'View_Career'])->name('careershow');
Route::match(['get','post'],'add-edit-career/{id?}',[footerController::class,'Add_Edit_Career']);
Route::get('delete-career/{id?}',[footerController::class,'Delete_Career']);

//RIT module
Route::get("/RTI",[footerController::class,'view_RTI']);
Route::match(['get','post'],'add-edit-RTI/{id?}',[footerController::class,'Add_Edit_RTI'])->name('addRTI');
Route::get('delete-RTI/{id}',[footerController::class,'delete_RTI']);
Route::get('View-RTI/{id}',[footerController::class,'Show_RTI']);


//rti section 2
Route::post("/add-rit-pdf",[footerController::class,'Add_AnnualAudit_RTI']);
Route::post("/edit-rit-pdf/{id?}",[footerController::class,'Edit_AnnualAudit_RTI']);
Route::get("/Rti-Section",[footerController::class,'view_AnnualAudit_RTI']);
Route::get("/delete-rit-pdf/{id?}",[footerController::class,'Delete_AnnualAudit_RTI']);


//rti section Quarterly
Route::get("/view-rti",[footerController::class,'view_Quarter_RTI']);
Route::post("/add_rit",[footerController::class,'Add_Quarter_RTI']);
Route::post("/edit_rit/{id?}",[footerController::class,'Edit_Quarter_RTI']);
Route::get("/delete_rit/{id?}",[footerController::class,'Delete_Quarter_RTI']);


Route::get("/rti-pdfsection",[footerController::class,'pdf_section']);
Route::get("/rti-pdfsection",[footerController::class,'rit_QUARTER']);
Route::get("/rti-QUARTER-data",[footerController::class,'rti_QUARTER_data']);



//---------------------------------------- FooterController End  -----------------------------------------------------------//



//-------------------------------------  MenuFormController start -------------------------------------------------------------//


//oug journey
Route::get('view-journey/{id?}', [menuFormController::class, 'Show_journey'])->name('Show_industry');
Route::get('Org-journey/{id?}',[menuFormController::class,'Delete_journey']);
Route::get('Org-journey-index',[menuFormController::class,'View_journey'])->name('Viewjourney');
Route::match(['get','post'],'add-journey-edit-org/{id?}',[menuFormController::class,'Add_Edit_journey']);


//student council
Route::get("/student-council-view/{id?}",[menuFormController::class,'Show_studentCouncil']);
Route::get("/student-council",[menuFormController::class,'View_studentCouncil']);
Route::match(['get','post'],'add-edit-Student-Council/{id?}',[menuFormController::class,'Add_Edit_StudentCouncil'])->name('aadstudentcouncil');
Route::get('delete-studentcouncil/{id}',[menuFormController::class,'Delete_StudentCouncil']);

//Dissertation
Route::get("/dissertation-api",[AdminController::class,'dissertation_api']);
Route::get("/dissertation-view/{id?}",[menuFormController::class,'Show_dissertation']);
Route::get("/dissertation",[menuFormController::class,'View_dissertation']);
Route::match(['get','post'],'add-edit-dissertation/{id?}',[menuFormController::class,'Add_Edit_dissertation'])->name('aaddissertation');
Route::get('delete-dissertation/{id}',[menuFormController::class,'Delete_dissertation']);

//journal-publications
Route::get("/journal-publications",[menuFormController::class,'View_journalPublications']);
Route::match(['get','post'],'add-edit-journal-publications/{id?}',[menuFormController::class,'Add_Edit_journalPublications'])->name('aadstudentcouncil');
Route::get('delete-journal-publications/{id}',[menuFormController::class,'Delete_journalPublications']);
Route::get('view-journal-publications/{id}',[menuFormController::class,'show_journalPublications']);

//journal-publications-child
Route::get("/journal-publications-page/{id?}",[menuFormController::class,'View_journalPublications_Child']);
Route::match(['get','post'],'add-edit-journal-publications_page/{id?}',[menuFormController::class,'Add_Edit_journalPublications_Child'])->name('aadstudentcouncil');
Route::get('delete-journal-publications_page/{id}',[menuFormController::class,'Delete_journalPublications_child']);

// Wellness Facilities
Route::get("/Wellness-Facilities",[menuFormController::class,'View_WellnessFacilities']);
Route::match(['get','post'],'add-edit-Wellness-Facilities/{id?}',[menuFormController::class,'add_Edit_WellnessFacilities'])->name('addWellnessFacilities');
Route::get('delete-Wellness-Facilities/{id}',[menuFormController::class,'delete_WellnessFacilities']);
Route::get('View-Wellness-Facilities/{id}',[menuFormController::class,'show_WellnessFacilities']);


Route::post('Add-Wellness-image',[menuFormController::class,'add_WellnessImage']);
Route::post('edit-Wellness-image/{id?}',[menuFormController::class,'edit_WellnessImage']);
Route::get('wellness-facilities/{id}',[menuFormController::class,'view_WellnessImages']);
Route::get('delete-Wellness-image/{id}',[menuFormController::class,'delete_WellnessImages']);
Route::get('View-Wellness-Facilities-image/{id}',[menuFormController::class,'show_WellnessFacilitiesImage']);



//Events & Activites
Route::get("/show-Events-Activites/{id?}",[menuFormController::class,'Show_EventsActivites']);
Route::get('Event-Activites', [menuFormController::class,'View_EventsActivites'])->name('evnetActivites');
Route::match(['get','post'],'add-edit-EventsActivites/{id?}',[menuFormController::class,'Add_Event_EventsActivites']);
Route::get('delete-EventsActivites/{id?}',[menuFormController::class,'Delete_EventsActivites']);

Route::match(['get','post'],'add-edit-EventsActivites-image/{id?}',[menuFormController::class,'Add_Edit_EventActivity_Image']);
Route::get('delete-Event-image/{id?}', [menuFormController::class, 'Delete_Event_Image']);
Route::get('event-activities-image/{id?}', [menuFormController::class, 'View_EventActivety_image'])->name('eventactivities');
Route::get('event-activities-show/{id?}', [menuFormController::class, 'Show_EventActivety_image']);


Route::get('title-image/{id?}', [menuFormController::class,'title_image'])->name('title_image');



//report
Route::get("/show-report/{id?}",[menuFormController::class,'Show_report']);
Route::get('report', [menuFormController::class,'View_report'])->name('report');
Route::match(['get','post'],'add-edit-report/{id?}',[menuFormController::class,'Add_Event_report']);
Route::get('delete-report/{id?}',[menuFormController::class,'Delete_report']);

Route::get('ajax-report/{id?}',[menuFormController::class,'ajax_report']);

//research seminar
Route::get("/show-research-seminar/{id?}",[menuFormController::class,'Show_researchSeminar']);
Route::get('research-seminar', [menuFormController::class,'View_researchSeminar'])->name('researchSeminar');
Route::match(['get','post'],'add-edit-research-seminar/{id?}',[menuFormController::class,'Add_Event_researchSeminar']);
Route::get('delete-research-seminar/{id?}',[menuFormController::class,'Delete_researchSeminar']);

Route::get('ajax-research-seminar/{id?}',[menuFormController::class,'ajax_research_seminar']);
//-------------------------------------  MenuFormController  End -------------------------------------------------------------//


//cell
Route::match(['get','post'],'add-edit-cells/{id?}',[FormController::class,'Add_Edit_Cells'])->name('addcells');
Route::get('manage-cells',[FormController::class,'View_cells']);
Route::get('delete-cells/{id?}',[FormController::class,'Delete_cells'])->name('deletecells');
Route::get('view-Cell/{id?}',[FormController::class,'Show_Cell'])->name('Show_Cell');

Route::get('cells-images-delete/{id?}',[FormController::class,'Delete_cellsImage']);
Route::post('add-cells-image', [FormController::class, 'add_cellsImage']);
Route::post('edit-cells-image/{id?}',[FormController::class,'Edit_cellsImage']);
Route::get('cells-image/{id?}', [FormController::class, 'View_cellsImage']);

//club
Route::get('manage-clubs',[FormController::class,'view_club']);
Route::get('delete-club/{id?}',[FormController::class,'Delete_Club'])->name('deleteclub');
Route::match(['get','post'],'add-edit-club/{id?}',[FormController::class,'add_Edit_club'])->name('addclub');
Route::get('view-club/{id?}',[FormController::class,'Show_Club'])->name('Show_Club');

Route::get('club-images-delete/{id?}',[FormController::class,'Delete_clubImage']);
Route::post('add-club-image', [FormController::class, 'add_ClubImage']);
Route::get('club-image/{id?}', [FormController::class, 'View_clubImage']);
Route::post('edit-club-image/{id?}',[FormController::class,'edit_clubImage']);


//committee
Route::match(['get','post'],'add-edit-committee/{id?}',[FormController::class,'add_Edit_Committee'])->name('addcommittee');
Route::get('delete-committee/{id?}',[FormController::class,'Delete_Committee'])->name('deletecommittee');
Route::get('manage-committee',[FormController::class,'view_Committee']);
Route::get('view-Committee/{id?}',[FormController::class,'Show_Committee'])->name('Show_Committee');

Route::get('committee-images-delete/{id?}',[FormController::class,'delete_committeeImage']);
Route::post('add-committee-image', [FormController::class, 'add_CommitteeImage']);
Route::post('edit-committee-image/{id?}',[FormController::class,'edit_committeeImage']);
Route::get('committee-image/{id?}', [FormController::class, 'View_committeeImage']);


//ajax
Route::get('event-activity', [FormController::class,'event_activity_show']);
Route::get('student-list',[FormController::class, 'student_list']);
Route::get('journal_id', [FormController::class, 'journal_id']);
Route::get('journal-publications-list', [FormController::class, 'journal_publications_list']);
Route::get("/Wellness_Facilities-id",[FormController::class,'Wellness_Facilities_index_id']);
Route::get('Wellness-Facilities-id', [FormController::class, 'Wellness_Facilities_id']);
          //manage clube commite cells
Route::get('gallery_id_image',[FormController::class,'gallery_id_image']);
Route::get('club_id_image',[FormController::class,'club_id_image']);
Route::get('committee-id-image',[FormController::class,'committee_id_image']);
Route::get('cells', [FormController::class, 'cells_list']);






//AdminController  ajax

Route::get('/Department_info',[AdminController::class,'Department_info']);
Route::get('journey-value', [AdminController::class, 'journey_value']);
Route::get('student-list',[FormController::class, 'student_list']);
//ajax photo galleryfv
Route::get('/photodata', [photoController::class, 'photodata']);
Route::GET('/multdelete_image/{id?}',[photoController::class,'multdelete_image']);
Route::get('/updatedelete_image/{id?}',[photoController::class,'updategalleryimage']);
Route::get('gallery_id',[photoController::class,'gallery_id']);
//some more content page
Route::get('/dropdown', [contentController::class, 'indexdropdown']);  // content page value shair in dropdown box
Route::GET('/pagesinput',[contentController::class,'pagesinput']);
Route::get('/deletedata',[contentController::class,'deletedata']);
Route::GET('/restored/{id}',[contentController::class,'restored']);
Route::get('/show',[contentController::class,'firstshow']);

//By Vishal routes for add student profile

Route::get('/Manage-students-profile',[StudentProfileController::class,'view_profile']);
Route::get('/add-students-profile',[StudentProfileController::class,'add_profile']);
Route::post('/add-students-profile',[StudentProfileController::class,'add_student_profile']);
Route::get('/show-profile',[StudentProfileController::class,'show_front_profile']);

Route::get('/view-students-type',[StudentProfileController::class,'view_profile_type']);
Route::get('/add-students-type',[StudentProfileController::class,'add_student_type']);
Route::post('/add-students-type',[StudentProfileController::class,'add_student_type_form']);
Route::get('/update-student-profile-type/{id}',[StudentProfileController::class,'edit_student_profile_type']);
Route::post('/update-student-profile-type/{id}',[StudentProfileController::class,'update_student_profile_type']);
Route::get('/delete-student-profile-type/{id}',[StudentProfileController::class,'delete_student_profile_type']);

Route::get('/update-student-profile/{id}',[StudentProfileController::class,'edit_student_profile']);
Route::post('/update-student-profile/{id}',[StudentProfileController::class,'update_student_profile']);
Route::get('/delete-student-profile/{id}',[StudentProfileController::class,'delete_student_profile']);



//Route::get('/view-students-profile',[StudentProfileController::class,'view_profile']);
//Route::get('/add-students-profile',[StudentProfileController::class,'add_profile']);
//Route::post('/add-students-profile',[StudentProfileController::class,'add_student_profile']);
//Route::get('/show-profile',[StudentProfileController::class,'show_front_profile']);
//
//Route::get('/update-student-profile/{id}',[StudentProfileController::class,'edit_student_profile']);
//Route::post('/update-student-profile/{id}',[StudentProfileController::class,'update_student_profile']);
//Route::get('/delete-student-profile/{id}',[StudentProfileController::class,'delete_student_profile']);




//feedback form & contact us form
Route::GET('sc-st-obc-list',[FormController::class,'View_scstobc']);

Route::GET('feedback',[FormController::class,'feedback']);



//Auth log  route
Route::GET('/Audit-data-show',[log::class,'datefillerdata']);
Route::post('/Audit-data-show',[log::class,'datefillerdata']);
Route::post('/Audit-data-show-with-filter',[log::class,'datefiller']);
Route::get('/download_zip',[log::class, 'download_zip']);
Route::get('/ajax_log_table',[log::class, 'ajax_log_table']);

//svc file download
Route::get('/file-export', [log::class, 'fileExport']);





//blog section controller ,student
// Route::get('/add_blog',[blogcontroller::class,'add_blog_content_page']);
// Route::post('/add_blog',[blogcontroller::class,'blog_content_data_submit']);
// Route::get('/show_blog',[blogcontroller::class,'show_blog_page_list']);
// Route::get('/update_blog/{id}',[blogcontroller::class,'update_blog_content_page']);
// Route::post('/update_blogpost/{id}',[blogcontroller::class,'update_blog_content_data_submit']);
// Route::get('/delete_blog/{id}',[blogcontroller::class,'delete_blog_data']);
// Route::get('/blogdata', [blogcontroller::class, 'blogdata']);

// Route::get('student-list',[FormController::class, 'student_list']);
// Route::get("/student-council",[FormController::class,'student_council_index']);
// Route::match(['get','post'],'add-edit-Student-Council/{id?}',[FormController::class,'Add_student_council'])->name('aadstudentcouncil');
// Route::get('delete-studentcouncil/{id}',[FormController::class,'Delete_studentcouncil']);






// Route::get('manage-options-master',[AdminController::class,'View_OptionMaster'])->name('optionsmaster');
//menu part
Route::get('/submenushow',[AdminController::class,'submenushow']);
Route::get('manage-main-menu',[AdminController::class,'View_Menus'])->name('menusetting');
Route::match(['get','post'],'add-edit-menu/{id?}',[AdminController::class,'Add_Menu']);
Route::match(['get','post'],'add-edit-sub-menu/{id?}',[AdminController::class,'Add_SubMenu']);
Route::match(['get','post'],'add-edit-child-menu/{id?}',[AdminController::class,'Add_childMenu']);
Route::get('delete-quicklink/{id}',[AdminController::class,'Delete_QuickLink']);
Route::get('manage-quick-links',[AdminController::class,'View_QuickLinks'])->name('quicklink');
Route::post('manage-quick-links',[AdminController::class,'View_QuickLinks'])->name('quicklink');
Route::match(['get','post'],'add-edit-quicklink/{id?}',[AdminController::class,'Add_QuickLink']);

Route::get('manage-people-department',[FormController::class,'View_department'])->name('people_department');


Route::get('change-status/{status}/{id}',[AdminController::class,'Admin_StatusChange']);
Route::match(['get','post'],'assign-role/{id}',[FormController::class,'Assign_Roles']);


Route::get('menu-status-change/{type}/{id}/{status}',[AdminController::class,'Menu_StatusChange']);
Route::get('status-change/{status}/{id}/{db}',[AdminController::class,'StatusChange']);

Route::get('/Department_info',[AdminController::class,'Department_info']);
Route::match(['get','post'],'add-edit-sub-child-menu/{id?}',[AdminController::class,'add_sub_child_menu'])->name('addsubchilmenu');
Route::get('/childmenushow',[AdminController::class,'childmenushow']);
Route::get('/childmenushowid',[AdminController::class,'childmenushowid']);


//profile section url
Route::get("/manage-people-profile/{id?}",[FormController::class,'view_biography']);
Route::match(['get','post'],'add-edit-profile/{id?}',[FormController::class,'Add_biography'])->name('add_biography');
Route::get('delete-profile/{id}',[FormController::class,'Delete_biography']);




Route::match(['get','post'],'permissions/{id}',[FormController::class,'Add_Permissions']);

//super admin part
Route::get('manage-site-setting',[AdminController::class,'View_SiteSetting'])->name('sitesetting');
Route::match(['get','post'],'Add-Edit-site-setting/{id?}',[AdminController::class,'Add_SiteSetting']);
Route::match(['get','post'],'add-headers',[UIController::class,'Add_Topbar'])->name('addtopbar');
Route::match(['get','post'],'add-footers',[UIController::class,'Add_Footbar'])->name('addfooter');


Route::get('delete-department/{id}',[FormController::class,'Delete_department']);
Route::get('delete-announcements/{id}',[FormController::class,'Delete_Announcement']);
Route::get('delete-optionsmaster/{id}',[AdminController::class,'Delete_OptionMaster']);
// Route::get('delete-banner/{id}',[AdminController::class,'Delete_Banners']);
Route::get('delete-usp/{id}',[AdminController::class,'Delete_USP']);





//some route
Route::get('manage-headers',[UIController::class,'MTopBar'])->name('topbar');
Route::get('manage-banners-sliders',[AdminController::class,'View_Banners'])->name('banners');
Route::get('manage-banners-sliders_detail',[AdminController::class,'View_Banners_detail']);
Route::match(['get','post'],'add-edit-bannerdetail/{id?}',[AdminController::class,'Add_Banners_detail']);
Route::get(' Delete_Banners_detail/{id}',[AdminController::class,' Delete_Banners_detail']);
Route::get('manage-usps',[AdminController::class,'View_USPs'])->name('usp');
Route::get('manage-home-sliders',[UIController::class,'MSliderH'])->name('homeslider');
Route::get('manage-home-about',[UIController::class,'MAboutH'])->name('homeabout');
Route::get('manage-footers',[UIController::class,'MFooterS'])->name('footer');
Route::get('manage-usp-section',[UIController::class,'MUSP'])->name('usps');
Route::get('manage-upcoming-section',[UIController::class,'MUPC'])->name('upcoming');
Route::get('manage-gallery-section',[UIController::class,'MHG'])->name('homegallery');
Route::get('manage-announcement-section',[FormController::class,'View_Announcements'])->name('announcements');
Route::match(['get','post'],'add-edit-file2url',[UIController::class,'Add_F2U']);
Route::get('delete-file2url/{id}',[UIController::class,'Delete_F2U']);



// Route::get('file-to-url',[UIController::class,'FileToURL'])->name('filetourl');
// Route::match(['get','post'],'create-database',[AdminController::class,'Create_DataBase']);
// Route::match(['get','post'],'add-edit-banner/{id?}',[AdminController::class,'Add_Banners'])->name('addBanner');

Route::match(['get','post'],'add-edit-announcements/{id?}',[FormController::class,'Add_Announcement'])->name('addAnnouncement');
Route::match(['get','post'],'add-edit-optionsmaster/{id?}',[AdminController::class,'Add_OptionMaster'])->name('addOptionMaster');
Route::match(['get','post'],'add-edit-usp/{id?}',[AdminController::class,'Add_USP']);
Route::match(['get','post'],'add-siders',[UIController::class,'Add_MSlider'])->name('addmidbar');
Route::match(['get','post'],'add-home-about',[UIController::class,'Add_AboutH'])->name('addabout_h');
Route::match(['get','post'],'add-home-upcoming',[UIController::class,'Add_PCH'])->name('addupcoming');
Route::match(['get','post'],'add-home-gallery',[UIController::class,'Add_HG'])->name('addhomegallery');
Route::match(['get','post'],'add-home-usp',[UIController::class,'Add_USP'])->name('addusp');

Route::match(['get','post'],'add-edit-department/{id?}',[FormController::class,'Add_department'])->name('add_department');
// Route::match(['get','post'],'add-edit-file2url/{id?}',[UIController::class,'Add_F2U']);
Route::get('delete-file2url/{id}',[UIController::class,'Delete_F2U']);


Route::post('form-creation',[UIController::class,'CreateForm']);
Route::match(['get','post'],'dynamic-form',[UIController::class,'CForm']);



//my code



});
});
});


Route::match(['get','post'],'forgot-password',[AdminController::class,'ForgotPSW'])->name('forgotpsw');
Route::post('/from',[frontpagecontroller::class,'front_form']);
Route::get('/student-profile-more-info/{id}',[StudentProfileController::class,'front_profile_show_more']);
//forget password




});
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::post('sc-st-obc',[InnerpageController::class,'sc_st_obc']);
Route::get('registeration',[IcmiRegistrationController::class,'registeration']);
//website search
Route::post('search',[InnerpageController::class,'search']);

Route::get('/{slug?}/archive',[InnerpageController::class,'archive']);

//Monu Routes
// Career
Route::get('/career',[InnerpageController::class,'career']);
// Tenders
Route::get('/tenders',[InnerpageController::class,'Tenders']);
// Vendors Debarred
Route::get('/Vendors-Debarred',[InnerpageController::class,'Vendors_Debarred']);
//RTI
Route::get('/rti',[InnerpageController::class,'RTI_view']);
//journal publication
Route::get('journal/{id?}', [InnerpageController::class, 'journal_detail']);
//anti-raggings policy
Route::get('anti-ragging', [InnerpageController::class, 'anti_raggings']);
//press & media
Route::get('/press-media',[InnerpageController::class,'press_media']);
//news-media
Route::get('/news-media',[InnerpageController::class,'news_media']);
Route::get('/press-media',[InnerpageController::class,'press_media']);
Route::get('/news-media',[InnerpageController::class,'news_media']);
Route::get('/industry-connect',[InnerpageController::class,'Industry_Connect']);
Route::get('event-activity-image/{id?}',[InnerpageController::class,'event_activity_image']);
//screen_reader_access
Route::get('/screen_reader_access',[InnerpageController::class,'screen_reader_access']);
//site map routes
Route::get('/sitemap',[InnerpageController::class,'sitemap']);
//feedback form
Route::get('/feedback',[InnerpageController::class,'feedback_page']);
Route::post('/add_feedback',[InnerpageController::class,'add_feedback']);

 //gallery section
Route::get('/photo-gallery',[InnerpageController::class,'photo_multi_Innerpage']);
//video section
Route::get('/video-gallery',[InnerpageController::class,'video_multi_Innerpage']);
//main menu inner page
Route::get('{slug?}',[InnerpageController::class,'Menu_barInnerpage']);
//sub menu inner page
Route::get('{main_slug?}/{slug?}',[InnerpageController::class,'sub_barInnerpage']);
//Child menu inner page
Route::get('{main_slug?}/{Sub_slug?}/{slug?}',[InnerpageController::class,'Child_barInnerpage']);

Route::get('{main_slug}/{slug}/{subchild}/{superchild}',[InnerpageController::class,'sub_childInnerpage']);
//department function
Route::get('/Add_Department',[InnerpageController::class,'Add_Department']);
//error routes
Route::get('/Errors_route',[InnerpageController::class,'Errors_route']);
//Archive list
Route::GET('/Tander-data-show',[InnerpageController::class,'Tander_data']);
//countact us
Route::get('/contact-us',[InnerpageController::class,'contact_page']);
Route::post('/add_contact',[InnerpageController::class,'add_contact']);



