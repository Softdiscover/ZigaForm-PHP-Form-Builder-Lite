<?php

namespace PoParser;

class Entry
{
    /**
     * @var string
     */
    protected $context;

    /**
     * @var string
     */
    protected $msgId;

    /**
     * @var null
     */
    protected $msgIdPlural;

    /**
     * @var bool
     */
    protected $fuzzy = false;

    /**
     * @var bool
     */
    protected $obsolete = false;

    /**
     * @var bool
     */
    protected $header = false;

    /**
     * @var array
     */
    protected $flags = array();

    /**
     * @var array
     */
    protected $translations = array();

    /**
     * @var array
     */
    protected $references = array();

    /**
     * @var string
     */
    protected $extractedComment;

    /**
     * @var string
     */
    protected $translatorComment;

    /**
     * @param $properties
     */
    public function __construct($properties)
    {
        $this->context = $properties['msgctxt'];
        $this->translatorComment = $properties['tcomment'];
        $this->extractedComment = $properties['ccomment'];
        $this->msgId = $properties['msgid'];
        $this->msgIdPlural = isset($properties['msgid_plural']) ? $properties['msgid_plural'] : null;
        $this->fuzzy = $properties['fuzzy'] === true;
        $this->obsolete = $properties['obsolete'] === true;
        $this->header = $properties['header'] === true;
        $this->translations = $properties['msgstr'];
        $this->references = $properties['references'];
        $this->flags = $properties['flags'];
    }

    /**
     * @return bool
     */
    public function isHeader()
    {
        return $this->header;
    }

    /**
     * @return bool
     */
    public function isFuzzy()
    {
        return $this->fuzzy;
    }

    /**
     * @return string
     */
    public function getMsgId()
    {
        return is_array($this->msgId) ? implode('', $this->msgId) : $this->msgId;
    }

    /**
     * @return null|string
     */
    public function getMsgIdPlural()
    {
        return is_array($this->msgIdPlural) ? implode('', $this->msgIdPlural) : $this->msgIdPlural;
    }

    /**
     * @return bool
     */
    public function isObsolete()
    {
        return $this->obsolete;
    }

    /**
     * @return array
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * @param $index
     *
     * @return string
     */
    public function getTranslation($index = 0)
    {
        return (isset($this->translations[$index])) ? $this->translations[$index] : '';
    }

    /**
     * @return bool
     */
    public function isPlural()
    {
        return !empty($this->msgIdPlural);
    }

    /**
     * @param $flag
     *
     * @return bool
     */
    public function hasFlag($flag)
    {
        return array_search($flag, $this->flags, true) !== false;
    }

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @return string
     */
    public function getExtractedComment()
    {
        return $this->extractedComment;
    }

    /**
     * @return string
     */
    public function getTranslatorComment()
    {
        return $this->translatorComment;
    }

    /**
     * @return array
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @return array
     */
    public function getReferences()
    {
        return $this->references;
    }
}
