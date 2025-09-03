document.addEventListener("DOMContentLoaded", function () {
    const retiradaInput = document.getElementById('data_retirada');
    const devolucaoInput = document.getElementById('data_devolucao');

    if (retiradaInput && devolucaoInput) {
        retiradaInput.addEventListener('change', function () {
            let retiradaDate = new Date(this.value);
            retiradaDate.setDate(retiradaDate.getDate() + 1);

            let minDate = retiradaDate.toISOString().split('T')[0];
            devolucaoInput.min = minDate;

            if (devolucaoInput.value < minDate) {
                devolucaoInput.value = minDate;
            }
        });
    }
});
