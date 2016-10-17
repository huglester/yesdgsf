<?php namespace Acty\ClassifiedsModule\Http\Controller\Admin;

use Acty\ClassifiedsModule\Advert\AdvertRepository;
use Acty\ClassifiedsModule\Advert\Command\AddFormsFromRequest;
use Acty\ClassifiedsModule\Advert\Form\AdvertEntryFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\AdvertFormBuilder;
use Acty\ClassifiedsModule\Advert\Form\Command\AddAdvertFormFromAdvert;
use Acty\ClassifiedsModule\Advert\Form\Command\AddAdvertFormFromRequest;
use Acty\ClassifiedsModule\Advert\Form\Command\AddEntryFormFromAdvert;
use Acty\ClassifiedsModule\Advert\Form\Command\AddEntryFormFromRequest;
use Acty\ClassifiedsModule\Advert\Table\AdvertTableBuilder;
use Acty\ClassifiedsModule\Entry\Form\EntryFormBuilder;
use Acty\ClassifiedsModule\Type\TypeRepository;
use Anomaly\Streams\Platform\Http\Controller\AdminController;

class AdvertsController extends AdminController
{

    /**
     * Display an index of existing entries.
     *
     * @param AdvertTableBuilder $table
     * 
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(AdvertTableBuilder $table)
    {
        return $table->render();
    }

    public function create(AdvertEntryFormBuilder $form)
    {
        $this->dispatch(new AddEntryFormFromRequest($form));
        $this->dispatch(new AddAdvertFormFromRequest($form));

        return $form->render();
    }

    public function edit(AdvertRepository $advert, AdvertEntryFormBuilder $form, $id)
    {
        $advert = $advert->find($id);

        $this->dispatch(new AddEntryFormFromAdvert($form, $advert));
        $this->dispatch(new AddAdvertFormFromAdvert($form, $advert));

        return $form->render($id);
    }

    /**
     * Choose advert type
     *
     * @param  \Acty\ClassifiedsModule\Type\TypeRepository $type
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function choose(TypeRepository $type)
    {
        return view('module::admin/adverts/choose', ['types' => $type->all()]);
    }
}
