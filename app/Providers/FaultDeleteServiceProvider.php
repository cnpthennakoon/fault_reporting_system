<?php

namespace App\Providers;

use App\Fault;
use Illuminate\Support\ServiceProvider;

class FaultDeleteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        Fault::deleted(function($fault) {

            $fault->respond()->delete();

            $fault->photos->each(function($photo) {

                unlink(public_path() . $photo->file);
                $photo->delete();

            });


        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
