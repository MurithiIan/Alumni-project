<?php 
use App\Models\applied_job;
use App\Models\job_postings;
use Illuminate\Http\Request;
use App\Models\alumni_portfolios;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AppliedJobs;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PermissionController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('portfolio', PortfolioController::class);
Route::resource('jobs', JobController::class);
Route::get('jobs/{jobId}/delete', [JobController::class, 'destroy']);


Route::resource('/applicants', AppliedJobs::class);

Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
Route::resource('permissions', PermissionController::class);
Route::resource('users', UserController::class);
Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

Route::resource('roles', RoleController::class);
Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);


Route::post('apply/{id}', function (Request $request, $id) {

    $user = Auth::user()->id;
    // Redirect or return a response
     applied_job::create([
       'user_id' =>  $user,
       'job_id' => $id,
       'fname' => $request->input('fname'), 
        'lname' =>  $request->input('lname'),
        'user_info' =>  $request->input('user_info'),
         
         
        ]);;

        return redirect('/dashboard')->with('status', 'You have successfully applied for this job.');

});



Route::get('jobs/{jobId}/view', function ($id) {

    // Find the job details
   $job = job_postings::findOrFail($id);
 
   $portfolio = alumni_portfolios::where('user_id', Auth::id())->firstOrFail();

    // Prepare data for the view
    $user = Auth::user();
    return view('Action.jobs.view-job', [
        'user' => $user->name,
        'title' => $job->job_title,
        'id' => $job->id,
        'portfolio'=> $portfolio,
        'name' => $job->job_name,
        'description' => $job->job_description,
        'qualification' => $job->job_qualification,
        'amount' => $job->job_amount,
    ]);
});




Route::get('/dashboard', function () {
    $jobs = job_postings::all();

    return view('dashboard', compact('jobs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
