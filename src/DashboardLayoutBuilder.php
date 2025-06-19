<?php

namespace DashboardLayoutBuilder;

class DashboardLayoutBuilder
{
    protected array $schema = [];

    public function schema(array $schema): self
    {
        $this->schema = $schema;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'dashboard_layout_builder' => array_map(fn($item) => $item->toArray(), $this->schema),
        ];
    }

    public function toJSON(): string
    {
        return json_encode($this->toArray(), JSON_PRETTY_PRINT);
    }
}

if (!function_exists('DashboardLayoutBuilder')) {
    function DashboardLayoutBuilder(): DashboardLayoutBuilder
    {
        return new DashboardLayoutBuilder();
    }
}
