<?php

namespace EdwardAlgorist\Categorizable\Providers;

use Illuminate\Support\ServiceProvider;

class CategorizableServiceProvider extends ServiceProvider
{

    public function boot()
    {

        if ($this->app->runningInConsole())
        {

            $this->publishes([
                __DIR__ . '/../database/migrations/create_categories_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_categories_table.php'),
                __DIR__ . '/../database/migrations/create_category_models_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_category_models_table.php'),
            ], 'migrations');

        }

    }

}