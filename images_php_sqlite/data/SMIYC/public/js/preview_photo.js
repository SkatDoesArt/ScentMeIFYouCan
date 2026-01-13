document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("image-input");
    const preview = document.getElementById("new-image");

    input.addEventListener("change", () => {
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = (e) => {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(file);
        } else {
            preview.src = "";
        }
    });
});
