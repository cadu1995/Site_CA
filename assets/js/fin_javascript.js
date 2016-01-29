function conf_excluir(id){
    var resposta = confirm("Deseja remover esta finança?");
    
    if(resposta==true){
        window.location.href = base_url+"adm/financas/remover/"+id
    }
}