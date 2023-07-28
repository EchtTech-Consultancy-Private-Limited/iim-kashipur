<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UIController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\pagecontroller;
use App\Http\Controllers\gallaycontroller;
use App\Http\Controllers\vidoecontroller;
use App\Http\Controllers\quicklinkcontrller;
use App\Http\Controllers\frontpagecontroller;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\blogcontroller;
use App\Http\Controllers\log;
use App\Http\Controllers\InnerpageController;
use App\Http\Controllers\StudentProfileController;


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
Route::get('dashboard',[AdminController::class,'Dashboard'])->name('dashboard');
Route::get('log-out',[AdminController::class,'Logout'])->name('logout');
Route::match(['get','post'],'change-password',[AdminController::class,'Change_Password'])->name('password-change');


//By Vishal routes for add student profile

Route::get('/view-students-profile',[StudentProfileController::class,'view_profile']);
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

Route::get('project_index/{id?}',[AdminController::class,'project_index']);
Route::get('website-index',[AdminController::class,'website_index'])->name('website_index');
Route::match(['get','post'],'add_edit_project_logo/{id?}',[AdminController::class,'add_edit_project_logo']);
//my code

//manage clube commite cells
Route::post('edit-cells-image/{id?}',[FormController::class,'edit_cells_image']);
Route::get('gallery_id_image',[FormController::class,'gallery_id_image']);
Route::get('club_id_image',[FormController::class,'club_id_image']);
Route::post('edit-club-image/{id?}',[FormController::class,'edit_club_image']);
Route::get('committee-id-image',[FormController::class,'committee_id_image']);
Route::post('edit-committee-image/{id?}',[FormController::class,'edit_committee_image']);
//manage clube commite cells



Route::middleware(['CustomAuth'])->group(function () {


//feedback form & contact us form
Route::GET('Countact-us',[FormController::class,'countact_us']);
Route::GET('feedback',[FormController::class,'feedback']);


//Auth log  route
Route::GET('/Audit-data-show',[log::class,'datefillerdata']);
Route::post('/Audit-data-show',[log::class,'datefillerdata']);
Route::post('/Audit-data-show-with-filter',[log::class,'datefiller']);
Route::get('/download_zip',[log::class, 'download_zip']);
Route::get('/ajax_log_table',[log::class, 'ajax_log_table']);

//svc file download
Route::get('/file-export', [log::class, 'fileExport']);


//Quick link controller
Route::get('/show_link',[quicklinkcontrller::class,'show_link']);
Route::get('/add_link',[quicklinkcontrller::class,'add_link']);
Route::post('/add_link_action',[quicklinkcontrller::class,'add_link_action']);
Route::get('/delete_link/{id}',[quicklinkcontrller::class,'delete_link']);
Route::get('/update_link/{id}',[quicklinkcontrller::class,'update_link']);
Route::post('/update_linkpost/{id}',[quicklinkcontrller::class,'update_linkpost']);


//blog section controller
Route::get('/add_blog',[blogcontroller::class,'add_blog_content_page']);
Route::post('/add_blog',[blogcontroller::class,'blog_content_data_submit']);
Route::get('/show_blog',[blogcontroller::class,'show_blog_page_list']);
Route::get('/update_blog/{id}',[blogcontroller::class,'update_blog_content_page']);
Route::post('/update_blogpost/{id}',[blogcontroller::class,'update_blog_content_data_submit']);
Route::get('/delete_blog/{id}',[blogcontroller::class,'delete_blog_data']);
Route::get('/blogdata', [blogcontroller::class, 'blogdata']);

//gallery controller
Route::get('/show_gallery',[gallaycontroller::class,'show_gallery_data_list']);
Route::get('/add_gallery',[gallaycontroller::class,'add_gallery_data_page']);
Route::post('/addaction_gallery',[gallaycontroller::class,'add_gallery_data_submit']);
Route::GET('/delete_galleryimage/{id}',[gallaycontroller::class,'delete_gallery_data']);
Route::get('/updategallery/{id}',[gallaycontroller::class,'update_gallery_data']);
Route::post('/addaction_gallerypost/{id}',[gallaycontroller::class,'update_gallery_data_submit']);
Route::get('/photodata', [gallaycontroller::class, 'photodata']);

//multiple update modal image
Route::post('/multimagePost',[gallaycontroller::class,'multiple_image_submit']);
Route::post('/multi_updte_gallery_data_submit/{id?}',[gallaycontroller::class,'multi_updte_gallery_data_submit']);
Route::GET('/multdelete_image/{id?}',[gallaycontroller::class,'multdelete_image']);
Route::GET('/delete_image/{id}',[gallaycontroller::class,'multi_delete_image_data']);
Route::get('/updatedelete_image/{id?}',[gallaycontroller::class,'updategalleryimage']);
Route::get('gallery_id',[gallaycontroller::class,'gallery_id']);

//vidoe gallery
Route::get('/show_videogallery',[vidoecontroller::class,'show_videogallery']);
Route::get('/add_videoget',[vidoecontroller::class,'add_videoget']);
Route::post('/add_videopost',[vidoecontroller::class,'add_videopost']);
Route::get('/update_videoget/{id}',[vidoecontroller::class,'update_videoget']);
Route::post('/update_videopost/{id}',[vidoecontroller::class,'update_videopost']);
Route::post('/multivideopost',[vidoecontroller::class,'multivideopost']);
Route::post('/updatemultivideopost/{id}',[vidoecontroller::class,'updatemultivideopost']);
Route::GET('/delete_vidoegallery/{id}',[vidoecontroller::class,'delete_vidoegallery']);
Route::GET('/delete_vidoemultiplegallery/{id}',[vidoecontroller::class,'delete_vidoemultiplegallery']);
Route::get('/videodata', [vidoecontroller::class, 'videodata']);
Route::get('/multi_id',[vidoecontroller::class,'video_id']);

//Sanchit Routes
Route::match(['get','post'],'add-edit-tender/{id?}',[FormController::class,'add_tender']);
Route::get('viewtenders', [FormController::class, 'viewtenders'])->name('viewtenders');
Route::get('delete-tender/{id?}',[FormController::class,'delete_tender']);

Route::get('vendordebarred', [FormController::class, 'vendordebarred'])->name('vendordebarred');
Route::match(['get','post'],'add-edit-vendor/{id?}',[FormController::class,'vendoradd']);
Route::get('delete-vendor/{id?}',[FormController::class,'delete_vendor']);

Route::get('careershow', [FormController::class, 'careershow'])->name('careershow');
Route::match(['get','post'],'add-edit-career/{id?}',[FormController::class,'add_career']);
Route::get('delete-career/{id?}',[FormController::class,'delete_career']);

//Routes by Sanchit
Route::get('title', [FormController::class, 'title'])->name('title');
Route::match(['get','post'],'add-edit-title/{id?}',[FormController::class,'add_title']);
Route::get('delete-title/{id?}',[FormController::class,'delete_title']);
Route::get('title-image/{id?}', [FormController::class, 'title_image'])->name('title_image');
Route::match(['get','post'],'add-titleimage/{id?}',[FormController::class,'add_image']);
Route::get('delete-imagetitle/{id?}', [FormController::class, 'delete_image']);
Route::get('eventactivities/{id?}', [FormController::class, 'eventactivities'])->name('eventactivities');
Route::get('industry/{id?}', [FormController::class, 'industry'])->name('industry');
Route::match(['get','post'],'add-industry/{id?}',[FormController::class,'add_industry']);
Route::get('delete-industry/{id?}', [FormController::class, 'delete_industry']);

Route::get('event-activity', [FormController::class,'event_activity_show']);

//content page
Route::get('/add-page',[pagecontroller::class,'add_content_page']);
Route::post('/add-page-act',[pagecontroller::class,'add_content_page_submit']);
Route::GET('/delete-page/{id}',[pagecontroller::class,'delete_content_page']);
Route::get("/update-page/{id}",[pagecontroller::class,"update_content_page"]);
Route::post('/update_page_act/{id}',[pagecontroller::class,'update_content_page_submit']);
Route::GET('/pages-list',[pagecontroller::class,'content_pages_list']);
Route::get("/pages-list/{id}",[pagecontroller::class,'content_pages_post']);

//some more content page
Route::get('/Department_info',[AdminController::class,'Department_info']);
Route::get('/dropdown', [pagecontroller::class, 'indexdropdown']);  // content page value shair in dropdown box
Route::GET('/pagesinput',[pagecontroller::class,'pagesinput']);
Route::get('/deletedata',[pagecontroller::class,'deletedata']);
Route::GET('/restored/{id}',[pagecontroller::class,'restored']);
Route::get('/show',[pagecontroller::class,'firstshow']);


//Routes for Clubs,commiittees, About us, Journey Start
Route::post('add-cells-image', [FormController::class, 'add_cells_image']);
Route::post('add-committee-image', [FormController::class, 'add_Committee_image']);
Route::post('add-club-image', [FormController::class, 'add_club_image']);
Route::get('cells-image/{id?}', [FormController::class, 'cells_image']);
Route::get('committee-image/{id?}', [FormController::class, 'committee_image']);
Route::get('club-image/{id?}', [FormController::class, 'club_image']);
Route::get('cells-images-delete/{id?}',[FormController::class,'delete_cells_image']);
Route::get('committee-images-delete/{id?}',[FormController::class,'delete_committee_image']);
Route::get('club-images-delete/{id?}',[FormController::class,'delete_club_image']);


Route::get('cells', [FormController::class, 'cells_list']);
Route::get('manage-cells',[FormController::class,'view_cells']);
Route::get('delete-cells/{id?}',[FormController::class,'delete_cells'])->name('deletecells');
Route::get('manage-clubs',[FormController::class,'view_club']);
Route::get('delete-club/{id?}',[FormController::class,'delete_club'])->name('deleteclub');
Route::get('manage-committee',[FormController::class,'view_committee']);
Route::get('delete-committee/{id?}',[FormController::class,'delete_committee'])->name('deletecommittee');
Route::match(['get','post'],'add-edit-club/{id?}',[FormController::class,'add_club'])->name('addclub');
Route::match(['get','post'],'add-edit-committee/{id?}',[FormController::class,'add_committee'])->name('addcommittee');
Route::match(['get','post'],'add-edit-cells/{id?}',[FormController::class,'add_cells'])->name('addcells');
//Routes for Clubs,commiittees End

//Organization Journey Routes Start
//oug journey
Route::get('journey-value', [AdminController::class, 'journey_value']);
Route::get('Org-journey/{id?}',[AdminController::class,'Org_journey']);
Route::get('Org-journey-index',[AdminController::class,'Org_journey_index'])->name('Org_journey_index');
Route::match(['get','post'],'add-journey-edit-org/{id?}',[AdminController::class,'add_journey_edit_org']);
//oug journey
//Organization Journey Routes End

//news & Events
Route::get('News-Event-delete/{id?}',[AdminController::class,'News_Event_delete']);
Route::get('News-Event',[AdminController::class,'News_Event_index']);
Route::match(['get','post'],'add-news-edit-org/{id?}',[AdminController::class,'add_news_edit_org']);

//press & media
Route::get('press-media-delete/{id?}',[AdminController::class,'press_media_delete']);
Route::get('press-media',[AdminController::class,'press_media_index']);
Route::match(['get','post'],'add-press-media-edit-org/{id?}',[AdminController::class,'add_press_media_edit_org']);

//Monu - Student,Journal, Wellness, Faculty
//student council
Route::get('student-list',[FormController::class, 'student_list']);
Route::get("/student-council",[FormController::class,'student_council_index']);
Route::match(['get','post'],'add-edit-Student-Council/{id?}',[FormController::class,'Add_student_council'])->name('aadstudentcouncil');
Route::get('delete-studentcouncil/{id}',[FormController::class,'Delete_studentcouncil']);


//student council
Route::get('student-list',[FormController::class, 'student_list']);
Route::get("/student-council",[FormController::class,'student_council_index']);
Route::match(['get','post'],'add-edit-Student-Council/{id?}',[FormController::class,'Add_student_council'])->name('aadstudentcouncil');
Route::get('delete-studentcouncil/{id}',[FormController::class,'Delete_studentcouncil']);

//journal-publications
Route::get('student-list',[FormController::class, 'student_list']);
Route::get("/journal-publications",[FormController::class,'journal_publications_index']);
Route::match(['get','post'],'add-edit-journal-publications/{id?}',[FormController::class,'Add_journal_publications'])->name('aadstudentcouncil');
Route::get('delete-journal-publications/{id}',[FormController::class,'Delete_journal_publications']);

//journal-publications-child
Route::get("/journal-publications-page/{id?}",[FormController::class,'journal_publications_page_index']);
Route::match(['get','post'],'add-edit-journal-publications_page/{id?}',[FormController::class,'Add_journal_publications_page'])->name('aadstudentcouncil');
Route::get('delete-journal-publications_page/{id}',[FormController::class,'Delete_journal_publications_page']);

Route::get('journal_id', [FormController::class, 'journal_id']);

Route::get('journal-publications-list', [FormController::class, 'journal_publications_list']);

//ANTI-RAGGING POLICY
Route::get('student-list',[FormController::class, 'student_list']);
Route::get("/ANTI-RAGGING",[FormController::class,'ANTI_RAGGING_index']);
Route::match(['get','post'],'add-edit-ANTI-RAGGING/{id?}',[FormController::class,'add_ANTI_RAGGING'])->name('addANTIRAGGING');
Route::get('delete-ANTI-RAGGING/{id}',[FormController::class,'delete_ANTI_RAGGING']);



//11 july Wellness Facilities
Route::get("/Wellness-Facilities",[FormController::class,'Wellness_Facilities_Index']);
Route::match(['get','post'],'add-edit-Wellness-Facilities/{id?}',[FormController::class,'add_Wellness_Facilities'])->name('addWellnessFacilities');
Route::get('delete-Wellness-Facilities/{id}',[FormController::class,'delete_Wellness_Facilities']);
Route::post('Add-Wellness-image',[FormController::class,'add_Wellness_image']);
Route::post('edit-Wellness-image/{id?}',[FormController::class,'edit_Wellness_image']);
Route::get('wellness-facilities/{id}',[FormController::class,'Wellness_index']);
Route::get('delete-Wellness-image/{id}',[FormController::class,'delete_Wellness_index']);
Route::get("/Wellness_Facilities-id",[FormController::class,'Wellness_Facilities_index_id']);
Route::get('Wellness-Facilities-id', [FormController::class, 'Wellness_Facilities_id']);


//RIT module
Route::get("/RTI",[FormController::class,'view_rti']);
Route::match(['get','post'],'add-edit-RTI/{id?}',[FormController::class,'add_RTI'])->name('addRTI');
Route::get('delete-RTI/{id}',[FormController::class,'delete_RTI']);
Route::get("/Rti-Section",[FormController::class,'view_rti_section']);

Route::post("/add-rit-pdf",[FormController::class,'add_rit_pdf']);
Route::post("/edit-rit-pdf/{id?}",[FormController::class,'edit_rti_section']);
Route::get("/delete-rit-pdf/{id?}",[FormController::class,'delete_rti_section']);
Route::get("/rti-pdfsection",[FormController::class,'pdf_section']);

Route::get("/view-rti",[FormController::class,'view_rti_QUARTER']);
Route::post("/add_rit",[FormController::class,'add_rit_QUARTER']);
Route::post("/edit_rit/{id?}",[FormController::class,'edit_rit_QUARTER']);
Route::get("/delete_rit/{id?}",[FormController::class,'delete_rit_QUARTER']);
Route::get("/rti-pdfsection",[FormController::class,'rit_QUARTER']);
Route::get("/rti-QUARTER-data",[FormController::class,'rti_QUARTER_data']);

//old route
Route::match(['get','post'],'add-roles',[FormController::class,'Add_Roles'])->name('addRoles');
Route::get('manage-admin',[AdminController::class,'View_Admins'])->name('manageadmin');
Route::get('manage-organisation-detail',[AdminController::class,'View_OrganisationDetails'])->name('organisation');
Route::get('manage-roles',[AdminController::class,'View_Roles'])->name('roles');
Route::get('delete-Role/{id}',[FormController::class,'Delete_Role']);
Route::get('manage-options-master',[AdminController::class,'View_OptionMaster'])->name('optionsmaster');
Route::get('manage-main-menu',[AdminController::class,'View_Menus'])->name('menusetting');
Route::match(['get','post'],'add-edit-admin/{id?}',[AdminController::class,'Add_Admins'])->name('addadmin');
Route::match(['get','post'],'add-edit-menu/{id?}',[AdminController::class,'Add_Menu']);
Route::match(['get','post'],'add-edit-sub-menu/{id?}',[AdminController::class,'Add_SubMenu']);
Route::get('/submenushow',[AdminController::class,'submenushow']);
Route::match(['get','post'],'add-edit-child-menu/{id?}',[AdminController::class,'Add_childMenu']);
Route::get('delete-admin/{id}',[AdminController::class,'Delete_Admin']);
Route::get('manage-site-setting',[AdminController::class,'View_SiteSetting'])->name('sitesetting');
Route::match(['get','post'],'Add-Edit-site-setting/{id?}',[AdminController::class,'Add_SiteSetting']);
Route::get('delete-people/{id}',[FormController::class,'Delete_OrganisationStructure']);
Route::get('delete-department/{id}',[FormController::class,'Delete_department']);
Route::get('delete-announcements/{id}',[FormController::class,'Delete_Announcement']);
Route::get('delete-optionsmaster/{id}',[AdminController::class,'Delete_OptionMaster']);
Route::get('delete-org/{id}',[AdminController::class,'Delete_OrganisationDetails']);
Route::get('delete-banner/{id}',[AdminController::class,'Delete_Banners']);
Route::get('delete-usp/{id}',[AdminController::class,'Delete_USP']);
Route::get('delete-quicklink/{id}',[AdminController::class,'Delete_QuickLink']);
Route::get('manage-headers',[UIController::class,'MTopBar'])->name('topbar');
Route::get('manage-banners-sliders',[AdminController::class,'View_Banners'])->name('banners');
Route::get('manage-banners-sliders_detail',[AdminController::class,'View_Banners_detail']);
Route::match(['get','post'],'add-edit-bannerdetail/{id?}',[AdminController::class,'Add_Banners_detail']);
Route::get(' Delete_Banners_detail/{id}',[AdminController::class,' Delete_Banners_detail']);
Route::get('file-to-url',[UIController::class,'FileToURL'])->name('filetourl');
Route::get('manage-usps',[AdminController::class,'View_USPs'])->name('usp');
Route::get('manage-home-sliders',[UIController::class,'MSliderH'])->name('homeslider');
Route::get('manage-home-about',[UIController::class,'MAboutH'])->name('homeabout');
Route::get('manage-footers',[UIController::class,'MFooterS'])->name('footer');
Route::get('manage-usp-section',[UIController::class,'MUSP'])->name('usps');
Route::get('manage-upcoming-section',[UIController::class,'MUPC'])->name('upcoming');
Route::get('manage-gallery-section',[UIController::class,'MHG'])->name('homegallery');

Route::get('manage-quick-links',[AdminController::class,'View_QuickLinks'])->name('quicklink');
Route::post('manage-quick-links',[AdminController::class,'View_QuickLinks'])->name('quicklink');

Route::get('manage-announcement-section',[FormController::class,'View_Announcements'])->name('announcements');
Route::get('manage-people-section',[FormController::class,'View_OrganisationStructure'])->name('people');
Route::post('manage-people-section',[FormController::class,'View_OrganisationStructure'])->name('people');
Route::get('manage-people-department',[FormController::class,'View_department'])->name('people_department');
Route::get('change-status/{status}/{id}',[AdminController::class,'Admin_StatusChange']);
Route::match(['get','post'],'assign-role/{id}',[FormController::class,'Assign_Roles']);
Route::match(['get','post'],'add-edit-file2url',[UIController::class,'Add_F2U']);
Route::get('delete-file2url/{id}',[UIController::class,'Delete_F2U']);

//profile section url
Route::get("/manage-people-profile/{id?}",[FormController::class,'view_biography']);
Route::match(['get','post'],'add-edit-profile/{id?}',[FormController::class,'Add_biography'])->name('add_biography');
Route::get('delete-profile/{id}',[FormController::class,'Delete_biography']);


Route::match(['get','post'],'create-database',[AdminController::class,'Create_DataBase']);
Route::match(['get','post'],'permissions/{id}',[FormController::class,'Add_Permissions']);
Route::match(['get','post'],'add-headers',[UIController::class,'Add_Topbar'])->name('addtopbar');
Route::match(['get','post'],'add-footers',[UIController::class,'Add_Footbar'])->name('addfooter');
Route::match(['get','post'],'add-edit-banner/{id?}',[AdminController::class,'Add_Banners'])->name('addBanner');
Route::match(['get','post'],'add-edit-quicklink/{id?}',[AdminController::class,'Add_QuickLink']);
Route::match(['get','post'],'add-edit-announcements/{id?}',[FormController::class,'Add_Announcement'])->name('addAnnouncement');
Route::match(['get','post'],'add-edit-optionsmaster/{id?}',[AdminController::class,'Add_OptionMaster'])->name('addOptionMaster');
Route::match(['get','post'],'add-edit-usp/{id?}',[AdminController::class,'Add_USP']);
Route::match(['get','post'],'add-siders',[UIController::class,'Add_MSlider'])->name('addmidbar');
Route::match(['get','post'],'add-home-about',[UIController::class,'Add_AboutH'])->name('addabout_h');
Route::match(['get','post'],'add-home-upcoming',[UIController::class,'Add_PCH'])->name('addupcoming');
Route::match(['get','post'],'add-home-gallery',[UIController::class,'Add_HG'])->name('addhomegallery');
Route::match(['get','post'],'add-home-usp',[UIController::class,'Add_USP'])->name('addusp');
Route::match(['get','post'],'add-edit-people/{id?}',[FormController::class,'Add_OrganisationStructure'])->name('addpeople');
Route::match(['get','post'],'add-edit-department/{id?}',[FormController::class,'Add_department'])->name('add_department');
Route::match(['get','post'],'add-edit-file2url/{id?}',[UIController::class,'Add_F2U']);
Route::get('delete-file2url/{id}',[UIController::class,'Delete_F2U']);
Route::match(['get','post'],'add-edit-org/{id?}',[AdminController::class,'Add_OrganisationDetails'])->name('org');
Route::get('menu-status-change/{type}/{id}/{status}',[AdminController::class,'Menu_StatusChange']);
Route::get('status-change/{status}/{id}/{db}',[AdminController::class,'StatusChange']);
Route::post('form-creation',[UIController::class,'CreateForm']);
Route::match(['get','post'],'dynamic-form',[UIController::class,'CForm']);


Route::get('/Department_info',[AdminController::class,'Department_info']);
Route::match(['get','post'],'add-edit-sub-child-menu/{id?}',[AdminController::class,'add_sub_child_menu'])->name('addsubchilmenu');
Route::get('/childmenushow',[AdminController::class,'childmenushow']);
//my code



});
});
Route::match(['get','post'],'forgot-password',[AdminController::class,'ForgotPSW'])->name('forgotpsw');
Route::post('/from',[frontpagecontroller::class,'front_form']);
});

Route::get('/student-profile-more-info/{id}',[StudentProfileController::class,'front_profile_show_more']);
//forget password

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


//Monu Routes
// Career
Route::get('/career',[InnerpageController::class,'career']);
// Tenders
Route::get('/Tenders',[InnerpageController::class,'Tenders']);
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
//countact us
Route::get('/contact-us',[InnerpageController::class,'contact_page']);
Route::post('/add_contact',[InnerpageController::class,'add_contact']);

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




