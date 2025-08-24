<?php

namespace DashboardLayoutBuilder;

class LayoutContent
{
    protected string $key;
    protected string $label;
    protected mixed $content;

    public static function make(string $key): self
    {
        $instance = new self();
        $instance->key = $key;
        return $instance;
    }

    public function label(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function content(mixed $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => 'layout_content',
            'key' => $this->key,
            'label' => $this->label ?? null,
            'contents' => $this->content,
        ];
    }
}
