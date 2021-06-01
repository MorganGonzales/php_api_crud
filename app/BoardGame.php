<?php

namespace App;

use InvalidArgumentException;

class BoardGame
{
    private const REQUIRED_FIELDS = [
        'name',
        'year_published',
        'designer',
        'publisher',
    ];

    private string $name;

    private string $shortDescription;

    private string $description;

    private string $yearPublished;

    private string $designer;

    private string $publisher;

    private function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->shortDescription = $data['short_description'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->yearPublished = $data['year_published'];
        $this->designer = $data['designer'];
        $this->publisher = $data['publisher'];
    }

    public static function fromArray(array $data): self
    {
        self::throwExceptionIfAnyRequiredFieldIsEmpty($data);

        return new self($data);
    }

    private static function throwExceptionIfAnyRequiredFieldIsEmpty(array $data): void
    {
        foreach (self::REQUIRED_FIELDS as $requiredField) {
            if (array_key_exists($requiredField, $data) && $data[$requiredField]) {
                continue;
            }

            throw new InvalidArgumentException("Field `{$requiredField}` is found missing or empty", 403);
        }
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'short_description' => $this->shortDescription,
            'description' => $this->description,
            'year_published' => $this->yearPublished,
            'designer' => $this->designer,
            'publisher' => $this->publisher,
        ];
    }

    public function toSanitizedArray(): array
    {
        return [
            'name' => self::sanitize($this->name),
            'short_description' => self::sanitize($this->shortDescription),
            'description' => self::sanitize($this->description),
            'year_published' => self::sanitize($this->yearPublished),
            'designer' => self::sanitize($this->designer),
            'publisher' => self::sanitize($this->publisher),
        ];
    }

    private function sanitize(string $value): string
    {
        return htmlspecialchars(strip_tags($value));
    }
}
