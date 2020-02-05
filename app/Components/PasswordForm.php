<?php
declare(strict_types=1);

namespace App\Components;

use Nette\Application\UI;

/**
 * Description of PasswordForm
 *
 * @author windigo
 */
class PasswordForm extends UI\Form
{

    public function __construct(\Nette\ComponentModel\IContainer $parent = null, string $name = null)
    {
        parent::__construct($parent, $name);

        $this->addProtection();
        $this->addEmail('email', 'Email:')->setRequired();
        $this->addSubmit('send', 'Send new password');
        $this->onSuccess[] = [$this, 'passwordFormSucceeded'];
    }


    /**
     *
     * @param Form $form
     * @param \stdClass $values
     * @return void
     */
    public function passwordFormSucceeded(UI\Form $form, \stdClass $values): void
    {
        $this->parent->flashMessage("Odesláno na e-mail {$values->email}!", 'success');

        $this->parent->redirect('this');
    }
}
