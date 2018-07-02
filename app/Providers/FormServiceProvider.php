<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('text', 'components.form.text', ['name', 'value' => null, 'attribues' => []]);
        Form::component('textarea', 'components.form.textarea', ['name', 'value' => null, 'attribues' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attribues'=> []]);
        Form::component('submit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('file', 'components.form.file', ['name', 'attribues' => []]);
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
