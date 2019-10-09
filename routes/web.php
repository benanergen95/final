<?php
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

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

//home page
Route::get('/', function () {
    return view('WhyUse');
});
// Registration Page
Route::get('/Registration', function () {
    return view('Registration');
});
// Add Child to Database
Route::post('ChildRegister', 'ChildController@registerChild');
// Authenticating User
Route::post('CheckLogin', 'LoginController@validatelogin');
Route::get('Logout', 'LoginController@logout');
Route::get('Tests', 'ViewController@viewTest'); 
// Route::get('NDenied','ViewController@newDenied'); 
Route::get('/Home', function () { // view test page
    return view('Tests');
});
Route::post('Register', 'RegistrationController@store');
// Child Registration Page
Route::get('/ChildRegistration', function () {
    return view('ChildRegistration');
});

// Login Page
Route::get('/Login', function () {
    return view('Login');
});
Route::get('/Admin2', function () {
    return view('Admin2');
});
Route::get('/Admin3', function () {
    return view('Admin3');
});
Route::get('/Admin4', function () {
    return view('Admin4');
});

// Change Password Page
Route::get('/ChangePassword', function () {
    return view('ChangePassword');
});

// Why Use Page
Route::get('/WhyUse', function () {
    return view('WhyUse');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//------------------------------------
//routes to cintroller to edit pages and data is stored into database as html


Route::group(['middleware' => 'auth'], function () {
//edit pages return 
Route::get('/editwhyuse', function () {
    return view('editwhyuse');
});
Route::get('/editweight0', function () {
    return view('editweight0');
});
Route::get('/editweight1', function () {
    return view('editweight1');
});
Route::get('/editweight2', function () {
    return view('editweight2');
});
Route::get('/editweight3', function () {
    return view('editweight3');
});
Route::get('/editweight4', function () {
    return view('editweight4');
});
Route::get('/editweight5', function () {
    return view('editweight5');
});
Route::get('/editweight6', function () {
    return view('editweight6');
});
Route::get('/editdiet0', function () {
    return view('editdiet0');
});
Route::get('/editdiet1', function () {
    return view('editdiet1');
});
Route::get('/editdiet2', function () {
    return view('editdiet2');
});
Route::get('/editdiet3', function () {
    return view('editdiet3');
});
Route::get('/editdiet4', function () {
    return view('editdiet4');
});
Route::get('/editexercise0', function () {
    return view('editexercise0');
});
Route::get('/editexercise1', function () {
    return view('editexercise1');
});
Route::get('/editexercise2', function () {
    return view('editexercise2');
});
Route::get('/editexercise3', function () {
    return view('editexercise3');
});
Route::get('/editscreentime0', function () {
    return view('editscreentime0');
});
Route::get('/editscreentime1', function () {
    return view('editscreentime1');
});
Route::get('/editscreentime2', function () {
    return view('editscreentime2');
});
Route::get('/editscreentime3', function () {
    return view('editscreentime3');
});
Route::get('/editscreentime4', function () {
    return view('editscreentime4');
});
Route::get('/editscreentime5', function () {
    return view('editscreentime5');
});

Route::get('/editmental0', function () {
    return view('editmental0');
});   

Route::get('/editmental1', function () {
    return view('editmental1');
});   

Route::get('/editmental2', function () {
    return view('editmental2');
});   

Route::get('/editsleep0', function () {
    return view('editsleep0');
});
Route::get('/editsleep1', function () {
    return view('editsleep1');
});
Route::get('/editsleep2', function () {
    return view('editsleep2');
});
Route::get('/editsleep3', function () {
    return view('editsleep3');
});
Route::get('/editsleep4', function () {
    return view('editsleep4');
});

Route::get('/MentalHealth0', function () {
    return view('MentalHealth0');
});

Route::get('/MentalHealth1', function () {
    return view('MentalHealth1');
});

Route::get('/MentalHealth2', function () {
    return view('MentalHealth2');
});

Route::get('/MentalHealth3', function () {
    return view('MentalHealth3');
});

Route::get('/MainTips', function () {
    return view('MainTips');
});

Route::get('/DietTips', function () {
    return view('DietTips');
});

Route::get('/ExerciseTips', function () {
    return view('ExerciseTips');
});

Route::get('/ScreenTimeTips', function () {
    return view('ScreenTimeTips');
});

Route::get('/SleepTips', function () {
    return view('SleepTips');
});

Route::get('/WeightTips', function () {
    return view('WeightTips');
});

Route::get('/userChildren', function () {
    return view('userChildren');
});

Route::get('/Graphs', function () {
    return view('Graphs');
});

Route::get('/MentalHealth4', function () {
    return view('MentalHealth4');
});

Route::get('/MentalHealth5', function () {
    return view('MentalHealth5');
});

Route::get('/MentalHealth6', function () {
    return view('MentalHealth6');
});

Route::get('/MentalHealth7', function () {
    return view('MentalHealth7');
});

Route::get('/MentalHealth8', function () {
    return view('MentalHealth8');
});

Route::get('/MentalHealth9', function () {
    return view('MentalHealth9');
});

Route::get('/MentalHealth10', function () {
    return view('MentalHealth10');
});

Route::get('/MentalHealth11', function () {
    return view('MentalHealth11');
});

Route::get('/MentalHealth12', function () {
    return view('MentalHealth12');
});

Route::get('/MentalHealth13', function () {
    return view('MentalHealth13');
});

Route::get('/MentalHealth14', function () {
    return view('MentalHealth14');
});

Route::get('/MentalHealth15', function () {
    return view('MentalHealth15');
});

Route::get('/MentalHealth16', function () {
    return view('MentalHealth16');
});

Route::get('/MentalHealth17', function () {
    return view('MentalHealth17');
});

Route::get('/MentalHealth18', function () {
    return view('MentalHealth18');
});

Route::get('/MentalHealth19', function () {
    return view('MentalHealth19');
});

Route::get('/MentalHealthTest', function () {
    return view('MentalHealthTest');
});

Route::get('/MentalHealth20', function () {
    return view('MentalHealth20');
});



//------------------------------

Route::get('thisTest','ChildController@thisChild');

// Add User to Database
Route::post('Invite', 'RegistrationController@invite');

// Change User's password
Route::post('UpdatePassword', 'LoginController@changePassword');
Route::get('/resultemail', function () {
    return view('resultemail');
});

// Overall Results Page
Route::get('/OverallResults', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('OverallResults');
    }
});
Route::get('ResultDenied', 'ViewController@denyResult');// determine whether to view the test page.
// redirect user to test page if they haven't completed all the test yet.

// Fruits and Veggies Routes ----
// Dietary Introduction
Route::get('/Diet0', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Diet0');
    }
});

// Dietary Fruits Input
Route::get('/Diet1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Diet1');
    }
});

// Dietary Veggies Input
Route::get('/Diet2', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Diet2');
    }
});

// Dietary Result;
Route::get('/Diet3', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Diet3');
    }
});

// Dietary Tips Page
Route::get('/Diet4', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Diet4');
    }
});

// -----------------------------


// Weight Routes ---------------
// return BMI Introduction 1;
Route::get('/Weight0', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight0');
    }
});

// return BMI Introduction 2;
Route::get('/Weight1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight1');
    }
});

// return BMI Height Input;
Route::get('/Weight2', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight2');
    }
});

// return BMI Weight Input;
Route::get('/Weight3', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight3');
    }
});

// return BMI Result;
Route::get('/Weight4', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight4');
    }
});

// return BMI Tips Page
Route::get('/Weight5', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight5');
    }
});
Route::get('/Weight4-1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Weight4-1');
    }
});

// -----------------------------


// Exercise Routes -------------
// return Physical Activity Introduction;
Route::get('/Exercise0', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Exercise0');
    }
});

// return Physical Activity Input ;
Route::get('/Exercise1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Exercise1');
    }
});

// return Physical Activity Result;
Route::get('/Exercise2', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Exercise2');
    }
});

// return Physical Activity Tips Page;
Route::get('/Exercise3', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Exercise3');
    }
});

// ----------------------------


// Screen Time Routes --------
// return Sedentary Behaviour Introduction;
Route::get('/ScreenTime0', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime0');
    }
});

// return Sedentary Behaviour Information;
Route::get('/ScreenTime1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime1');
    }
});

// return Sedentary Behaviour School Day Input;
Route::get('/ScreenTime2', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime2');
    }
});

// return Sedentary Behaviour Non-School Day Input;
Route::get('/ScreenTime3', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime3');
    }
});

// return Sedentary Behaviour Result;
Route::get('/ScreenTime4', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime4');
    }
});

// return Sedentary Behaviour Tips Page;
Route::get('/ScreenTime5', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('ScreenTime5');
    }
});

// ----------------------------


// Sleep Habits Routes --------
// return Sleep Introduction;
Route::get('/Sleep0', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Sleep0');
    }
});

// return Sleep School Day Input;
Route::get('/Sleep1', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Sleep1');
    }
});

// return Sleep Non-School Day Input;
Route::get('/Sleep2', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Sleep2');
    }
});

// return Sleep Result;
Route::get('/Sleep3', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Sleep3');
    }
});

// return Sleep Tips Page;
Route::get('/Sleep4', function () {
    // Check if user has registered a child yet
    if (empty(Auth::user()->currentChild)) {
        return redirect('ChildRegistration');
    } else {
        return view('Sleep4');
    }
});

// ----------------------------- 
//store heigh
Route::post('StoreHeight', 'StoreAnswerController@storeHeight');
//store weight
Route::post('StoreWeight', 'StoreAnswerController@storeWeight');
//store waist
Route::post('StoreWaist', 'StoreAnswerController@storeWaist');
//post email 
Route::post('PostAddemail', 'AdminController@Addemail');
//get emails
Route::get('AdminAddUser', 'AdminController@viewUsers');
//deleate email 
Route::get('deletemail/{email}', 'AdminController@deleteemail');
//send email to user email
Route::get('send', 'EmailController@sendemail');
//send email to custom email account
Route::get('csend', 'EmailController@sendcemail');
//get z-scores 
Route::get('Weight4', 'StoreAnswerController@calculateBmi');
// export excel
Route::get('/admin/excel', 'ExportExcelController@excel')->name('export');
//excel export 
Route::get('/admin/excel2', 'ExportExcelController@excel2')->name('export2');
Route::get('/admin/excel3', 'ExportExcelController@excel3')->name('export3');
Route::get('/admin/excel4', 'ExportExcelController@excel4')->name('export4');
Route::get('/admin/excel5', 'ExportExcelController@excel5')->name('export5');
//admin page for child table
Route::get('Admin', 'AdminController@ChildTable');
Route::post('editwhyuse', 'SummernoteController@editwhyusefunction');
Route::post('editweight0', 'SummernoteController@editweight0function');
Route::post('editweight1', 'SummernoteController@editweight1function');
Route::post('editweight2', 'SummernoteController@editweight2function');
Route::post('editweight3', 'SummernoteController@editweight3function');
Route::post('editweight4', 'SummernoteController@editweight4function');
Route::post('editweight5', 'SummernoteController@editweight5function');
Route::post('editweight6', 'SummernoteController@editweight6function');
//------------------------------------
//routes to cintroller to edit pages and data is stored into database as html
Route::post('editdiet0', 'SummernoteController@editdiet0function');
Route::post('editdiet1', 'SummernoteController@editdiet1function');
Route::post('editdiet2', 'SummernoteController@editdiet2function');
Route::post('editdiet3', 'SummernoteController@editdiet3function');
Route::post('editdiet4', 'SummernoteController@editdiet4function');
//------------------------------------
//routes to cintroller to edit pages and data is stored into database as html
Route::post('editexercise0', 'SummernoteController@editexercise0function');
Route::post('editexercise1', 'SummernoteController@editexercise1function');
Route::post('editexercise11', 'SummernoteController@editexercise11function');
Route::post('editexercise2', 'SummernoteController@editexercise2function');
Route::post('editexercise3', 'SummernoteController@editexercise3function');
//------------------------------------
//routes to cintroller to edit pages and data is stored into database as html
Route::post('editscreentime0', 'SummernoteController@editscreentime0function');
Route::post('editscreentime1', 'SummernoteController@editscreentime1function');
Route::post('editscreentime2', 'SummernoteController@editscreentime2function');
Route::post('editscreentime21', 'SummernoteController@editscreentime21function');
Route::post('editscreentime3', 'SummernoteController@editscreentime3function');
Route::post('editscreentime4', 'SummernoteController@editscreentime4function');
Route::post('editscreentime5', 'SummernoteController@editscreentime5function');
//------------------------------------
//routes to cintroller to edit pages and data is stored into database as html
Route::post('editsleep0', 'SummernoteController@editsleep0function');
Route::post('editsleep1', 'SummernoteController@editsleep1function');
Route::post('editsleep2', 'SummernoteController@editsleep2function');
Route::post('editsleep3', 'SummernoteController@editsleep3function');
Route::post('editsleep4', 'SummernoteController@editsleep4function');


// Store input Data into database 
Route::post('StoreVeggies', 'StoreAnswerController@storeVeggies');
Route::post('StoreFruits', 'StoreAnswerController@storeFruits');
Route::post('StoreExercise', 'StoreAnswerController@storeExercise');
Route::post('StoreScreenSD', 'StoreAnswerController@storeScreenSD');
Route::post('StoreScreenNSD', 'StoreAnswerController@storeScreenNSD');
Route::post('StoreSleepSD', 'StoreAnswerController@storeSleepSD');
Route::post('StoreSleepNSD', 'StoreAnswerController@storeSleepNSD');

});




