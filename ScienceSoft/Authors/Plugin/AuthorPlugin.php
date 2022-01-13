<?php
declare(strict_types=1);

namespace ScienceSoft\Authors\Plugin;

use ScienceSoft\Authors\Model\Author;

class AuthorPlugin
{
    /**
     * @param Author $subject
     * @return string
     */
    public function afterGetName(Author $subject): string
    {
        return '111';
    }
}
