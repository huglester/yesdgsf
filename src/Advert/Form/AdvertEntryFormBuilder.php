<?php

namespace Acty\ClassifiedsModule\Advert\Form;

use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;
use Anomaly\Streams\Platform\Ui\Form\Multiple\MultipleFormBuilder;

class AdvertEntryFormBuilder extends MultipleFormBuilder
{
    public function onSavedEntry(EntryFormBuilder $builder)
    {
        $form = $this->forms->get('advert');

        $advert = $form->getFormEntry();

        $entry = $builder->getFormEntry();

        $advert->entry_id   = $entry->getId();
        $advert->entry_type = get_class($entry);
    }

    public function getContextualId()
    {
        $form = $this->forms->get('advert');

        return $form->getContextualId();
    }
}