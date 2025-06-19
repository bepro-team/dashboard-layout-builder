<?php

namespace DashboardLayoutBuilder;

class LayoutContent
{
    protected string $title;
    protected string $label;
    protected mixed $content;

    public static function make(string $title): self
    {
        $instance = new self();
        $instance->title = $title;
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
            'title' => $this->title,
            'label' => $this->label ?? null,
            'contents' => $this->content,
        ];
    }
}
