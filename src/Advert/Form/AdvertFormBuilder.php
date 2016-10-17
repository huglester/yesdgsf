<?php namespace Acty\ClassifiedsModule\Advert\Form;

use Acty\ClassifiedsModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Ui\Form\FormBuilder;

class AdvertFormBuilder extends FormBuilder
{

    /**
     * The form fields.
     *
     * @var array|string
     */
    protected $fields = [];

    /**
     * Fields to skip.
     *
     * @var array|string
     */
    protected $skips = [
        'type',
        'entry',
        'str_id'
    ];

    /**
     * The form actions.
     *
     * @var array|string
     */
    protected $actions = [];

    /**
     * The form buttons.
     *
     * @var array|string
     */
    protected $buttons = [];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [];

    /**
     * The form sections.
     *
     * @var array
     */
    protected $sections = [];

    /**
     * The form assets.
     *
     * @var array
     */
    protected $assets = [];

    /**
     * Entry type
     *
     * @var integer
     */
    protected $type;

    public function onReady()
    {
        if ( ! $this->getType() && ! $this->getEntry()) {
            throw new \Exception('Advert need a type!');
        }
    }

    public function onSaving()
    {
        $entry = $this->getFormEntry();
        $type = $this->getType();

        if ( ! $entry->type_id) {
            $entry->type_id = $type->getId();
        }
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType(TypeInterface $type)
    {
        $this->type = $type;
        
        return $this;
    }

}
