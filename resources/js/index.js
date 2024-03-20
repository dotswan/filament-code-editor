import CodeEditorAlpinePlugin from './components/code-editor';
import Clipboard from '@ryangjchandler/alpine-clipboard';

document.addEventListener('alpine:init', () => {
    window.Alpine.plugin(Clipboard);
    window.Alpine.plugin(CodeEditorAlpinePlugin);
})