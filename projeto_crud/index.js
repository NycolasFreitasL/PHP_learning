function fecharModal() {
  document.getElementById('modal').style.display = 'none';
}

function abrirmodal(id, nome, email, senha) {
  document.getElementById('modal').style.display = 'flex';

  // Preenche os campos do modal
  document.getElementById('idvizual').value = id;
  document.getElementById('idUsuario').value = id;
  document.getElementById('nomeUsuario').value = nome;
  document.getElementById('emailUsuario').value = email;
  document.getElementById('senhausuario').value = senha;
}

// Fecha modal quando carregar a página
window.onload = fecharModal;

document.querySelectorAll(".edit").forEach(btn => {
  btn.addEventListener("click", () => {
    abrirmodal(
      btn.dataset.id,
      btn.dataset.nome,
      btn.dataset.email,
      btn.dataset.senha
    );
  });
});
