document.addEventListener('DOMContentLoaded', () => {
    const step1 = document.getElementById('modalStep1');
    const step2 = document.getElementById('modalStep2');

    if (!step1 || !step2) return;

    document.getElementById('goToStep2')?.addEventListener('click', () => {
        step1.classList.remove('active');
        step2.classList.add('active');
    });

    document.getElementById('backToStep1')?.addEventListener('click', () => {
        step2.classList.remove('active');
        step1.classList.add('active');
    });

    document.getElementById('closeStep1')?.addEventListener('click', closeAll);
    document.getElementById('closeStep2')?.addEventListener('click', closeAll);

    function closeAll() {
        step1.classList.remove('active');
        step2.classList.remove('active');
    }
});
