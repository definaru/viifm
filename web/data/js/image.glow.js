window.addEventListener('DOMContentLoaded', function() {
    const img = document.querySelector('.next img');
    if (!img) return;

    // Добавляем canvas ПЕРЕД img
    img.insertAdjacentHTML('beforebegin', '<canvas class="glow-canvas"></canvas>');
    const canvas = img.previousElementSibling;
    if (!(canvas && canvas.classList.contains('glow-canvas'))) return;

    function drawGlow() {
        const w = img.naturalWidth;
        const h = img.naturalHeight;
        if (!w || !h) return;

        const scale = 2;
        canvas.width = w * scale;
        canvas.height = h * scale;
        canvas.style.width = (img.width * scale) + 'px';
        canvas.style.height = (img.height * scale) + 'px';

        const ctx = canvas.getContext('2d');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.filter = 'blur(60px)';
        ctx.drawImage(
            img,
            0, 0, w, h,
            (canvas.width - w) / 2, (canvas.height - h) / 2, w, h
        );
        ctx.filter = 'none';
        // canvas.style.borderRadius = getComputedStyle(img).borderRadius; // если нужно скругление
    }

    // Если уже загружено, рисуем сразу
    if (img.complete && img.naturalWidth) {
        drawGlow();
    } else {
        img.onload = drawGlow;
    }
});