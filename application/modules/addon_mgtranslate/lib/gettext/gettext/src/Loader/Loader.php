<?php
declare(strict_types = 1);

namespace Get2text\Loader;

use Exception;
use Get2text\Translation;
use Get2text\Translations;

/**
 * Base class with common funtions for all loaders.
 */
abstract class Loader implements LoaderInterface
{
    public function loadFile(string $filename, Translations $translations = null): Translations
    {
        $string = static::readFile($filename);

        return $this->loadString($string, $translations);
    }

    public function loadString(string $string, Translations $translations = null): Translations
    {
        return $translations ?: $this->createTranslations();
    }

    protected function createTranslations(): Translations
    {
        return Translations::create();
    }

    protected function createTranslation(?string $context, string $original, string $plural = null): ?Translation
    {
        $translation = Translation::create($context, $original);

        if (isset($plural)) {
            $translation->setPlural($plural);
        }

        return $translation;
    }

    /**
     * Reads and returns the content of a file.
     */
    protected static function readFile(string $file): string
    {
        $length = filesize($file);

        if (!($fd = fopen($file, 'rb'))) {
            throw new Exception("Cannot read the file '$file', probably permissions");
        }

        $content = $length ? fread($fd, $length) : '';
        fclose($fd);

        return $content;
    }
}
