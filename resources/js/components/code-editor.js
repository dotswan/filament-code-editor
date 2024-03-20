import { basicSetup } from "codemirror";
import { EditorState } from '@codemirror/state';
import { EditorView, keymap } from "@codemirror/view";
import { indentWithTab } from "@codemirror/commands";
import { javascript } from "@codemirror/lang-javascript";
import { Compartment } from '@codemirror/state';
import { json } from "@codemirror/lang-json";
import { php } from "@codemirror/lang-php";
import { css } from "@codemirror/lang-css";
import { html } from "@codemirror/lang-html";
import { basicLight } from 'cm6-theme-basic-light'
import { basicDark } from 'cm6-theme-basic-dark'
import { solarizedDark } from 'cm6-theme-solarized-dark'
import { solarizedLight } from 'cm6-theme-solarized-light'
import { materialDark } from 'cm6-theme-material-dark'
import { nord } from 'cm6-theme-nord'
import { gruvboxLight } from 'cm6-theme-gruvbox-light'
import { gruvboxDark } from 'cm6-theme-gruvbox-dark'

export default (Alpine) => {

    Alpine.data('codeEditorFormComponent', (state, isReadOnly, darkTheme, lightTheme) => {
        return {
            state,
            editor: undefined,
            isReadOnly: false,
            themeConfig: undefined,
            mode: 'light',
            theme: {
                styles: {
                    'basic-light': {
                        extension: basicLight,
                        name: 'Basic Light'
                    },
                    'basic-dark': {
                        extension: basicDark,
                        name: 'Basic Dark'
                    },
                    'solarized-dark': {
                        extension: solarizedDark,
                        name: 'Solarized Dark'
                    },
                    'solarized-light': {
                        extension: solarizedLight,
                        name: 'Solarized Light'
                    },
                    'material-dark': {
                        extension: materialDark,
                        name: 'Material Dark'
                    },
                    'nord': {
                        extension: nord,
                        name: 'Nord'
                    },
                    'gruvbox-light': {
                        extension: gruvboxLight,
                        name: 'Gruvbox Light'
                    },
                    'gruvbox-dark': {
                        extension: gruvboxDark,
                        name: 'Gruvbox Dark'
                    }
                },
                current: basicLight,
                light: basicDark,
                dark: basicDark,
            },
            init: function () {
                this.isReadOnly = isReadOnly;
                this.theme.dark = darkTheme;
                this.theme.light = lightTheme;
                this.themeConfig = new Compartment();
                this.mode = 'dark';
                this.render();
            },
            toggleTheme(mode) {
                const selectedStyle = mode === 'dark' ? this.theme.dark : this.theme.light;
                this.theme.current = this.theme.styles[selectedStyle];
            
                if (this.editor) {
                    this.editor.dispatch({
                        effects: this.themeConfig.reconfigure(this.theme.current)
                    });
                }
            },
            render() {
                this.editor = new EditorView({
                    state: EditorState.create({
                        autofocus: true,
                        indentWithTabs: true,
                        smartIndent: true,
                        lineNumbers: true,
                        matchBrackets: true,
                        tabSize: 2,
                        styleSelectedText: true,
                        extensions: [
                            basicSetup,
                            keymap.of([indentWithTab]),
                            javascript(),
                            php(),
                            json(),
                            css(),
                            html(),
                            this.themeConfig.of(this.theme.current),
                            EditorView.updateListener.of((v) => {
                                if (v.docChanged) {
                                    this.state = v.state.doc.toString();
                                }
                            }),
                            EditorState.readOnly.of(this.isReadOnly)
                        ],
                        doc: this.state
                    }),
                    parent: this.$refs.codeEditor,
                });
            },
        }
    });
}
