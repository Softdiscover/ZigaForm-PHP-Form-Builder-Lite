<?php
declare(strict_types = 1);

namespace Get2text\Loader;

use Get2text\Translations;

interface LoaderInterface
{
    public function loadFile(string $filename, Translations $translations = null): Translations;

    public function loadString(string $string, Translations $translations = null): Translations;
}
