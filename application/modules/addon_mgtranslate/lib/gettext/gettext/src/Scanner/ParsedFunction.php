<?php
declare(strict_types = 1);

namespace Get2text\Scanner;

/**
 * Class to handle the info of a parsed function.
 */
final class ParsedFunction
{
    private $name;
    private $filename;
    private $line;
    private $lastLine;
    private $arguments = [];
    private $comments = [];

    public function __construct(string $name, string $filename, int $line, int $lastLine = null)
    {
        $this->name = $name;
        $this->filename = $filename;
        $this->line = $line;
        $this->lastLine = isset($lastLine) ? $lastLine : $line;
    }

    public function __debugInfo()
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'filename' => $this->filename,
            'line' => $this->line,
            'lastLine' => $this->lastLine,
            'arguments' => $this->arguments,
            'comments' => $this->comments,
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLine(): int
    {
        return $this->line;
    }

    public function getLastLine(): int
    {
        return $this->lastLine;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function countArguments(): int
    {
        return count($this->arguments);
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function addArgument($argument = null): self
    {
        $this->arguments[] = $argument;

        return $this;
    }

    public function addComment(string $comment): self
    {
        $this->comments[] = $comment;

        return $this;
    }
}
