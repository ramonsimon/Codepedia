<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<div
    x-data="{ value: @entangle($attributes->wire('model')) }"
    x-init="
        tinymce.init({
            target: $refs.tinymce,
            themes: 'modern',
            paste_block_drop: true,
            paste_as_text: true,
            height: 200,
            width: 540,
            menubar: false,
            language: 'nl',
            plugins: [
                'codesample',
                'wordcount',
                'autoresize',
            ],
            menubar: '',
            max_height: 500,
            toolbar: 'codesample ',
            codesample_global_prismjs: true,
            setup: function(editor) {
             	var max = 20;
	    editor.on('submit', function(event) {
		  var numChars = tinymce.activeEditor.plugins.wordcount.body.getCharacterCount();
		  if (numChars > max) {
			alert('Maximum ' + max + ' characters allowed.');
event.preventDefault();
return false;
}
});
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

