<?php namespace Acty\ClassifiedsModule\Type;

use Acty\ClassifiedsModule\Type\Commands\GetStream;
use Acty\ClassifiedsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Model\Classifieds\ClassifiedsTypesEntryModel;

class TypeModel extends ClassifiedsTypesEntryModel implements TypeInterface
{
    /**
     * Get model slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }
    
    /**
     * Get stream by model entry
     *
     * @return \Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface|null
     */
    public function getEntryStream()
    {
        return $this->dispatch(new GetStream($this));
    }

    /**
     * Get the related entry model.
     *
     * @return EntryModel
     */
    public function getEntryModel()
    {
        $stream = $this->getEntryStream();

        return $stream->getEntryModel();
    }
    /**
     * Get the related entry model name.
     *
     * @return string
     */
    public function getEntryModelName()
    {
        $stream = $this->getEntryStream();
        
        return $stream->getEntryModelName();
    }

    public function getDescription()
    {
        return $this->description;
    }
}
