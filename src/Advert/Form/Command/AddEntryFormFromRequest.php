<?php

namespace Acty\ClassifiedsModule\Advert\Form\Command;

use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;
use Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Http\Request;

class AddEntryFormFromRequest
{
    /**
     * Advert entry form builder
     *
     * @var \Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder
     */
    protected $builder;

    public function __construct(AdvertEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Add entry form from request
     *
     * @param \Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface $type
     * @param \Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder $builder
     * @param \Illuminate\Http\Request $request
     */
    public function handle(TypeRepositoryInterface $type, EntryFormBuilder $builder, Request $request)
    {
        $type = $type->find($request->get('type'));

        $this->builder->addForm('entry', $builder->setModel($type->getEntryModelName()));
    }
}