<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class ActyModuleClassifiedsCreateTypesStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'types',
        'trashable' => true,
        'translatable' => true,
        'title_column' => 'name',
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'required' => true,
            'translatable' => true
        ],
        'description',
        'slug' => [
            'required' => true
        ]
    ];

}
