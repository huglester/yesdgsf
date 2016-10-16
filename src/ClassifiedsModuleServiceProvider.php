<?php namespace Acty\ClassifiedsModule;

use Acty\ClassifiedsModule\Category\CategoryRepository;
use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class ClassifiedsModuleServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $routes = [
        'admin/classifieds' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AdvertsController@index',
        'admin/classifieds/create' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AdvertsController@create',
        'admin/classifieds/edit/{id}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AdvertsController@edit',
        'admin/classifieds/choose' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AdvertsController@choose',
        
        'admin/classifieds/types' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\TypesController@index',
        'admin/classifieds/types/create' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\TypesController@create',
        'admin/classifieds/types/edit/{id}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\TypesController@edit',

        'admin/classifieds/fields' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\FieldsController@index',
        'admin/classifieds/fields/choose' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\FieldsController@choose',
        'admin/classifieds/fields/create' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\FieldsController@create',
        'admin/classifieds/fields/edit/{id}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\FieldsController@edit',

        'admin/classifieds/types/assignments/{id}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AssignmentsController@index',
        'admin/classifieds/types/assignments/{id}/create' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AssignmentsController@create',
        'admin/classifieds/types/assignments/{id}/assign/{field}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AssignmentsController@store',
        'admin/classifieds/types/assignments/{id}/edit/{field}' => 
            'Acty\ClassifiedsModule\Http\Controller\Admin\AssignmentsController@edit'
        ];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }

}
