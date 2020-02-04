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

    public function renderDefault() : void
    {
        if (!empty($this->template->flashes)) {
            $this->template->title = 'Vaše heslo bylo obnoveno!';
        } else {
            $this->template->title = 'Obnova hesla';
        }
    }

    /**
     * Password form component
     *
     * @return Form
     */
    public function createComponentPasswordForm() : Form
    {
        $form = new Form;

	$form->addEmail('email', 'Email:')->setRequired();
	$form->addSubmit('send', 'Send new password');
        $form->onSuccess[] = [$this, 'passwordFormSucceeded'];

	return $form;
    }
    /**
     *
     *
     * @param Form $form
     * @param \stdClass $values
     * @return void
     */
    public function passwordFormSucceeded(Form $form, \stdClass $values): void
    {
        $this->flashMessage("Odesláno na e-mail {$values->email}!", 'success');

        $this->redirect('this');
    }
}
