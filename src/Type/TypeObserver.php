<?php namespace Acty\ClassifiedsModule\Type;

use Acty\ClassifiedsModule\Type\Commands\CreateStream;
use Acty\ClassifiedsModule\Type\Commands\DeleteStream;
use Anomaly\Streams\Platform\Entry\Contract\EntryInterface;
use Anomaly\Streams\Platform\Entry\EntryObserver;

class TypeObserver extends EntryObserver
{
    /**
     * Fired after the advert category has been created
     *
     * @param  \Anomaly\Streams\Platform\Entry\Contract\EntryInterface $entry
     */
    public function created(EntryInterface $entry)
    {
        $this->commands->dispatch(new CreateStream($entry));

        parent::created($entry);
    }

    /**
     * Fired after the advert category has been deleted
     *
     * @param \Anomaly\Streams\Platform\Entry\Contract\EntryInterface $entry
     */
    public function deleted(EntryInterface $entry)
    {
        $this->commands->dispatch(new DeleteStream($entry));

        parent::deleted($entry);
    }
}
