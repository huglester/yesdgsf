<?php

namespace Acty\ClassifiedsModule\Advert\Form;

use Acty\ClassifiedsModule\Advert\AdvertModel;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;

class AdvertEntryFormSections
{
    public function handle(AdvertEntryFormBuilder $builder)
    {
        $builder->setSections([
            'general' => [
                'fields' => [
                    'advert_name',
                    'advert_description',
                    'advert_image',
                    'advert_gallery',
                    'advert_files'
                ]
            ],
            'fields'       => [
                'fields' => function(AdvertEntryFormBuilder $builder) {
                    return array_map(
                        function(FieldType $field) {
                            return 'entry_' . $field->getField();
                        },
                        array_filter(
                            $builder->getFormFields()->base()->all(),
                            function(FieldType $field) {
                                return ! $field->getEntry() instanceof AdvertModel;
                            }
                        )
                    );
                },
            ],
        ]);
    }
}