document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById("formulario");

    if (form) {
        form.addEventListener("submit", function (e) {
            const modelo = form.modelo.value.trim();
            const cor = form.cor.value.trim();
            const ano = parseInt(form.ano.value);
            const quantidade = parseInt(form.quantidade.value);


            if (!modelo || !cor) {
                alert("Modelo e Cor são obrigatórios!");
                e.preventDefault();
                return;
            }
            if (isNaN(ano) || ano < 1886 || ano > 2024) {
                alert("Informe um ano válido entre 1886 e 2024.");
                e.preventDefault();
                return;
            }
            if (isNaN(quantidade) || quantidade < 1) {
                alert("A quantidade deve ser no mínimo 1.");
                e.preventDefault();
                return;
            }
            const confirmar = window.confirm(
                `Você está prestes a fabricar ${quantidade} carro(s) do modelo "${modelo}" na cor "${cor}" e ano "${ano}". Confirma?`
            );

            if (!confirmar) {
                e.preventDefault();
                console.log("Envio cancelado pelo usuário.");
            }
        });
    }
});
