document.addEventListener("DOMContentLoaded", function () {
    const scrollableContainers = document.querySelectorAll('[data-scrollable]');

    scrollableContainers.forEach(container => {
        let isDragging = false;
        let startX, scrollLeft;

        container.addEventListener('mousedown', (e) => {
            isDragging = true;
            startX = e.pageX - container.offsetLeft;
            scrollLeft = container.scrollLeft;
        });

        container.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const x = e.pageX - container.offsetLeft;
            const walk = (x - startX) * 3; // 스크롤 속도를 조절합니다
            container.scrollLeft = scrollLeft - walk;
        });

        container.addEventListener('mouseup', () => {
            isDragging = false;
        });

        container.addEventListener('mouseleave', () => {
            isDragging = false;
        });
    });
});

