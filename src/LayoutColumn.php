<?php

namespace DashboardLayoutBuilder;

class LayoutColumn
{
    protected array $schema = [];
    protected int|string $col_span = 1;

    public static function make(): self
    {
        return new self();
    }

    public function schema(array $schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    public function colSpan(int|string $col_span): self
    {
        $this->col_span = $col_span;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => 'column',
            'col_span' => $this->col_span,
            'contents' => array_map(fn($item) => $item->toArray(), $this->schema),
        ];
    }
}
