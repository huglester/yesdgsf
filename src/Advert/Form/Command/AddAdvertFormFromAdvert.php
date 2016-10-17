<?php

namespace Acty\ClassifiedsModule\Advert\Form\Command;

use Acty\ClassifiedsModule\Advert\Contract\AdvertInterface;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder;

class AddAdvertFormFromAdvert
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
     * Add advert form from advert model
     *
     * @param \Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder $builder
     * @param \Acty\ClassifiedsModule\Advert\Contract\AdvertInterface $advert
     */
    public function handle(AdvertFormBuilder $builder)
    {
        $builder->setEntry($this->advert->getId());

        $this->builder->addForm('advert', $builder);
    }
}