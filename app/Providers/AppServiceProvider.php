<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // refer to : https://stackoverflow.com/questions/32036882/laravel-validate-an-integer-field-that-needs-to-be-greater-than-another
        Validator::extend('greater_than_field', function($attribute, $value, $parameters, $validator) {
          $min_field = $parameters[0];
          $data = $validator->getData();
          $min_value = $data[$min_field];
          return $value > $min_value;
        });   

        Validator::replacer('greater_than_field', function($message, $attribute, $rule, $parameters) {
          return str_replace(':field', $parameters[0], $message);
        });
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
