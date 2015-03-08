<?php

/*
 * This file is part of the PHP CS utility.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Symfony\CS\Fixer\Contrib;

use Symfony\CS\AbstractFixer;

/**
 * Fixer for latin1 projects, converts the utf8 files to latin1.
 *
 * @author Odín del Río Piñeiro <odin.drp@gmail.com>
 */
class Utf8ToLatin1Fixer extends AbstractFixer
{
    /**
     * {@inheritdoc}
     */
    public function fix(\SplFileInfo $file, $content)
    {
        return mb_check_encoding($content, 'UTF-8')
            ? mb_convert_encoding($content, 'ISO-8859-1', 'UTF-8')
            : $content;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return 'Converts UTF-8 files to latin1 (ISO 8859-1).';
    }

    /**
     * {@inheritdoc}
     */
    public function getPriority()
    {
        // Due to may perform encoding operations, should run first.
        return 100;
    }
}
