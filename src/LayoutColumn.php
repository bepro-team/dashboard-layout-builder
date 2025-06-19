<?php

namespace DashboardLayoutBuilder;

class LayoutColumn
{
    protected array $schema = [];

    public static function make(): self
    {
        return new self();
    }

    public function schema(array $schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => 'column',
            'contents' => array_map(fn($item) => $item->toArray(), $this->schema),
        ];
    }
}
