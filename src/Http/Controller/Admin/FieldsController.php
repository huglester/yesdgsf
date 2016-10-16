<?php

namespace Acty\ClassifiedsModule\Http\Controller\Admin;

use Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection;
use Anomaly\Streams\Platform\Field\Form\FieldFormBuilder;
use Anomaly\Streams\Platform\Field\Table\FieldTableBuilder;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class FieldsController extends AdminController
{
    /**
     * Display available fields
     *
     * @param  \Anomaly\Streams\Platform\Field\Table\FieldTableBuilder $table
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(FieldTableBuilder $table)
    {
        $table->setNamespace('classifieds');
        
        return $table->render();
    }

    /**
     * Choose field to add
     *
     * @param  \Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection $fieldTypes
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function choose(FieldTypeCollection $fieldTypes)
    {
        return view('module::admin/fields/choose', ['field_types' => $fieldTypes]);
    }

    /**
     * Disaply create field form
     *
     * @param  \Anomaly\Streams\Platform\Field\Form\FieldFormBuilder    $form
     * @param  \Anomaly\Streams\Platform\Addon\FieldType\FieldTypeCollection $fieldTypes
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(FieldFormBuilder $form, FieldTypeCollection $fieldTypes)
    {
        $form->setNamespace('classifieds')
            ->setFieldType($fieldTypes->get($_GET['field_type']));
        
        return $form->render();
    }

    /**
     * Display field edit form
     *
     * @param  \Anomaly\Streams\Platform\Field\Form\FieldFormBuilder $form
     * @param  integer $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function edit(FieldFormBuilder $form, $id)
    {
        return $form->render($id);
    }
}