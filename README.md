# Content

⚠️ This is totally WORK IN PROGRESS ⚠️

## Installation

Add this sections to your `composer.json`:

```json
    "minimum-stability": "dev",
    "prefer-stable": true,
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Tom32i/content.git"
        }
    ]
```

Then: `composer require tom32i/content`

## Usage

Build the static site: `bin/console content:build`

- [How to load static content](doc/loading-content.md)
