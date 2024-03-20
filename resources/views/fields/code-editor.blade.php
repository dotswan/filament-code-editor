<x-filament-forms::field-wrapper 
    :id="$getId()" 
    :label="$getLabel()" 
    :label-sr-only="$isLabelHidden()" 
    :helper-text="$getHelperText()"    
    :hint="$getHint()" 
    :hint-icon="$getHintIcon()" 
    :required="$isRequired()" 
    :state-path="$getStatePath()"
    >

    <div style="position: relative;">

        <div x-data="{ copied: false }" x-show="{{ $getShowCopyButton() }}">
            <div class="copy-button"
                @click="$clipboard(`{{ $getState() }}`); copied = true; setTimeout(() => { copied = false; }, 5000)">
                <span x-show="!copied">Copy</span>
                <span x-show="copied">Copied</span>
            </div>
        </div>

        <div style="overflow: auto;" 
            @theme-changed.window="function(e) {toggleTheme(e.detail)}" 
            x-data="codeEditorFormComponent(
            $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
            '{{ $getIsReadOnly() }}',
            '{{ $getDarkModeTheme() }}',
            '{{ $getLightModeTheme() }}',
        
        )">
            <div wire:ignore class="w-full border" x-ref="codeEditor"
                style="height:{{ $getMinHeight() }}px;overflow: hidden; {{ $getCustomStyle() }}">
            </div>
        </div>
    </div>
</x-filament-forms::field-wrapper>
