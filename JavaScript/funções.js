
// Função para realizar a pesquisa
        const searchInput = document.getElementById("barraPesquisa");
        const itemsToSearch = document.querySelectorAll(".destaqIndividual");
        const searchResults = document.querySelector(".destaquesGerall");

        searchInput.addEventListener("input", performSearch);

        function performSearch() {
            const searchTerm = searchInput.value.trim().toLowerCase();

            searchResults.innerHTML = "";

            itemsToSearch.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchTerm)) {
                    const itemClone = item.cloneNode(true);
                    searchResults.appendChild(itemClone);
                }
            });

            if (searchResults.children.length === 0) {
                searchResults.innerHTML = '<p id="noResul"><b>Nenhum resultado encontrado.</b></p>';
            }
        }

// Event listener para a tecla "keyup" no campo de pesquisa

searchInput.addEventListener("keyup", performSearch);

const botoes = document.querySelectorAll('.botoes button')
// Adiciona um ouvinte de evento de clique a cada botão
botoes.forEach(function(botao) {
  botao.addEventListener('click', function() {
    var valorBtn = botao.id.toLowerCase()
    searchResults.innerHTML = ""

    // Código a ser executado quando o botão for clicado
    console.log('Botão clicado: ' + botao.id);
    
    itemsToSearch.forEach(item => {
        const itemText1 = item.textContent.toLowerCase();
                if (itemText1.includes(valorBtn)) {
                    const itemClone = item.cloneNode(true);
                    searchResults.appendChild(itemClone);
                }
            });
  });
});


const searchInput1 = document.getElementById("barraPesquisa1");
const itemsToSearch1 = document.querySelectorAll(".destaq1");
const searchResults1 = document.getElementById("destaquesGerall");


// Adiciona um ouvinte de evento de clique a cada botão
botoes.forEach(function(botao) {
  botao.addEventListener('click', function() {
    var valorBtn1 = botao.id.toLowerCase()
    searchResults1.innerHTML = ""

    // Código a ser executado quando o botão for clicado
    console.log('Botão clicado: ' + botao.id);
    
    itemsToSearch1.forEach(item => {
        const itemText1 = item.textContent.toLowerCase();
                if (itemText1.includes(valorBtn1)) {
                    const itemClone = item.cloneNode(true);
                    searchResults1.appendChild(itemClone);
                }
            });
  });
});


// Função botões proximo/anterior
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const boxes = document.querySelectorAll(".destaqIndividual");
let currentIndex = 0;

function showBox(index) {
  boxes.forEach((box, i) => {
    if (i === index) {
      box.style.display = "block";
    } else {
      box.style.display = "none";
    }
  });
}

function checkScreenSize() {
  if (window.innerWidth <= 768) {
    showBox(currentIndex);
    prevBtn.style.display = "block";
    nextBtn.style.display = "block";
  } else {
    boxes.forEach((box) => {
      box.style.display = "block";
    });
    prevBtn.style.display = "none";
    nextBtn.style.display = "none";
  }
}

checkScreenSize();

prevBtn.addEventListener("click", () => {
  currentIndex = (currentIndex - 1 + boxes.length) % boxes.length;
  showBox(currentIndex);
});

nextBtn.addEventListener("click", () => {
  currentIndex = (currentIndex + 1) % boxes.length;
  showBox(currentIndex);
});

window.addEventListener("resize", checkScreenSize);
