<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Nette\Application\UI\Form;

/**
 * Handles new password form and sending info to user email
 */
final class PasswordPresenter extends Nette\Application\UI\Presenter
{
    private \App\Components\FormFactory $formFactory;

    public function __construct(\App\Components\FormFactory $formFactory)
    {
        parent::__construct();
        $this->formFactory = $formFactory;
    }


    protected function createComponentPasswordForm(): ?\Nette\ComponentModel\IComponent
    {
        return $this->formFactory->create();
    }

    public function renderDefault() : void
    {
        if (!empty($this->template->flashes)) {
            $this->template->title = 'Vaše heslo bylo obnoveno!';
        } else {
            $this->template->title = 'Obnova hesla';
        }
    }

}
