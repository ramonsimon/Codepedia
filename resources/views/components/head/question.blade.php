<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            themes: 'modern',
            body_id : '1',
            height: 200,
            width : 340,
            menubar: false,
            plugins: [
                'codesample'
            ],
            menubar: '',
            toolbar: 'codesample ',
            setup: function(editor) {
                editor.on('blur', function(e) {
                    value = editor.getContent()
                })
                editor.on('change', function(e) {
                    @this.set('description', editor.getContent())
                })
                editor.on('init', function (e) {
                    if (value != null) {
                        editor.setContent(value)
                    }
                })
                function putCursorToEnd() {
                    editor.selection.select(editor.getBody(), true);
                    editor.selection.collapse(false);
                }
                $watch('value', function (newValue) {
                    if (newValue !== editor.getContent()) {
                        editor.resetContent(newValue || '');
                        putCursorToEnd();
                    }
                });
            }
        })
    "
    wire:ignore
>
    <div>
        <input
            x-ref="tinymce"
            type="textarea"
            {{ $attributes->whereDoesntStartWith('wire:model') }}
        >
    </div>
</div>

