document.addEventListener('DOMContentLoaded', () => {

    const typeSelect = document.getElementById('image-type');
    const fileGroup  = document.getElementById('file-group');
    const urlGroup   = document.getElementById('url-group');

    const fileInput  = document.getElementById('image-input');
    const urlInput   = document.getElementById('image-url');

    const filePreview = document.getElementById('file-preview');
    const urlPreview  = document.getElementById('url-preview');

    // ===== Sélection type image =====
    typeSelect.addEventListener('change', () => {
        fileGroup.style.display = 'none';
        urlGroup.style.display  = 'none';

        fileInput.required = false;
        urlInput.required  = false;

        fileInput.value = '';
        urlInput.value  = '';
        filePreview.src = '';
        urlPreview.src  = '';

        if (typeSelect.value === 'file') {
            fileGroup.style.display = 'block';
            fileInput.required = true;
        }

        if (typeSelect.value === 'url') {
            urlGroup.style.display = 'block';
            urlInput.required = true;
        }
    });

    // ===== Preview lien =====
    urlInput.addEventListener('input', () => {
        const url = urlInput.value.trim();
        urlPreview.src = url || '';
    });

    // ===== Preview fichier =====
    fileInput.addEventListener('change', () => {
        const file = fileInput.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = e => {
            filePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

});