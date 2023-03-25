<?php
declare(strict_types = 1);

namespace Get2text\Scanner;

use Get2text\Translations;

interface ScannerInterface
{
    public function setDefaultDomain(string $domain): void;

    public function getDefaultDomain(): string;

    /**
     * @return Translations[]
     */
    public function getTranslations(): array;

    public function scanFile(string $filename): void;

    public function scanString(string $string, string $filename): void;
}
