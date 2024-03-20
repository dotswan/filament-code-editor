# Filament Code Editor

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Software License][ico-license]][link-license]

![image](https://github.com/dotswan/filament-code-editor/assets/20874565/d35153c5-6699-43c6-b250-d6f9bd277b43)

## Introduction

The Filament Code Editor package enhances Filament with a specialized field type, allowing seamless code editing powered by the CodeMirror JavaScript library within Filament components. This integration provides users with a dedicated environment for editing various code languages such as CSS, HTML, JavaScript, JSON, and PHP directly within Filament forms.

* Key Features:
  * Integration of the CodeMirror JavaScript library into Filament components.
  * Support for multiple code languages including CSS, HTML, JavaScript, JSON, and PHP.
  * Effortless editing of code within the familiar Filament interface.

<img src="https://github.com/dotswan/filament-code-editor/assets/20874565/f814ec5f-5d73-4331-a669-25d50cfdc444" width="500" height="420">

<img src="https://github.com/dotswan/filament-code-editor/assets/20874565/df6608c9-2088-4d78-8a94-a814ba873c6b" width="500" height="420">

## Installation

To integrate the Filament Code Editor package into your project, use Composer:

```bash
composer require dotswan/filament-code-editor
```

## Basic Usage

To implement the code editor field within Filament forms, use the `CodeEditor` field type:

```php
use Dotswan\FilamentCodeEditor\Fields\CodeEditor;

CodeEditor::make('codes')
    // Additional configuration goes here, if needed
    ->id('unique_field_id')
    ->minHeight(768)
    ->isReadOnly(true)
    ->showCopyButton(true)
    ->darkModeTheme('gruvbox-dark')
    ->lightModeTheme('basic-light')
    ->columnSpanFull(),
```

**Theme values:**
 - basic-light
 - basic-dark
 - solarized-dark
 - solarized-light
 - material-dark
 - nord
 - gruvbox-light
 - gruvbox-dark

## Supported Languages

The Filament Code Editor supports the following languages:

* CSS
* HTML
* JavaScript
* JSON
* PHP

Customize and manage code for these languages effortlessly within your Filament forms.

## License

This package is distributed under the [MIT License](link-to-your-license).

## Security

Security is a priority for us. If you encounter any security-related issues or vulnerabilities, please report them via our [GitHub issue tracker][link-github-issue]. For direct communication, reach out to [tech@dotswan.com](mailto:tech@dotswan.com).

## Contribution

Contributions are welcome and valued. Enhancements, suggestions, and bug reports help improve this package for everyone. Here's how you can contribute:

1. Fork the Project
2. Create a Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

Thank you for considering contributing to the Filament Code Editor!

[ico-version]: https://img.shields.io/packagist/v/dotswan/filament-code-editor.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/dotswan/filament-code-editor.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/dotswan/filament-code-editor
[link-license]: https://github.com/dotswan/filament-code-editor/blob/master/LICENSE.md
[link-downloads]: https://packagist.org/packages/dotswan/filament-code-editor
[link-github-issue]: https://github.com/dotswan/filament-code-editor/issues
