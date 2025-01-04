import { Editor } from 'https://esm.sh/@tiptap/core@2.6.6';
import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.6.6';

window.addEventListener('load', function () {
    if (document.getElementById("wysiwyg-typography-example")) {

        // tip tap editor setup
        const editor = new Editor({
            element: document.querySelector('#wysiwyg-typography-example'),
            extensions: [
                StarterKit
            ],
            editorProps: {
                attributes: {
                    class: 'format lg:format-lg dark:format-invert focus:outline-none format-blue max-w-none',
                },
            }
        });

        document.getElementById('contentForm').addEventListener('submit', function (event) {
            event.preventDefault(); // Prevent default form submission

            // Get the content from the editor
            const content = editor.getHTML(); // Get the HTML content

            // Set the content to the hidden input
            document.getElementById('desc_highlight').value = content;

            // Now submit the form
            this.submit();
        });

        // set up custom event listeners for the buttons
        document.getElementById('toggleListButton').addEventListener('click', () => {
            editor.chain().focus().toggleBulletList().run();
        });
        document.getElementById('toggleOrderedListButton').addEventListener('click', () => {
            editor.chain().focus().toggleOrderedList().run();
        });

        // typography dropdown
        const typographyDropdown = FlowbiteInstances.getInstance('Dropdown', 'typographyDropdown');

        document.getElementById('toggleParagraphButton').addEventListener('click', () => {
            editor.chain().focus().setParagraph().run();
            typographyDropdown.hide();
        });

        document.querySelectorAll('[data-heading-level]').forEach((button) => {
            button.addEventListener('click', () => {
                const level = button.getAttribute('data-heading-level');
                editor.chain().focus().toggleHeading({ level: parseInt(level) }).run()
                typographyDropdown.hide();
            });
        });
    }
})
