<?php

use Anomaly\Streams\Platform\Database\Migration\Migration;

class ActyModuleClassifiedsCreateAdvertsStream extends Migration
{

    /**
     * The stream definition.
     *
     * @var array
     */
    protected $stream = [
        'slug' => 'adverts',
        'trashable' => true,
        'title_column' => 'name',
        'translatable' => true,
        'searchable' => true
    ];

    /**
     * The stream assignments.
     *
     * @var array
     */
    protected $assignments = [
        'name' => [
            'translatable' => true,
            'required' => true
        ],
        'description' => [
            'translatable' => true,
            'required' => true
        ],
        'image',
        'gallery',
        'files',
        'type' => [
            'required' => true
        ],
        'user' => [
            'required' => true
        ],
        'entry' => [
            'required' => true
        ],
        'str_id' => [
            'required' => true,
        ]
    ];

}
