<?php namespace Acty\ClassifiedsModule\Advert;

use Acty\ClassifiedsModule\Advert\Contract\AdvertInterface;
use Anomaly\Streams\Platform\Model\Classifieds\ClassifiedsAdvertsEntryModel;

class AdvertModel extends ClassifiedsAdvertsEntryModel implements AdvertInterface
{
    protected $with = [
        'entry',
        'translations',
    ];

    public function getType()
    {
        return $this->type;
    }

    public function getStrId() 
    {
        return $this->str_id;
    }
}
