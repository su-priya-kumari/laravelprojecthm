<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\FileManagerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UiElementsController;
use App\Http\Controllers\WidgetsController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\MapController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/register/admin', [RegisterController::class,'showAdminRegisterForm']);
Route::post('/login/admin', [LoginController::class,'adminLogin']);
Route::post('/register/admin', [RegisterController::class,'createAdmin']);

// Doctor
Route::get('/login/doctor', [LoginController::class, 'showDoctorLoginForm']);
Route::get('/register/doctor', [RegisterController::class,'showDoctorRegisterForm']);

// Patient
Route::get('/login/patient', [LoginController::class, 'showPatientLoginForm']);
Route::post('/login/patient', [LoginController::class, 'patientLogin']);
Route::get('/register/patient', [RegisterController::class,'showPatientRegisterForm']);
Route::post('/register/patient', [RegisterController::class,'createPatient']);
Route::post('/patient', [RegisterController::class,'createPatient']);


Route::group(['middleware' => 'auth:admin'], function () {   
    Route::view('/admin', 'admin.adminhomepage');
    // Clinic
    Route::get('/add/clinic', [ClinicController::class,'indexclinic'])->name('addClinic');
    Route::post('/add/clinic', [ClinicController::class,'store'])->name('addClinic');
    Route::get('/update/clinic', [ClinicController::class,'showClinicUpdatePage'])->name('updateClinic');
    Route::get('/update/delete/{id}', [ClinicController::class,'deleteClinicRecord'])->name('deleteClinicRecord');
    Route::get('/update/edit/{id}', [ClinicController::class,'editClinicRecord'])->name('editClinicRecord');
    Route::post('/update/edit', [ClinicController::class,'updateClinicRecord'])->name('updateClinicRecord');
    // Doctor
    Route::get('/update/doctor', [DoctorController::class,'showDoctorUpdatePage'])->name('updateDoctor');
    // Admin
    Route::get('/update/admin', [AdminController::class,'showAdminUpdatePage'])->name('updateAdmin');
    Route::get('/update/delete/{id}', [AdminController::class,'deleteAdminRecord'])->name('deleteAdminRecord');
    Route::get('/update/edit/{id}', [AdminController::class,'editAdminRecord'])->name('editAdminRecord');
    Route::post('/update/edit', [AdminController::class,'updateAdminRecord'])->name('updateAdminRecord');
    // Patient
    Route::get('/update/patient', [PatientController::class,'showPatientUpdatePage'])->name('updatePatient');
    Route::get('/update/delete/{id}', [PatientController::class,'deletePatientRecord'])->name('deletePatientRecord');
    Route::get('/update/edit/{id}', [PatientController::class,'editPatientRecord'])->name('editPatientRecord');
    Route::post('/update/edit', [PatientController::class,'updatePatientRecord'])->name('updatePatientRecord');   
});

Route::group(['middleware' => 'auth:patient'], function () {
    // Route::get('/patient', [PatientController::class,'showPatientHomePage'])->name('patient');
});

Route::get('logout', [LoginController::class,'logout'])->name('logout');
Route::get('/homepage',[HomeController::class,'Homepage'])->name('homepage');
// --Route::get('/',[IndexController::class,'index'])->name('home');
Route::get('/patient', [PatientController::class,'showPatientHomePage'])->name('patient');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// --Route::get('/',[IndexController::class,'index'])->name('home');
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// --Route::get('/',[IndexController::class,'index'])->name('home');


//--------------


Route::get('/', function () { return redirect('dashboard/analytical'); });

/* Dashboard */
Route::get('dashboard', function () { return redirect('dashboard/analytical'); });
Route::get('dashboard/analytical', [DashboardController::class,'analytical'])->name('dashboard.analytical');
Route::get('dashboard/demographic', [DashboardController::class,'demographic'])->name('dashboard.demographic');
Route::get('dashboard/hospital', [DashboardController::class,'hospital'])->name('dashboard.hospital');
Route::get('dashboard/university', [DashboardController::class,'university'])->name('dashboard.university');
Route::get('dashboard/real-estate', [DashboardController::class,'realEstate'])->name('dashboard.real-estate');
Route::get('dashboard/project', [DashboardController::class,'project'])->name('dashboard.project');
Route::get('dashboard/bitcoin', [DashboardController::class,'bitcoin'])->name('dashboard.bitcoin');
Route::get('dashboard/ecommerce', [DashboardController::class,'ecommerce'])->name('dashboard.ecommerce');
Route::get('dashboard/iot', [DashboardController::class,'iot'])->name('dashboard.iot');

/* App */
Route::get('app', function () { return redirect('app/inbox'); });
Route::get('app/inbox', [AppController::class,'inbox'])->name('app.inbox');
Route::get('app/chat', [AppController::class,'chat'])->name('app.chat');
Route::get('app/calendar', [AppController::class,'calendar'])->name('app.calendar');
Route::get('app/contact-list', [AppController::class,'contactList'])->name('app.contact-list');
Route::get('app/contact-card', [AppController::class,'contactCard'])->name('app.contact-card');
Route::get('app/taskboard', [AppController::class,'taskboard'])->name('app.taskboard');

/* File Manager */
Route::get('file-manager', function () { return redirect('file-manager/dashboard'); });
Route::get('file-manager/dashboard', [FileManagerController::class,'dashboard'])->name('file-manager.dashboard');
Route::get('file-manager/documents', [FileManagerController::class,'documents'])->name('file-manager.documents');
Route::get('file-manager/media', [FileManagerController::class,'media'])->name('file-manager.media');
Route::get('file-manager/image', [FileManagerController::class,'image'])->name('file-manager.image');

/* Blog */
Route::get('blog', function () { return redirect('blog/dashboard'); });
Route::get('blog/dashboard', [BlogController::class,'dashboard'])->name('blog.dashboard');
Route::get('blog/new-post', [BlogController::class,'newPost'])->name('blog.new-post');
Route::get('blog/list', [BlogController::class,'list'])->name('blog.list');
Route::get('blog/detail', [BlogController::class,'detail'])->name('blog.detail');

/* UI Elements */
Route::get('ui-elements', function () { return redirect('ui-elements/typography'); });
Route::get('ui-elements/typography', [UiElementsController::class,'typography'])->name('ui-elements.typography');
Route::get('ui-elements/tabs', [UiElementsController::class,'tabs'])->name('ui-elements.tabs');
Route::get('ui-elements/buttons', [UiElementsController::class,'buttons'])->name('ui-elements.buttons');
Route::get('ui-elements/bootstrap', [UiElementsController::class,'bootstrap'])->name('ui-elements.bootstrap');
Route::get('ui-elements/icons', [UiElementsController::class,'icons'])->name('ui-elements.icons');
Route::get('ui-elements/notifications', [UiElementsController::class,'notifications'])->name('ui-elements.notifications');
Route::get('ui-elements/colors', [UiElementsController::class,'colors'])->name('ui-elements.colors');
Route::get('ui-elements/dialogs', [UiElementsController::class,'dialogs'])->name('ui-elements.dialogs');
Route::get('ui-elements/list-group', [UiElementsController::class,'listGroup'])->name('ui-elements.list-group');
Route::get('ui-elements/media-object', [UiElementsController::class,'mediaObject'])->name('ui-elements.media-object');
Route::get('ui-elements/modals', [UiElementsController::class,'modals'])->name('ui-elements.modals');
Route::get('ui-elements/nestable', [UiElementsController::class,'nestable'])->name('ui-elements.nestable');
Route::get('ui-elements/progress-bars', [UiElementsController::class,'progressBars'])->name('ui-elements.progress-bars');
Route::get('ui-elements/range-sliders', [UiElementsController::class,'rangeSliders'])->name('ui-elements.range-sliders');
Route::get('ui-elements/treeview', [UiElementsController::class,'treeview'])->name('ui-elements.treeview');

/* Widgets */
Route::get('widgets', function () { return redirect('widgets/statistics'); });
Route::get('widgets/statistics', 'WidgetsController@statistics')->name('widgets.statistics');
Route::get('widgets/data', 'WidgetsController@data')->name('widgets.data');
Route::get('widgets/chart', 'WidgetsController@chart')->name('widgets.chart');
Route::get('widgets/weather', 'WidgetsController@weather')->name('widgets.weather');
Route::get('widgets/social', 'WidgetsController@social')->name('widgets.social');
Route::get('widgets/blog', 'WidgetsController@blog')->name('widgets.blog');
Route::get('widgets/ecommerce', 'WidgetsController@ecommerce')->name('widgets.ecommerce');

/* Authentication */
Route::get('authentication', function () { return redirect('authentication/login'); });
Route::get('authentication/login', [AuthenticationController::class,'login'])->name('authentication.login');
Route::get('authentication/register', [AuthenticationController::class,'register'])->name('authentication.register');
Route::get('authentication/lockscreen', [AuthenticationController::class,'lockscreen'])->name('authentication.lockscreen');
Route::get('authentication/forgot-password', [AuthenticationController::class,'forgotPassword'])->name('authentication.forgot-password');
Route::get('authentication/page404', [AuthenticationController::class,'page404'])->name('authentication.page404');
Route::get('authentication/page403', [AuthenticationController::class,'page403'])->name('authentication.page403');
Route::get('authentication/page500', [AuthenticationController::class,'page500'])->name('authentication.page500');
Route::get('authentication/page503', [AuthenticationController::class,'page503'])->name('authentication.page503');

/* Pages */
Route::get('pages', function () { return redirect('pages/blank-page'); });
Route::get('pages/blank-page', [PagesController::class,'blankPage'])->name('pages.blank-page');
Route::get('pages/profile1', [PagesController::class,'profile1'])->name('pages.profile1');
Route::get('pages/profile2', [PagesController::class,'profile2'])->name('pages.profile2');
Route::get('pages/image-gallery1', [PagesController::class,'imageGallery1'])->name('pages.image-gallery1');
Route::get('pages/image-gallery2', [PagesController::class,'imageGallery2'])->name('pages.image-gallery2');
Route::get('pages/timeline', [PagesController::class,'timeline'])->name('pages.timeline');
Route::get('pages/horizontal-timeline', [PagesController::class,'horizontalTimeline'])->name('pages.horizontal-timeline');
Route::get('pages/pricing', [PagesController::class,'pricing'])->name('pages.pricing');
Route::get('pages/invoices1', [PagesController::class,'invoices1'])->name('pages.invoices1');
Route::get('pages/invoices2', [PagesController::class,'invoices2'])->name('pages.invoices2');
Route::get('pages/search-results', [PagesController::class,'searchResults'])->name('pages.search-results');
Route::get('pages/helper-classes', [PagesController::class,'helperClasses'])->name('pages.helper-classes');
Route::get('pages/teams-board', [PagesController::class,'teamsBoard'])->name('pages.teams-board');
Route::get('pages/project-list', [PagesController::class,'projectList'])->name('pages.project-list');
Route::get('pages/maintenance', [PagesController::class,'maintenance'])->name('pages.maintenance');
Route::get('pages/testimonials', [PagesController::class,'testimonials'])->name('pages.testimonials');
Route::get('pages/faq', [PagesController::class,'faq'])->name('pages.faq');

/* Forms */
Route::get('forms', function () { return redirect('forms/advance-elements'); });
Route::get('forms/validation', [FormsController::class,'validation'])->name('forms.validation');
Route::get('forms/advance-elements', [FormsController::class,'advanceElements'])->name('forms.advance-elements');
Route::get('forms/basic-elements', [FormsController::class,'basicElements'])->name('forms.basic-elements');
Route::get('forms/wizard', [FormsController::class,'wizard'])->name('forms.wizard');
Route::get('forms/dragdrop', [FormsController::class,'dragdrop'])->name('forms.dragdrop');
Route::get('forms/cropping', [FormsController::class,'cropping'])->name('forms.cropping');
Route::get('forms/summernote', [FormsController::class,'summernote'])->name('forms.summernote');
Route::get('forms/editors', [FormsController::class,'editors'])->name('forms.editors');
Route::get('forms/markdown', [FormsController::class,'markdown'])->name('forms.markdown');

/* Forms */
Route::get('table', function () { return redirect('table/basic'); });
Route::get('table/basic', [TableController::class,'basic'])->name('table.basic');
Route::get('table/normal', [TableController::class,'normal'])->name('table.normal');
Route::get('table/jquery-datatable', [TableController::class,'jqueryDatatable'])->name('table.jquery-datatable');
Route::get('table/editable', [TableController::class,'editable'])->name('table.editable');
Route::get('table/color', [TableController::class,'color'])->name('table.color');
Route::get('table/filter', [TableController::class,'filter'])->name('table.filter');
Route::get('table/dragger', [TableController::class,'dragger'])->name('table.dragger');

/* Charts */
Route::get('charts', function () { return redirect('charts/morris'); });
Route::get('charts/morris', [ChartsController::class,'morris'])->name('charts.morris');
Route::get('charts/flot', [ChartsController::class,'flot'])->name('charts.flot');
Route::get('charts/chartjs', [ChartsController::class,'chartjs'])->name('charts.chartjs');
Route::get('charts/jquery-knob', [ChartsController::class,'jqueryKnob'])->name('charts.jquery-knob');
Route::get('charts/sparkline', [ChartsController::class,'sparkline'])->name('charts.sparkline');
Route::get('charts/peity', [ChartsController::class,'peity'])->name('charts.peity');
Route::get('charts/c3', [ChartsController::class,'c3'])->name('charts.c3');
Route::get('charts/gauges', [ChartsController::class,'gauges'])->name('charts.gauges');
Route::get('charts/echart', [ChartsController::class,'echart'])->name('charts.echart');

/* Maps */
Route::get('map', function () { return redirect('map/google'); });
Route::get('map/google', [MapController::class,'google'])->name('map.google');
Route::get('map/yandex', [MapController::class,'yandex'])->name('map.yandex');
Route::get('map/jvector', [MapController::class,'jvector'])->name('map.jvector');

