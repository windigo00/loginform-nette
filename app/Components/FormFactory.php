<?php
declare(strict_types=1);

namespace App\Components;

use Nette;
use App\Components\PasswordForm;

/**
 * Description of FormFactory
 *
 * @author windigo
 */
final class FormFactory
{

    public function create(): PasswordForm
    {
        $form = new PasswordForm;

        return $form;
    }
}
