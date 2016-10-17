<?php

namespace Acty\ClassifiedsModule\Advert\Form\Command;

use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder;
use Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface;
use Illuminate\Http\Request;

class AddAdvertFormFromRequest
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
     * Add advert form from request
     *
     * @param \Acty\ClassifiedsModule\Type\Contract\TypeRepositoryInterface $type
     * @param \Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder $builder
     * @param \Illuminate\Http\Request $request
     */
    public function handle(TypeRepositoryInterface $type, AdvertFormBuilder $builder, Request $request)
    {
        $type = $type->find($request->get('type'));

        $this->builder->addForm('advert', $builder->setType($type));
    }
}