<?php
declare(strict_types = 1);

namespace Get2text\Scanner;

interface FunctionsScannerInterface
{
    /**
     * @return ParsedFunction[]
     */
    public function scan(string $code, string $filename): array;
}
