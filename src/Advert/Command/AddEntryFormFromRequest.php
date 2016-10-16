<?php

namespace Acty\ClassifiedsModule\Advert\Command;

use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;
use Acty\ClassifiedsModule\Type\TypeRepository;
use Illuminate\Http\Request;

class AddEntryFormFromRequest
{
    protected $builder;

    public function __construct(AdvertEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function handle(TypeRepository $type, EntryFormBuilder $builder, Request $request)
    {
        $type = $type->find($request->get('type'));

        $this->builder->addForm('entry', $builder->setModel($type->getEntryModelName()));
    }
}