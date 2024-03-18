<?php

declare(strict_types=1);

namespace Dotswan\FilamentCodeEditor\Fields;

use Filament\Forms\Components\Field;

class CodeEditor extends Field
{
    protected string $view = 'filament-code-editor::fields.code-editor';

    protected int | Closure | null $minHeight = 768;
    protected string | null $customStyle = null;
    protected string | null $darkModeTheme = null;
    protected string | null $lightModeTheme = null;
    protected bool $isReadOnly = false;
    protected bool $showCopyButton = false;



    public function CustomStyle(string | null $customStyle): static
    {
        $this->customStyle = $customStyle;

        return $this;
    }

    public function minHeight(int | Closure | null $minHeight = 768): static
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    public function lightModeTheme(?string $lightModeTheme): static
    {
        $this->lightModeTheme = $lightModeTheme;

        return $this;
    }

    public function darkModeTheme(?string $darkModeTheme): static
    {
        $this->darkModeTheme = $darkModeTheme;

        return $this;
    }

    public function isReadOnly(bool $isReadOnly = false): static
    {
        $this->isReadOnly = $isReadOnly;

        return $this;
    }

    public function showCopyButton(bool $showCopyButton = false): static
    {
        $this->showCopyButton = $showCopyButton;

        return $this;
    }

    public function getIsReadOnly(): bool
    {
        return $this->evaluate($this->isReadOnly);
    }

    public function getShowCopyButton(): bool
    {
        return $this->evaluate($this->showCopyButton);
    }

    public function getMinHeight(): ?int
    {
        return $this->evaluate($this->minHeight);
    }

    public function getCustomStyle(): ?string
    {
        return $this->evaluate($this->customStyle);
    }

    public function getLightModeTheme(): ?string
    {
        return $this->evaluate($this->lightModeTheme);
    }

    public function getDarkModeTheme(): ?string
    {
        return $this->evaluate($this->darkModeTheme);
    }
}
