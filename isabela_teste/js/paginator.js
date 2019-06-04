var numitens=7; //quantidade de itens a ser mostrado por página
var pagina=1;	//página inicial - DEIXE SEMPRE 1
var entity;
$(document).ready(function(){
	entity = $("#entity").val();
	getitens(pagina,numitens); //Chamando função que lista os itens
});
function change(p1, p2){
	$("#conteudo").css('opacity','0');
	setTimeout(function(){
		getitens(p1,p2);
		setTimeout(function(){
			$("#conteudo").css('opacity','1');
		},140)
	}, 140);
}
function getitens(pag, maximo){
	pagina = pag; //Atualização de pagina no contador do paginador
	$.ajax({
	type: 'POST',
	data: 'tipo=listagem&pag='+pag +'&maximo='+maximo,
	url:'operations/lista_'+entity+'.php',
   	success: function(retorno){
    	$('#conteudo').html(retorno); 
        	contador() //Chamando função que conta os itens e chama o paginador
     	}
    })
}
function contador(){
	$.ajax({
      	type: 'POST',
      	data: 'tipo=contador',
      	url:'operations/lista_'+entity+'.php',
   		success: function(retorno_pg){
        	paginador(retorno_pg)
      	}
    })
}
function paginador(cont){
	if(cont<=numitens){
		$('#paginador').html('<tr><td style="background-color:#ADD0C9;"><a href="#">1</a></td></tr>')
	}else{
		$('#paginador').html('<tr></tr>');
		if(pagina!=1){
			$('#paginador tr').append('<td><a href="#" onclick="change('+(pagina-1)+', '+numitens+')">Página Anterior</a></td>')
		}
		var qtdpaginas=Math.ceil(cont/numitens)
		for(var i=1;i<=qtdpaginas;i++){
			if(pagina==i){
				$('#paginador tr').append('<td  style="background-color:#ADD0C9;"><a href="#" onclick="change('+i+', '+numitens+')">'+i+'</a></td>')
			}else{
				$('#paginador tr').append('<td><a href="#" onclick="change('+i+', '+numitens+')">'+i+'</a></td>')
				}
		}
		if(pagina!=qtdpaginas){
			$('#paginador tr').append('<td><a href="#" onclick="change('+(pagina+1)+', '+numitens+')">Próxima Página</a></td>')
		}
	}
}