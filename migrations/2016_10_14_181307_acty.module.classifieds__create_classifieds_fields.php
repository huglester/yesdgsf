<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;
use Anomaly\UsersModule\User\UserModel;

class ActyModuleClassifiedsCreateClassifiedsFields extends Migration
{

    /**
     * The addon fields.
     *
     * @var array
     */
    protected $fields = [
        'name' => 'anomaly.field_type.text',
        'description' => 'anomaly.field_type.text',
        'slug' => [
            'type' => 'anomaly.field_type.slug',
            'config' => [
                'slugify' => 'name'
            ]
        ],
        'type' => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Acty\ClassifiedsModule\Type\TypeModel'
            ],
        ],
        'user' => [
            'type'   => 'anomaly.field_type.relationship',
            'config' => [
                'related' => 'Anomaly\UsersModule\User\UserModel'
            ],
        ],
        'entry' => 'anomaly.field_type.polymorphic',
        'str_id' => 'anomaly.field_type.text'
    ];

}
