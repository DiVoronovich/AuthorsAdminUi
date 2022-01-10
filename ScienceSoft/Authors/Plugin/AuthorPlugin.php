<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Plugin;

use ScienceSoft\Authors\Model\Author;

class AuthorPlugin
{
    public function afterGetName(Author $subject)
    {
        return '111';
    }
}
