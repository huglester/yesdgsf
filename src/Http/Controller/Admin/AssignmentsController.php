<?php

namespace Acty\ClassifiedsModule\Http\Controller\Admin;

use Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Assignment\Form\AssignmentFormBuilder;
use Anomaly\Streams\Platform\Assignment\Table\AssignmentTableBuilder;
use Anomaly\Streams\Platform\Field\Contract\FieldRepositoryInterface;
use Anomaly\Streams\Platform\Http\Controller\AdminController;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;
use Anomaly\Streams\Platform\Ui\Breadcrumb\BreadcrumbCollection;

class AssignmentsController extends AdminController
{
    public function index(
        AssignmentTableBuilder $table,
        TypeRepositoryInterface $type,
        BreadcrumbCollection $breadcrumbs,
        $id
    ) {
        $breadcrumbs->put(
            'streams::breadcrumb.assignments', 
            'admin/classifieds/categories/assignments/'.$id
        );

        $type = $type->find($id);
        
        return $table->setStream($type->getEntryStream())->render();
    }

    public function create(FieldRepositoryInterface $fields, TypeRepositoryInterface $type, $id)
    {
        $type = $type->find($id);

        $fields = $fields->findAllByNamespace('classifieds')
            ->notAssignedTo($type->getEntryStream())->unlocked();

        return view(
            'module::admin/assignments/create',
            [
                'fields' => $fields,
                'id'     => $id,
            ]
        );
    }

    public function store(
        AssignmentFormBuilder $form,
        TypeRepositoryInterface $type,
        FieldRepositoryInterface $fields,
        $id,
        $field
    ) {
        $type = $type->find($id);
        $field = $fields->find($field);

        return $form->setStream($type->getEntryStream())->setField($field)->render();
    }

    public function edit(
        AssignmentFormBuilder $form,
        BreadcrumbCollection $breadcrumbs,
        $id,
        $assignment
    ) {
        $breadcrumbs->put(
            'streams::breadcrumb.assignments', 
            'admin/classifieds/categories/assignments/{id}/edit/{field}'
        );

        return $form->render($assignment);
    }
}