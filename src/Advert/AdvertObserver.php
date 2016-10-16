<?php namespace Acty\ClassifiedsModule\Advert;

use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

class AdvertObserver extends EntryObserver
{
    /**
     * Fired just before saving the entry.
     *
     * @param EntryInterface|PostInterface $entry
     */
    public function creating(EntryInterface $entry)
    {
        if ( ! $entry->getStrId()) {
            $entry->setAttribute('str_id', str_random());
        }
        
        parent::creating($entry);
    }
}
