document.addEventListener('DOMContentLoaded', () => {
    const fileInput = document.getElementById('image-input');
    const filePreview = document.getElementById('file-preview');

    const urlInput = document.getElementById('image-url');
    const urlPreview = document.getElementById('url-preview');

    const typeSelect = document.getElementById('image-type');
    const fileGroup = document.getElementById('file-group');
    const urlGroup = document.getElementById('url-group');

    // Affiche le groupe correspondant au type choisi
    typeSelect.addEventListener('change', () => {
        if(typeSelect.value === 'file'){
            fileGroup.style.display = 'block';
            urlGroup.style.display  = 'none';
        } else if(typeSelect.value === 'url'){
            fileGroup.style.display = 'none';
            urlGroup.style.display  = 'block';
        } else {
            fileGroup.style.display = 'none';
            urlGroup.style.display  = 'none';
        }
    });

    // Prévisualisation fichier
    fileInput.addEventListener('change', e => {
        const file = e.target.files[0];
        if(!file) return;
        const reader = new FileReader();
        reader.onload = ev => { filePreview.src = ev.target.result; };
        reader.readAsDataURL(file);
    });

    // Prévisualisation lien
    urlInput.addEventListener('input', e => {
        urlPreview.src = e.target.value;
    });
});
