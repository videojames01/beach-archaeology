<?php





use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchaeologicalSubmissionController;

// Home route that passes $submissions from the controller
Route::get('/', [ArchaeologicalSubmissionController::class, 'index']);

// Resource routes for CRUD
Route::resource('submissions', ArchaeologicalSubmissionController::class);

// Optional login page
Route::get('/login', function () {
    return view('login');
});


