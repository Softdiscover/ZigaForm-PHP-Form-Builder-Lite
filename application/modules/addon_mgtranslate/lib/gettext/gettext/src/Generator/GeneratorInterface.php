<?php
declare(strict_types = 1);

namespace Get2text\Generator;

use Get2text\Translations;

interface GeneratorInterface
{
    public function generateFile(Translations $translations, string $filename): bool;

    public function generateString(Translations $translations): string;
}
