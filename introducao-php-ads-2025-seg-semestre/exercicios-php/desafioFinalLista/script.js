const form = document.getElementById("formProd");
let campoProduto = document.getElementById("produto");
let precos = document.getElementById("preco");
let modal = document.getElementById("modal");
let mensagem = document.getElementById("mensagem");
let fechar = document.getElementById("fechar");
let listaProdutos = document.getElementById("listaProdutos");

form.addEventListener('submit', (e) => {
     e.preventDefault();
     
     let linha = document.createElement("tr");
     let colunaProduto = document.createElement("td");
     let colunaPreco = document.createElement("td");
     let colunaExcluir = document.createElement("td");
     let btnExcluir = document.createElement("button");
          btnExcluir.classList.add("excluir-btn");
     let produto = campoProduto.value.trim();
     let preco = parseFloat(precos.value);
     let regexSimbolos = /[!@#$%^&*(),.?":{}|<>]/g;

     if (produto === "") {
          modal.showModal();
          mensagem.textContent = "Por favor, insira o nome do produto.";
          campoProduto.focus();
          return false;
     } else if (regexSimbolos.test(produto)) {
          modal.showModal();
          mensagem.textContent = "O nome do produto não deve conter símbolos especiais.";
          campoProduto.focus();
          return false;
     } else if (isNaN(preco) || preco <= 0) {
          modal.showModal();
          mensagem.textContent = "Por favor, insira um preço válido.";
          precos.focus();
          return false ;
     }else{
          colunaProduto.textContent = produto;
          colunaPreco.textContent = `R$ ${preco.toFixed(2)}`;
          btnExcluir.textContent = "Excluir";

          listaProdutos.appendChild(linha);
          linha.appendChild(colunaProduto);
          linha.appendChild(colunaPreco);
          linha.appendChild(colunaExcluir);
          colunaExcluir.appendChild(btnExcluir);

          btnExcluir.addEventListener("click", () => {
          linha.remove();
          });
          
          campoProduto.value = "";
          precos.value = "";

     }

});

fechar.addEventListener('click', () => {
  modal.close();
});
