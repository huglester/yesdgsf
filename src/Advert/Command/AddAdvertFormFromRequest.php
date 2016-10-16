<?php

namespace Acty\ClassifiedsModule\Advert\Command;

use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder;
use Acty\ClassifiedsModule\Type\TypeRepository;
use Illuminate\Http\Request;

class AddAdvertFormFromRequest
{
    protected $builder;

    public function __construct(AdvertEntryFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function handle(TypeRepository $type, AdvertFormBuilder $builder, Request $request)
    {
        $type = $type->find($request->get('type'));

        $this->builder->addForm('advert', $builder->setType($type));
    }
}