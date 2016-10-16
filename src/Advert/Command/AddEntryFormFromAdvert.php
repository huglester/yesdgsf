<?php

namespace Acty\ClassifiedsModule\Advert\Command;

use Acty\ClassifiedsModule\Advert\AdvertModel;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;

class AddEntryFormFromAdvert
{
    public function __construct(AdvertEntryFormBuilder $builder, AdvertModel $advert)
    {
        $this->builder = $builder;
        $this->advert = $advert;
    }

    public function handle(EntryFormBuilder $builder)
    {
        $type = $this->advert->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->advert->getEntryId());

        $this->builder->addForm('entry', $builder);
    }
}