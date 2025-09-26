
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\StudentAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\StudentController as AdminStudentController;
use App\Http\Controllers\Admin\DocumentRequirementController;
use App\Http\Controllers\Admin\UploadViewController;
use App\Http\Controllers\Student\DashboardController as StudentDashboard;
use App\Http\Controllers\Student\StudentDocumentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function(){
    return view('welcome');
});

// Redirect /admin and /student to their dashboards
Route::get('/admin', function() {
    return redirect()->route('admin.dashboard');
});
Route::get('/student', function() {
    return redirect()->route('student.dashboard');
});

// Admin auth
Route::get('/admin/login', [AdminAuthController::class,'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class,'login'])->name('admin.login.post');
Route::get('/admin/logout', [AdminAuthController::class,'logout'])->name('admin.logout');

// Student auth
Route::get('/student/login', [StudentAuthController::class,'showLogin'])->name('student.login');
Route::post('/student/login', [StudentAuthController::class,'login'])->name('student.login.post');
Route::get('/student/logout', [StudentAuthController::class,'logout'])->name('student.logout');
Route::get('/student/change-password', [StudentAuthController::class,'showChangePassword'])->name('student.change_password');
Route::post('/student/change-password', [StudentAuthController::class,'changePassword'])->name('student.change_password.post');

// Admin protected routes (controller constructors check session)
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', [AdminDashboard::class,'index'])->name('admin.dashboard');

    // Admin settings
    Route::get('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'show'])->name('admin.settings');
    Route::put('/settings', [\App\Http\Controllers\Admin\SettingsController::class, 'update'])->name('admin.settings.update');

    Route::resource('faculties', FacultyController::class);
    Route::resource('departments', DepartmentController::class);
    Route::get('students/bulk-upload', [AdminStudentController::class, 'showBulkUpload'])->name('students.bulk_upload');
    Route::post('students/bulk-upload', [AdminStudentController::class, 'bulkUpload'])->name('students.bulk_upload');
    Route::resource('students', AdminStudentController::class);
    Route::resource('document-requirements', DocumentRequirementController::class);
    Route::get('uploads', [UploadViewController::class,'index'])->name('admin.uploads.index');
    Route::get('uploads/{student}', [UploadViewController::class,'show'])->name('admin.uploads.show');
    Route::get('uploads/file/{doc}', [UploadViewController::class,'details'])->name('admin.uploads.details');
    Route::post('uploads/{doc}/request-resubmission', [UploadViewController::class,'requestResubmission'])->name('admin.uploads.request_resubmission');
    Route::post('uploads/{doc}/cancel-resubmission', [UploadViewController::class,'cancelResubmission'])->name('admin.uploads.cancel_resubmission');

    // Bulk actions for uploads
    Route::post('uploads/bulk/approve', [UploadViewController::class, 'bulkApprove'])->name('admin.uploads.bulk_approve');
    Route::post('uploads/bulk/request-resubmission', [UploadViewController::class, 'bulkRequestResubmission'])->name('admin.uploads.bulk_request_resubmission');
    Route::post('uploads/bulk/delete', [UploadViewController::class, 'bulkDelete'])->name('admin.uploads.bulk_delete');
    Route::post('uploads/bulk/download', [UploadViewController::class, 'bulkDownload'])->name('admin.uploads.bulk_download');
});

// Student routes
Route::prefix('student')->group(function(){
    Route::get('/dashboard', [StudentDashboard::class,'index'])->name('student.dashboard');
    Route::get('/uploads', [StudentDocumentController::class,'index'])->name('student.uploads.index');
    Route::get('/uploads/{requirement}/create', [StudentDocumentController::class,'create'])->name('student.uploads.create');
    Route::post('/uploads/{requirement}', [StudentDocumentController::class,'store'])->name('student.uploads.store');
    Route::get('/uploads/{id}/edit', [StudentDocumentController::class,'edit'])->name('student.uploads.edit');
    Route::post('/uploads/{id}/update', [StudentDocumentController::class,'update'])->name('student.uploads.update');
    Route::get('/uploads/{id}/download', [StudentDocumentController::class,'download'])->name('student.uploads.download');

    // Bulk actions for student uploads
    Route::post('/uploads/bulk/delete', [StudentDocumentController::class, 'bulkDelete'])->name('student.uploads.bulk_delete');
    Route::post('/uploads/bulk/download', [StudentDocumentController::class, 'bulkDownload'])->name('student.uploads.bulk_download');
});
// Notification API routes
Route::get('/notifications', [\App\Http\Controllers\NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/{id}/read', [\App\Http\Controllers\NotificationController::class, 'markAsRead'])->name('notifications.read');
