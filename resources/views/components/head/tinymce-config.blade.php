<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            themes: 'modern',
            height: 400,
            menubar: true,
            language: 'nl',
            plugins: [
                'image'
            ],
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media | forecolor backcolor emoticons',
            setup: function(editor) {
                editor.on('blur', function(e) {
                    value = editor.getContent()
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

