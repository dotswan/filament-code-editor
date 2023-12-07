<?php

declare(strict_types=1);

namespace Dotswan\FilamentCodeEditor\Fields;

use Filament\Forms\Components\Field;

class CodeEditor extends Field
{
    protected string $view = 'filament-code-editor::fields.code-editor';
}
