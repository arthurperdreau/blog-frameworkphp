<?php

namespace App\Form;

use Core\Form\FormType;
use Core\Form\FormParam;

class CommentType extends FormType
{
    public function __construct()
    {
        $this->build();
    }

    private function build(): void
    {

        $this->add(new FormParam("postId", "number"));
        $this->add(new FormParam("content", "string"));
    }
}