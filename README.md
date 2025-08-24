# 📊 Dashboard Layout Builder for Laravel

A Laravel package to build dashboard layouts using a fluent, chainable syntax. Output your structure as **JSON** or renderable HTML (coming soon).

---

## ✨ Features

- Chainable fluent API
- Define rows, columns, and content blocks
- Supports responsive column definitions (`sm`, `md`, `lg`, etc.)
- Outputs to JSON
- Easy to extend with new layout components

---

## 🚀 Installation

```bash
composer require beproteam/dashboard-layout-builder
```

Laravel will auto-discover the service provider.

---

## 📦 Basic Usage

```php
use DashboardLayoutBuilder\DashboardLayoutBuilder;
use DashboardLayoutBuilder\LayoutRow;
use DashboardLayoutBuilder\LayoutColumn;
use DashboardLayoutBuilder\LayoutContent;

(new DashboardLayoutBuilder())
    ->schema([
    LayoutRow::make()->schema([
      LayoutColumn::make()->schema([
        LayoutContent::make('content_key')
          ->label('Content Label')
          ->content('contents goes here')
      ])
    ])->columns(['sm' => 2, 'md' => 3])
  ])
  ->toJSON();
```

### ✅ Output Example

```json
{
  "dashboard_layout_builder": [
    {
      "type": "row",
      "columns": {
        "sm": "2",
        "md": "3"
      },
      "contents": [
        {
          "type": "column",
          "contents": [
            {
              "type": "layout_content",
              "key": "content_key",
              "label": "Content Label",
              "contents": "contents goes here"
            }
          ]
        }
      ]
    }
  ]
}
```

---

## 📚 API Reference

### `DashboardLayoutBuilder::schema(array $layout)`
Start building the layout.

### `LayoutRow::make()->schema([...])->columns([...])`
Define a row and optionally set column specifications (e.g. `'md' => 3` or just `3`).

### `LayoutColumn::make()->schema([...])`
Define a column which can include other columns, rows, or contents.

### `LayoutContent::make('key')->label(string $label)->content(mixed $content)`
Define a content block with a key, a human-readable label, and content body.

---

## 🧪 Coming Soon

- HTML output rendering with `->toHtml()`
- Live preview & editor integration
- Blade component helpers

---

## 📄 License

[MIT](LICENSE)

---

## 🤝 Contributing

Feel free to submit PRs or open issues!  
If you'd like to suggest a feature, open a [discussion](https://github.com/beproteam/dashboard-layout-builder/discussions).

---

## 🔗 Links

- [GitHub](https://github.com/beproteam/dashboard-layout-builder)
