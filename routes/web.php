<?php

use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\KeywordController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\MajorController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\DatabaseController;
use App\Http\Controllers\Admin\WebsiteInfoController;
use App\Http\Controllers\Admin\ThesisController;
use App\Http\Controllers\Admin\JournalController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SupervisorController;
use App\Http\Controllers\Admin\LecturerController;


use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\FacultyPageController;
use App\Http\Controllers\Admin\MenuPageController;

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPermissionController;
use App\Http\Controllers\Admin\AdminRoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DtcController;
use App\Http\Controllers\Admin\SlideController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Client\ClientPublicationController;
use App\Http\Controllers\Client\ClientArticleController;
use App\Http\Controllers\Client\ClientVideoController;
use App\Http\Controllers\Client\ClientAudioController;
use App\Http\Controllers\Client\ClientImageController;
use App\Http\Controllers\Client\ClientNewsController;
use App\Http\Controllers\Client\ClientThesisController;
use App\Http\Controllers\Client\ClientJournalController;

/*
|--------------------------------------------------------------------------
*/
// Make storage:link
// Route::get('/symlink', function () {
//    $target =$_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
//    $link = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
//    symlink($target, $link);
//    echo "Done";
// });

Route::get('/fetch_book_cover', [HomeController::class, 'fetchAndSaveBookCover']);

Route::get('/expired', function () {
    return view('auth.expired');
})->name('expired');

Route::get('/static', function () {
    return view('static');
});



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function() {

    Route::resource('faculties', FacultyController::class);
    Route::get('sideinfo', [FacultyController::class, 'sideinfo']);
    Route::resource('faculties_pages', FacultyPageController::class);


    Route::resource('publications', PublicationController::class);
    Route::get('publications_types', [PublicationController::class, 'types']);
    Route::get('publications_categories', [PublicationController::class, 'categories']);
    Route::get('publications_sub_categories', [PublicationController::class, 'sub_categories']);
    Route::get('publications_images/{id}', [PublicationController::class, 'images']);

    Route::resource('articles', ArticleController::class);
    Route::get('articles_types', [ArticleController::class, 'types']);
    Route::get('articles_categories', [ArticleController::class, 'categories']);
    Route::get('articles_sub_categories', [ArticleController::class, 'sub_categories']);
    Route::get('articles_images/{id}', [ArticleController::class, 'images']);

    Route::resource('videos', VideoController::class);
    Route::get('videos_types', [VideoController::class, 'types']);
    Route::get('videos_categories', [VideoController::class, 'categories']);
    Route::get('videos_sub_categories', [VideoController::class, 'sub_categories']);
    Route::get('videos_images/{id}', [VideoController::class, 'images']);

    Route::resource('images', ImageController::class);
    Route::get('images_types', [ImageController::class, 'types']);
    Route::get('images_categories', [ImageController::class, 'categories']);
    Route::get('images_sub_categories', [ImageController::class, 'sub_categories']);
    Route::get('images_images/{id}', [ImageController::class, 'images']);

    Route::resource('audios', AudioController::class);
    Route::get('audios_types', [AudioController::class, 'types']);
    Route::get('audios_categories', [AudioController::class, 'categories']);
    Route::get('audios_sub_categories', [AudioController::class, 'sub_categories']);
    Route::get('audios_images/{id}', [AudioController::class, 'images']);

    Route::resource('bulletins', NewsController::class);
    Route::get('bulletins_types', [NewsController::class, 'types']);
    Route::get('bulletins_categories', [NewsController::class, 'categories']);
    Route::get('bulletins_sub_categories', [NewsController::class, 'sub_categories']);
    Route::get('bulletins_images/{id}', [NewsController::class, 'images']);

    Route::resource('theses', ThesisController::class);
    Route::get('theses_types', [ThesisController::class, 'types']);
    Route::get('theses_categories', [ThesisController::class, 'categories']);
    Route::get('theses_images/{id}', [ThesisController::class, 'images']);

    Route::resource('journals', JournalController::class);
    Route::get('journals_types', [JournalController::class, 'types']);
    Route::get('journals_categories', [JournalController::class, 'categories']);
    Route::get('journals_images/{id}', [JournalController::class, 'images']);


    Route::resource('permissions', AdminPermissionController::class);
    Route::resource('roles', AdminRoleController::class);
    Route::get('roles/{id}/give-permissions', [AdminRoleController::class, 'givePermissionsToRole']);
    Route::put('roles/{id}/give-permissions', [AdminRoleController::class, 'updatePermissionsToRole']);
    Route::resource('users', AdminUserController::class );
    Route::put('users/{user}/update_password', [AdminUserController::class, 'updateUserPassword']);

    Route::resource('keywords', KeywordController::class);
    Route::resource('languages', LanguageController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('locations', LocationController::class);

    // ======================================================

    Route::resource('dashboard', DashboardController::class );
    Route::resource('customers', CustomerController::class );
    Route::resource('items', ItemController::class );
    Route::resource('categories', CategoryController::class );
    Route::resource('types', TypeController::class );

    // Route::resource('settings', SettingsController::class );
    Route::resource('settings/menus', MenuController::class );
    Route::resource('menus', MenuController::class );
    Route::resource('menus_pages', MenuPageController::class);

    Route::resource('settings/slides', SlideController::class );
    Route::resource('settings/footer', FooterController::class );
    Route::resource('settings/links', LinkController::class );
    Route::resource('settings/databases', DatabaseController::class );
    Route::resource('settings/website_infos', WebsiteInfoController::class );

    Route::resource('people/authors', AuthorController::class);
    Route::resource('people/publishers', PublisherController::class);
    Route::resource('people/students', StudentController::class );
    Route::resource('people/supervisors', SupervisorController::class);
    Route::resource('people/lecturers', LecturerController::class);

    Route::resource('slides', SlideController::class);
    Route::resource('dtcs', DtcController::class);

    Route::get('addmore', function(){
        dd('Add More Route Test Success');
    })->name('addmore');
});



/*
|--------------------------------------------------------------------------
| End Admin Routes
|--------------------------------------------------------------------------
*/
/*
|--------------------------------------------------------------------------
| Start Koha Routes
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\KohaSearchController;

Route::get('/search', [KohaSearchController::class, 'search']);
Route::view('/search-form', 'search');

use App\Http\Controllers\KohaController;

Route::get('/biblios', [KohaController::class, 'getBiblios']);


/*
|--------------------------------------------------------------------------
| End Koha Routes
|--------------------------------------------------------------------------
*/




/*
|--------------------------------------------------------------------------
| Start Client Routes
|--------------------------------------------------------------------------
*/
Route::get('/switch-language/{locale}', function($locale){
    session(['locale' => $locale]);
    return redirect()->back();
})->name('switch-language');

Route::group([
    'middleware' => 'setLang',
], function () {

//Client

Route::get('/', function () {
    return view('client.index');
})->name('client.index');
Route::get('/static', function () {
    return view('client.static');
});
Route::get('/faculty', function () {
    return view('client.faculty');
})->name('client.faculty');
Route::get('/economic', function () {
    return view('client.economicDeverlop');
})->name('client.economic');
Route::get('/profile', function () {
    return view('client.profile');
})->name('client.profile');
Route::get('/vision', function () {
    return view('client.vision');
})->name('client.vision');
Route::get('/management_team', function () {
    return view('client.management_team');
})->name('client.management_team');
Route::get('/allfaculty', function () {
    return view('client.allfaculty');
})->name('client.allfaculty');
Route::get('/administrativeandpersionnel', function () {
    return view('client.administrativeandpersionnel');
})->name('client.administrativeandpersionnel');
Route::get('/researchanddevelopment', function () {
    return view('client.researchanddevelopment');
})->name('client.researchanddevelopment');
Route::get('/researchprofile', function () {
    return view('client.researchprofile');
})->name('client.researchprofile');
Route::get('/recentproject', function () {
    return view('client.recentproject');
})->name('client.recentproject');
Route::get('/industriallink', function () {
    return view('client.industriallink');
})->name('client.industriallink');
Route::get('/library', function () {
    return view('client.library');
})->name('client.library');
Route::get('/partner', function () {
    return view('client.partner');
})->name('client.partner');
Route::get('/journal', function () {
    return view('client.journal');
})->name('client.journal');
Route::get('/contact', function () {
    return view('client.contact');
})->name('client.contact');
Route::get('/subnational', function () {
    return view('client.subnational');
})->name('client.subnational');
Route::get('/subinternational', function () {
    return view('client.subinternational');
})->name('client.subinternational');
Route::get('/association', function () {
    return view('client.association');
})->name('client.association');

Route::get('/bachelor', function () {
    return view('client.bachelor');
})->name('client.bachelor');

Route::get('/master', function () {
    return view('client.master');
})->name('client.master');

Route::get('/phd', function () {
    return view('client.phd');
})->name('client.phd');

Route::get('/foundation', function () {
    return view('client.foundation');
})->name('client.foundation');

Route::get('/assessment', function () {
    return view('client.assessment');
})->name('client.assessment');

Route::get('/gradingsystem', function () {
    return view('client.gradingsystem');
})->name('client.gradingsystem');

Route::get('/curriculum', function () {
    return view('client.curriculum');
})->name('client.curriculum');

Route::get('/graduate', function () {
    return view('client.graduate_program');
})->name('client.graduate_program');

Route::get('/languages', function () {
    return view('client.languages');
})->name('client.languages');

Route::get('/student_life', function () {
    return view('client.student_life');
})->name('client.student_life');

Route::get('/department', function () {
    return view('client.department');
})->name('client.department');

Route::get('/foundation_year', function () {
    return view('client.foundation_year');
})->name('client.foundation_year');

Route::get('/curriculum_faculty', function () {
    return view('client.curriculum_faculty');
})->name('client.curriculum_faculty');

Route::get('/news_update', function () {
    return view('client.news_update');
})->name('client.news_update');

Route::get('/academic_program', function () {
    return view('client.academic_program');
})->name('client.academic_program');

Route::get('/chart', function () {
    return view('client.chart');
})->name('client.chart');

Route::get('/sub_department', function () {
    return view('client.sub_department');
})->name('client.sub_department');

Route::get('/sub_medicine_of_academic_Program', function () {
    return view('client.sub_medicine_of_academic_Program');
})->name('client.sub_medicine_of_academic_Program');

Route::get('/management_team_department', function () {
    return view('client.management_team_department');
})->name('client.management_team_department');

Route::get('/facilities', function () {
    return view('client.facilities');
})->name('client.facilities');

Route::get('/publications', function () {
    return view('client.publications');
})->name('client.publications');

Route::get('/partnerships', function () {
    return view('client.partnerships');
})->name('client.partnerships');

Route::get('/contact_us_in_faculty', function () {
    return view('client.contact_us_in_faculty');
})->name('client.contact_us_in_faculty');

Route::get('/curriculum_graduate_program_master', function () {
    return view('client.graduate_program_master');
})->name('client.graduate_program_master');

Route::get('/graduate_program_phd', function () {
    return view('client.graduate_program_phd');
})->name('client.graduate_program_phd');

Route::get('/curriculum_bachelor', function () {
    return view('client.curriculum_bachelor');
})->name('client.curriculum_bachelor');

// graduate

Route::get('/master_program', function () {
    return view('client.graduates.master_program');
})->name('client.graduates.master_program');

Route::get('/phd_program', function () {
    return view('client.graduates.phd_program');
})->name('client.graduates.phd_program');

Route::get('/sub_master_program', function () {
    return view('client.graduates.gidar');
})->name('client.graduates.master_gidar');


    Route::get('/', [HomeController::class, 'index']);

    Route::get('/faculties', [HomeController::class, 'faculties']);
    Route::get('/faculties/{id}', [HomeController::class, 'faculty']);
    Route::get('/faculties/page/{id}', [HomeController::class, 'facultyPage']);

    Route::get('/menus', [HomeController::class, 'menus']);
    Route::get('/menus/{id}', [HomeController::class, 'menu']);

    Route::get('/news', [HomeController::class, 'news']);
    Route::get('/news/{id}', [HomeController::class, 'newsShow']);
    Route::get('/procurements', [HomeController::class, 'procurements']);
    Route::get('/procurements/{id}', [HomeController::class, 'procurementShow']);

    Route::get('/one_search', [HomeController::class, 'oneSearch']);
    Route::get('/client_login/{path}', [HomeController::class, 'clientLogin'])->name('client.login');
    Route::post('/client_login/{path}', [HomeController::class, 'clientLoginStore'])->name('client.login.store');
    Route::get('/menu/{id}', [HomeController::class, 'menu']);
    Route::get('/add_read_count/{archive}/{id}', [HomeController::class, 'readCount']);
    Route::get('/add_download_count/{archive}/{id}', [HomeController::class, 'downloadCount']);

    Route::get('stream_pdf/{archive}/{id}/{file_name}/', [HomeController::class, 'stream'])->name('pdf.stream');
    Route::get('view_pdf/{archive}/{id}/{file_name}/', [HomeController::class, 'viewPdf'])->name('pdf.view');
    Route::get('download_pdf/{archive}/{id}/{file_name}/', [HomeController::class, 'downloadPdf'])->name('pdf.download');


    // Route::get('/publications', function () {
    //     return view('client.publications.index');
    // });
    Route::get('/publications', [ClientPublicationController::class, 'index']);
    Route::get('/publications/{id}', [ClientPublicationController::class, 'show']);

    Route::get('/articles', [ClientArticleController::class, 'index']);
    Route::get('/articles/{id}', [ClientArticleController::class, 'show']);

    Route::get('/videos', [ClientVideoController::class, 'index']);
    Route::get('/videos/{id}', [ClientVideoController::class, 'show']);

    Route::get('/audios', [ClientAudioController::class, 'index']);
    Route::get('/audios/{id}', [ClientAudioController::class, 'show']);

    Route::get('/images', [ClientImageController::class, 'index']);
    Route::get('/images/{id}', [ClientImageController::class, 'show']);

    Route::get('/bulletins', [ClientNewsController::class, 'index']);
    Route::get('/bulletins/{id}', [ClientNewsController::class, 'show']);

    Route::get('/theses', [ClientThesisController::class, 'index']);
    Route::get('/theses/{id}', [ClientThesisController::class, 'show']);

    Route::get('/journals', [ClientJournalController::class, 'index']);
    Route::get('/journals/{id}', [ClientJournalController::class, 'show']);


});


// Route::get('publications/{id}', function () {
//     return view('publication_detail');
// });

/*
|--------------------------------------------------------------------------
| End Client Routes
|--------------------------------------------------------------------------
*/







/*
|--------------------------------------------------------------------------
| Start Initial Project Route
|--------------------------------------------------------------------------
*/
Route::group([
    'middleware' => 'role:super-admin|admin'
], function() {
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{id}/delete', [PermissionController::class, 'destroy']);

    Route::resource('roles', RoleController::class);
    Route::get('roles/{id}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{id}/give-permissions', [RoleController::class, 'givePermissionsToRole']);
    Route::put('roles/{id}/give-permissions', [RoleController::class, 'updatePermissionsToRole']);

    Route::resource('users', UserController::class);
    Route::put('users/{user}/update-password', [UserController::class, 'updateUserPassword']);
    Route::get('users/{user}/delete', [UserController::class, 'destroy']);
});

Route::get('ckeditor4-demo', function() {
    return view('ckeditor-demo.ckeditor4-demo');
})->name('ckeditor4');

Route::get('ckeditor5-demo', function() {
    return view('ckeditor-demo.ckeditor5-demo');
})->name('ckeditor5');

Route::get('slide-infinite-loop', function() {
    return view('slide-show.slide-infinite-loop');
})->name('slide-infinite-loop');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});











// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
