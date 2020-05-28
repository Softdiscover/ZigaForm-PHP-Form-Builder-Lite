<?php

namespace Gettext;

abstract class BaseTranslator
{
    public static $current;

    /**
     * Set a translation instance as global, to use it with the gettext functions.
     *
     * @param Translator $translator
     */
    public static function initGettextFunctions(TranslatorInterface $translator)
    {
        self::$current = $translator;

        include_once __DIR__.'/translator_functions.php';
    }

    /**
     * @see TranslatorInterface
     */
    public function register()
    {
        self::initGettextFunctions($this);
    }
}
