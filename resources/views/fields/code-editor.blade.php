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

    <div class="code-editor-textarea">

        <div x-data="{ copied: false}" x-show="{{ $getShowCopyButton() }}">
            <div class="copy-button"
                @click="copyContent(`{{ $getState() }}`); copied = true; setTimeout(() => { copied = false; }, 5000)">
                <span x-show="!copied">Copy Content</span>
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
            <div wire:ignore class="w-full code-editor-textarea-wrapper" x-ref="codeEditor"
                style="height:{{ $getMinHeight() }}px;overflow: hidden; {{ $getCustomStyle() }}">
            </div>
        </div>
    </div>

    <script>
        async function copyContent(content) {
          try {
            if (navigator.clipboard && window.isSecureContext) {
              await navigator.clipboard.writeText(content);
            } else {
              const el = document.createElement('textarea');
              el.value = content;
              document.body.appendChild(el);
              el.select();
              document.execCommand('copy');
              document.body.removeChild(el);
            }
          } catch (err) {
            console.error('Failed to copy text: ', err);
          }
        }
      </script>
</x-filament-forms::field-wrapper>
