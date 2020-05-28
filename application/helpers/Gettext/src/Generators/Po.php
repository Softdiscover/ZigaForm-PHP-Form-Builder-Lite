<?php

namespace Gettext\Generators;

use Gettext\Translations;

class Po extends Generator implements GeneratorInterface
{
    /**
     * {@parentDoc}.
     */
    public static function toString(Translations $translations)
    {
        $lines = array('msgid ""', 'msgstr ""');

        $headers = $translations->getHeaders();
        $headers['PO-Revision-Date'] = date('c');

        foreach ($headers as $name => $value) {
            $lines[] = '"'.$name.': '.$value.'\\n"';
        }

        $lines[] = '';

        //Translations
        foreach ($translations as $translation) {
            if ($translation->hasComments()) {
                foreach ($translation->getComments() as $comment) {
                    $lines[] = '# '.$comment;
                }
            }

            if ($translation->hasExtractedComments()) {
                foreach ($translation->getExtractedComments() as $comment) {
                    $lines[] = '#. '.$comment;
                }
            }

            if ($translation->hasReferences()) {
                foreach ($translation->getReferences() as $reference) {
                    $lines[] = '#: '.$reference[0].(!is_null($reference[1]) ? ':'.$reference[1] : null);
                }
            }

            if ($translation->hasFlags()) {
                $lines[] = '#, '.implode(',', $translation->getFlags());
            }

            if ($translation->hasContext()) {
                $lines[] = 'msgctxt '.self::quote($translation->getContext());
            }

            self::addLines($lines, 'msgid', self::removeEOT($translation->getOriginal()));
            if ($translation->hasPlural()) {
                self::addLines($lines, 'msgid_plural', self::removeEOT($translation->getPlural()));
                self::addLines($lines, 'msgstr[0]', self::removeEOT($translation->getTranslation()));

                foreach ($translation->getPluralTranslation() as $k => $v) {
                    self::addLines($lines, 'msgstr['.($k + 1).']', $v);
                }
            } else {
                self::addLines($lines, 'msgstr', self::removeEOT($translation->getTranslation()));
            }

            $lines[] = '';
        }

        return implode("\n", $lines);
    }

    /**
     * Escape Control Characters like EOT from strings.
     * 
     * @param string $text
     * 
     * @return string
     */
    private static function removeEOT($text)
    {
        return  preg_replace('/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F]/', '', $text);
    }

    /**
     * Escapes and adds double quotes to a string.
     *
     * @param string $string
     *
     * @return string
     */
    private static function quote($string)
    {
        return '"'.str_replace(array('\\', "\r", "\n", "\t", '"'), array('\\\\', '', '\n', '\t', '\\"'), $string).'"';
    }

    /**
     * Escapes and adds double quotes to a string.
     *
     * @param string $string
     *
     * @return string
     */
    private static function multilineQuote($string)
    {
        $lines = explode("\n", $string);
        $last = count($lines) - 1;

        foreach ($lines as $k => $line) {
            if ($k === $last) {
                $lines[$k] = self::quote($line);
            } else {
                $lines[$k] = self::quote($line."\n");
            }
        }

        return $lines;
    }

    /**
     * Add one or more lines depending whether the string is multiline or not.
     *
     * @param array  &$lines
     * @param string $name
     * @param string $value
     */
    private static function addLines(array &$lines, $name, $value)
    {
        $newLines = self::multilineQuote($value);

        if (count($newLines) === 1) {
            $lines[] = $name.' '.$newLines[0];
        } else {
            $lines[] = $name.' ""';

            foreach ($newLines as $line) {
                $lines[] = $line;
            }
        }
    }
}
