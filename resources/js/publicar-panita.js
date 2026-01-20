document.addEventListener('DOMContentLoaded', () => {
    const openBtn = document.getElementById('openPublicarModal');
    const step1 = document.getElementById('modalStep1');
    const step2 = document.getElementById('modalStep2');

    if (!openBtn || !step1 || !step2) return;

    // Función para abrir modal Step1
    openBtn.addEventListener('click', () => {
        step1.classList.add('active');
        document.body.style.overflow = 'hidden';
    });

    // Pasar de Step1 a Step2
    document.getElementById('goToStep2')?.addEventListener('click', () => {
        step1.classList.remove('active');
        step2.classList.add('active');
    });

    // Volver de Step2 a Step1
    document.getElementById('backToStep1')?.addEventListener('click', () => {
        step2.classList.remove('active');
        step1.classList.add('active');
    });

    // Función para cerrar todos los modales
    function closeAll() {
        step1.classList.remove('active');
        step2.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    // Cerrar con botones "X"
    document.getElementById('closeStep1')?.addEventListener('click', closeAll);
    document.getElementById('closeStep2')?.addEventListener('click', closeAll);

    // Cerrar al hacer click fuera del modal (overlay)
    [step1, step2].forEach(modal => {
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeAll();
            }
        });
    });

    // Cerrar al presionar Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && (step1.classList.contains('active') || step2.classList.contains('active'))) {
            closeAll();
        }
    });
});

const fotoInput = document.getElementById('fotoMascota');
const previewFoto = document.getElementById('previewFoto');

if (fotoInput) {
    fotoInput.addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = () => {
            previewFoto.src = reader.result;
            previewFoto.style.display = 'block';
        };
        reader.readAsDataURL(file);
    });
}
