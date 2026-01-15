//Preview des fichiers
document.getElementById('image-input').addEventListener('change', e => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = ev => {
        document.getElementById('file-preview').src = ev.target.result;
    };
    reader.readAsDataURL(file);
});

//Preview des liens
document.getElementById('image-url').addEventListener('input', e => {
    const url = e.target.value.trim();
    const preview = document.getElementById('url-preview');

    if (!url) {
        preview.src = '';
        return;
    }

    // Affiche directement l’image distante
    preview.src = url;

    // Optionnel : image de fallback si erreur
    preview.onerror = () => {
        preview.src = '';
    };
});
