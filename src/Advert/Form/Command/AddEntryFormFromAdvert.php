<?php

namespace Acty\ClassifiedsModule\Advert\Form\Command;

use Acty\ClassifiedsModule\Advert\Contract\AdvertInterface;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;

class AddEntryFormFromAdvert
{
    /**
     * Advert entry form builder
     * 
     * @var \Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder
     */
    protected $builder;

    /**
     * Advert interface
     * 
     * @var \Acty\ClassifiedsModule\Advert\Contract\AdvertInterface
     */
    protected $advert;

    public function __construct(AdvertEntryFormBuilder $builder, AdvertInterface $advert)
    {
        $this->builder = $builder;
        $this->advert = $advert;
    }

    /**
     * Add entry form from advert
     *
     * @param \Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder $builder
     */
    public function handle(EntryFormBuilder $builder)
    {
        $type = $this->advert->getType();

        $builder->setModel($type->getEntryModelName());
        $builder->setEntry($this->advert->getEntryId());

        $this->builder->addForm('entry', $builder);
    }
}