<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Admin;
use App\Models\User;
use App\Livewire\AddUser;





Route::get('/admin/add-user', AddUser::class)->middleware('auth')->name('admin.add-user');

    
Route::get('/', function () {
    return redirect()->route('login');
});

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

    // Authenticated routes
    Route::middleware(['auth'])->group(function () {
        
    Route::get('dashboard', \App\Livewire\Dashboard::class)->middleware(['verified'])->name('dashboard');
    
    Route::get('/crm-pipeline', \App\Livewire\Crm\CrmPipeline::class)->name('crm-pipeline');
    Route::get('/settings', \App\Livewire\UserProfile::class)->name('settings');
    Route::get('dashboard', \App\Livewire\Dashboard::class)->middleware(['verified'])->name('dashboard');
    Route::get('/master-list', \App\Livewire\SalesForecast::class)->name('master-list');
    Route::get('/crm-index', \App\Livewire\Crm\CrmIndex::class)->name('crm-index');
    Route::get('/crm-funnel', \App\Livewire\Crm\CrmFunnel::class)->name('crm-funnel');
    Route::get('/crm-calendar', \App\Livewire\Crm\CrmCalendar::class)->name('crm-calendar');
    Route::get('/crm-forecast', \App\Livewire\Crm\CrmForecast::class)->name('crm-forecast');
    Route::get('/crm-pipeline', \App\Livewire\Crm\CrmPipeline::class)->name('crm-pipeline');
    // Route::get('/settings/representative', \App\Livewire\Admin\Settings\AddRepresentative::class)->name('settings.representative');
    Route::get('crm/manage-opportunity', \App\Livewire\Crm\ManageOpportunity::class)->name('crm.manage-opportunity');

});




require __DIR__.'/auth.php';
