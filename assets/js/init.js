/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("#fin_imagem").fileinput({
  allowedFileExtensions: ['jpg','jpeg', 'png', 'gif'],
  maxFileSize: 2500,
  showPreview: true,
  showUpload: false,
  showRemove: true,
  msgValidationError: 'Arquivo não suportado...',
  language: 'pt-BR'
});

$(document).ready(function(){
    $('#valor').maskMoney();
});

$(document).ready(function(){
    $('#data').mask("99/99/9999");
});

$(function() {
    $("#data").datepicker({dateFormat: 'dd/mm/yy'});
}); 
