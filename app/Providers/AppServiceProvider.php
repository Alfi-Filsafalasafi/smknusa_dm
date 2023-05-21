<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('admin.layouts.master', function ($view) {
            $user = Auth::user();
            $idJurusan = User::where('name', $user->name)->value('id_jurusan');
            $jurusan = Jurusan::find($idJurusan);
            $view->with('jurusan', $jurusan);
        });
    }
}
