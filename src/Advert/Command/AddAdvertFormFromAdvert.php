<?php

namespace Acty\ClassifiedsModule\Advert\Command;

use Acty\ClassifiedsModule\Advert\AdvertModel;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder;

class AddAdvertFormFromAdvert
{
    public function __construct(AdvertEntryFormBuilder $builder, AdvertModel $advert)
    {
        $this->builder = $builder;
        $this->advert = $advert;
    }

    public function handle(AdvertFormBuilder $builder)
    {
        $builder->setEntry($this->advert->getId());

        $this->builder->addForm('advert', $builder);
    }
}