<?php

namespace DashboardLayoutBuilder;

class LayoutRow
{
    protected array $schema = [];
    protected array $columns = [];

    public static function make(): self
    {
        return new self();
    }

    public function schema(array $schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    public function columns(array|int $columns): self
    {
        if (is_int($columns)) {
            $this->columns = ['md' => (string)$columns];
        } else {
            $this->columns = array_map('strval', $columns);
        }
        return $this;
    }

    public function toArray(): array
    {
        $columns = $this->columns ?: ['md' => '2'];

        return [
            'type' => 'row',
            'columns' => $columns,
            'contents' => array_map(fn($item) => $item->toArray(), $this->schema),
        ];
    }
}
