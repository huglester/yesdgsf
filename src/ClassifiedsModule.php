<?php namespace Acty\ClassifiedsModule;

use Anomaly\Streams\Platform\Addon\Module\Module;

class ClassifiedsModule extends Module
{
    /**
     * The module sections.
     *
     * @var array
     */
    protected $sections = [
        'adverts' => [
            'buttons' => [
                'new_advert' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/classifieds/choose',
                ]
            ]
        ],
        'types' => [
            'buttons' => [
                'new_type' => [
                    'enabled' => 'admin/classifieds/types'
                ],
                'assign_fields' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'enabled'     => 'admin/classifieds/types/assignments/*',
                    'href'        => 'admin/classifieds/types/assignments/{request.route.parameters.id}/create',
                ],

            ]
        ],
        'fields'    => [
            'buttons' => [
                'new_field' => [
                    'data-toggle' => 'modal',
                    'data-target' => '#modal',
                    'href'        => 'admin/classifieds/fields/choose',
                ],
            ],
        ],
    ];
}
