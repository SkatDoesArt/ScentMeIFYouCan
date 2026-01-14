
const typeSelect = document.getElementById('image-type');
const fileGroup  = document.getElementById('file-group');
const urlGroup   = document.getElementById('url-group');
const fileInput  = document.getElementById('image-input');
const urlInput   = document.getElementById('image-url');

typeSelect.addEventListener('change', () => {
    fileGroup.style.display = 'none';
    urlGroup.style.display  = 'none';

    fileInput.required = false;
    urlInput.required  = false;

    // Reset valeurs
    fileInput.value = '';
    urlInput.value  = '';

    if (typeSelect.value === 'file') {
        fileGroup.style.display = 'block';
        fileInput.required = true;
    }

    if (typeSelect.value === 'url') {
        urlGroup.style.display = 'block';
        urlInput.required = true;
    }
});

