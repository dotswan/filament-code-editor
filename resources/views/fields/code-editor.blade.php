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

<div
            style="overflow: auto;"
            x-data="codeEditorFormComponent({
                state: $wire.{{ $applyStateBindingModifiers('entangle(\'' . $getStatePath() . '\')') }},
            })"
    >
     <div
        wire:ignore
        class="w-full border"
        x-ref="codeeditor"
        style="min-height: 150px;"
     >
     </div>
</div>
</x-filament-forms::field-wrapper>
