<?php

namespace PoParser;

class Parser
{

    /**
     * @var array
     */
    protected $headers = array();

    /**
     * @var Entry[]
     */
    protected $entries = array();

    /**
     * @var array
     */
    protected $entriesAsArrays = array();

    /**
     * @var string
     */
    protected $state;

    /**
     * @var array
     */
    protected $rawEntries;

    /**
     * @var array
     */
    protected $currentEntry;

    /**
     * @var boolean
     */
    protected $justNewEntry;

    /**
     * @return Entry[]
     */
    public function getEntries()
    {
        return $this->entries;
    }

    /**
     * @return array
     */
    public function getEntriesAsArrays()
    {
        return $this->entriesAsArrays;
    }

    /**
     * Reads and parses strings in a .po file.
     *
     *  return An array of entries located in the file:
     *  Format: array(
     *      'msgid'     => <string> ID of the message.
     *      'msgctxt'   => <string> Message context.
     *      'msgstr'    => <string> Message translation.
     *      'tcomment'  => <string> Comment from translator.
     *      'ccomment'  => <string> Extracted comments from code.
     *      'references' => <array> Location of string in code.
     *      'obsolete'  => <bool> Is the message obsolete?
     *      'fuzzy'     => <bool> Is the message "fuzzy"?
     *      'flags'     => <array> Flags of the entry. Internal usage.
     *  )
     *
     *   #~ (old entry)
     *   # @ default
     *   #, fuzzy
     *   #~ msgid "Editar datos"
     *   #~ msgstr "editar dades"
     *
     * @param string $filePath
     * @throws \Exception
     * @return array|bool
     */
    public function read($filePath)
    {
         $this->rawEntries = array();
        $this->currentEntry = $this->createNewEntryAsArray();
        $this->state = null;
        $this->justNewEntry = false;

        $handle = $this->openFile($filePath);
        while ( ! feof($handle)) {
            $line = trim(fgets($handle));
            $this->processLine($line);
        }
        fclose($handle);

        $this->addFinalEntry();
        $this->prepareResults();

        return $this->entriesAsArrays;
    }

    /**
     * @param string $line
     *
     * @throws \Exception
     */
    protected function processLine($line)
    {
        if ( $line === '') {
            $this->handleBlankLine();
            return;
        }

        $this->justNewEntry = false;

        $data = $this->parseLine($line);

        if ( $data['key'][0] === '#') {
            $this->handleComment($data);
            return;
        }

        $this->handleOtherCases($data, $line);
    }

    /**
     *
     */
    protected function handleBlankLine()
    {
        if ( $this->justNewEntry) {
            // Two consecutive blank lines
            return;
        }

        // A new entry is found
        $this->rawEntries[] = $this->currentEntry;
        $this->currentEntry = $this->createNewEntryAsArray();
        $this->state = null;
        $this->justNewEntry = true;
    }

    /**
     * @param $line
     *
     * @return array
     */
    protected function parseLine($line)
    {
         $split = preg_split('/\s/', $line, 2);

        return array(
            'key' => $split[0],
            'value' => isset($split[1]) ? $split[1] : null,
        );
    }

    /**
     * @param $data
     *
     * @return array
     */
    protected function parseFlags($data)
    {
        return preg_split('/,\s*/', $data);
    }

    /**
     * @param $data
     */
    protected function handleComment($data)
    {
        switch ( $data['key']) {
            case '#:':
                $this->currentEntry['references'][] = addslashes($data['value']);
                break;
            case '#,':
                //flag
                $this->currentEntry['flags'] = $this->parseFlags($data['value']);
                $this->currentEntry['fuzzy'] = in_array('fuzzy', $this->currentEntry['flags'], true);
                break;
            case '#':
                $this->currentEntry['tcomment'] = $data['value'];
                break;
            case '#.':
                $this->currentEntry['ccomment'] = $data['value'];
                break;
            case '#|':
                //msgid previous-untranslated-string
                // start a new entry
                break;
            case '#@':
                // ignore #@ default
                $this->currentEntry['@'] = $data['value'];
                break;
            case '#~':
                $this->processObsoleteEntry($data['value']);
                break;
            default:
                break;
        }
    }

    /**
     * @param $data
     * @param $rawLine
     *
     * @throws \Exception
     */
    protected function handleOtherCases($data, $rawLine)
    {
        switch ( $data['key']) {
            case 'msgctxt':
            case 'msgid':
            case 'msgid_plural':
            case 'msgstr':
                $this->state = $data['key'];
                $this->addEntryData($data['value']);
                break;
            default:
                if ( strpos($data['key'], 'msgstr[') !== false) {
                    // translated plurals
                    $this->state = 'msgstr';
                    $this->addEntryData($data['value']);
                } else {
                    $this->processContinuedLineInSameState($rawLine);
                }
                break;
        }
    }

    /**
     * @param string $line
     *
     * @throws \Exception
     */
    protected function processContinuedLineInSameState($line)
    {
        switch ( $this->state) {
            case 'msgctxt':
            case 'msgid':
            case 'msgid_plural':
                if ( is_string($this->currentEntry[ $this->state ])) {
                    // Convert it to array
                    $this->currentEntry[ $this->state ] = array( $this->currentEntry[ $this->state ] );
                }
                $this->currentEntry[ $this->state ][] = $line;
                break;
            case 'msgstr':
                $this->currentEntry['msgstr'][] = trim($line, '"');
                break;
            default:
                throw new \Exception('Parse error!');
        }
    }

    /**
     * @param $data
     */
    protected function processObsoleteEntry($data)
    {
        $this->currentEntry['obsolete'] = true;

        $tmpParts = explode(' ', $data);
        $tmpKey = $tmpParts[0];
        $str = implode(' ', array_slice($tmpParts, 1));

        switch ( $tmpKey) {
            case 'msgid':
                $this->currentEntry['msgid'] = trim($str, '"');
                break;
            case 'msgstr':
                $this->currentEntry['msgstr'][] = trim($str, '"');
                break;
            default:
                break;
        }
    }

    /**
     * @param $value
     */
    protected function addEntryData($value)
    {
        if ( $this->state === 'msgstr') {
            $this->currentEntry[ $this->state ][] = $value;
        } else {
            $this->currentEntry[ $this->state ] = $value;
        }
    }

    /**
     *
     */
    protected function addFinalEntry()
    {
        if ( $this->state == 'msgstr' || $this->currentEntry['obsolete']) {
            $this->rawEntries[] = $this->currentEntry;
        }
    }

    /**
     * Cleanup data, merge multiline entries, reindex hash for ksort
     *
     * @return bool
     */
    protected function prepareResults()
    {
        $this->entriesAsArrays = array();
        $this->entries = array();
        $this->headers = array();

        $counter = 0;
        foreach ( $this->rawEntries as $entry) {
            $entry = $this->prepareEntry($entry, $counter);

            $id = $this->getMsgId($entry);

            $this->entriesAsArrays[ $id ] = $entry;
            $this->entries[ $id ] = new Entry($entry);

            $counter++;
        }

        return true;
    }

    /**
     * @param $entry
     *
     * @return string
     */
    protected function getMsgId($entry)
    {
         return is_array($entry['msgid']) ? implode('', $entry['msgid']) : $entry['msgid'];
    }

    /**
     * @param $entry
     * @param $index
     *
     * @return array
     */
    protected function prepareEntry($entry, $index)
    {
        foreach ( $entry as &$fieldValue) {
            $fieldValue = $this->clean($fieldValue);
        }

        $id = $this->getMsgId($entry);

        if ( $index === 0 && $id === '') {
            //header entry
            $entry['header'] = true;
            $this->setHeaders($this->parseHeaders($entry));
        }

        return $entry;
    }

    /**
     * @return array
     */
    protected function createNewEntryAsArray()
    {
        return array(
            'msgctxt' => '',
            'header' => false,
            'obsolete' => false,
            'fuzzy' => false,
            'flags' => array(),
            'references' => array(),
            'ccomment' => '',
            'tcomment' => '',
        );
    }

    /**
     * @param string $filePath
     *
     * @throws \Exception
     * @return resource
     */
    protected function openFile($filePath)
    {
        if ( empty($filePath)) {
            throw new \Exception('Input file not defined.');
        } elseif ( ! file_exists($filePath)) {
            throw new \Exception("File does not exist: {$filePath}");
        }

        $handle = @fopen($filePath, 'r');
        if ( false === $handle) {
            throw new \Exception("Unable to open file for reading: {$filePath}");
        }

        return $handle;
    }

    /**
     * @param array $entry
     *
     * @return array
     */
    protected function parseHeaders(array $entry)
    {
        $headers = array();

        if ( ! is_array($entry['msgstr'])) {
            return $headers;
        }

        foreach ( $entry['msgstr'] as $headerRaw) {
            $parts = explode(':', $headerRaw);
            if ( count($parts) < 2) {
                continue;
            }

            $parts[1] = ltrim($parts[1]);
            $values = array_slice($parts, 1);
            $headerValue = rtrim(implode(':', $values));

            $headers[ $parts[0] ] = $headerValue;
        }

        return $headers;
    }

    /**
     * set all entries at once
     *
     * @param array $entries
     */
    public function setEntries(array $entries)
    {
        $this->entriesAsArrays = $entries;
    }

    /**
     * Helper for the update-functions by deleting the fuzzy flag
     *
     * @param $msgid string msgid of entry
     *
     * @throws \Exception
     */
    protected function removeFuzzyFlagForMsgId($msgid)
    {
        if ( ! isset($this->entriesAsArrays[ $msgid ])) {
            throw new \Exception('Entry does not exist');
        }
        if ( $this->entriesAsArrays[ $msgid ]['fuzzy']) {
            $flags = $this->entriesAsArrays[ $msgid ]['flags'];
            unset($flags[ array_search('fuzzy', $flags, true) ]);
            $this->entriesAsArrays[ $msgid ]['flags'] = $flags;
            $this->entriesAsArrays[ $msgid ]['fuzzy'] = false;
        }
    }

    /**
     * Allows modification of all translations of an entry
     *
     * @param $msgid string msgid of the entry which should be updated
     * @param $translation array of strings new Translation for all msgstr by msgid
     *
     * @throws \Exception
     */
    public function updateEntries($msgid, $translation)
    {
        if (
            ! isset($this->entriesAsArrays[ $msgid ])
            || ! is_array($translation)
            || sizeof($translation) != sizeof($this->entriesAsArrays[ $msgid ]['msgstr'])
        ) {
            throw new \Exception('Cannot update entry translation');
        }
        $this->removeFuzzyFlagForMsgId($msgid);
        $this->entriesAsArrays[ $msgid ]['msgstr'] = $translation;
    }

    /**
     * Allows modification of a single translation of an entry
     *
     * @param $msgid string msgid of the entry which should be updated
     * @param $translation string new translation for an msgstr by msgid
     * @param $positionMsgstr integer spezification which of the msgstr
     *      should be changed
     *
     * @throws \Exception
     */
    public function updateEntry($msgid, $translation, $positionMsgstr = 0)
    {
        if (
            ! isset($this->entriesAsArrays[ $msgid ])
            || ! is_string($translation)
            || ! isset($this->entriesAsArrays[ $msgid ]['msgstr'][ $positionMsgstr ])
        ) {
            throw new \Exception('Cannot update entry translation');
        }
        $this->removeFuzzyFlagForMsgId($msgid);
        $this->entriesAsArrays[ $msgid ]['msgstr'][ $positionMsgstr ] = $translation;
    }

    /**
     * Write entries into the po file.
     *
     * @param string $filePath
     * @throws \Exception
     */
    public function write($filePath)
    {
        $writer = new Writer();
        $writer->write($filePath, $this->entriesAsArrays);
    }

    /**
     *
     */
    public function clearFuzzy()
    {
        foreach ( $this->entriesAsArrays as &$entry) {
            if ( $entry['fuzzy'] === true) {
                $flags = $entry['flags'];
                $entry['flags'] = str_replace('fuzzy', '', $flags);
                $entry['fuzzy'] = false;
                $entry['msgstr'] = array( '' );
            }
        }
    }

    /**
     * @param $value
     *
     * @return array|string
     */
    public function clean($value)
    {
        if ( $value === true || $value === false) {
            return $value;
        } elseif ( is_array($value)) {
            foreach ( $value as $k => $v) {
                $value[ $k ] = $this->clean($v);
            }
        } else {
            $value = preg_replace('/^\"|\"$/', '', $value);
            $value = stripcslashes($value);
        }

        return $value;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->headers = $headers;
    }
}
