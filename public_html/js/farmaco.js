$('#createFarma').click(function(){    
    var datosCreate = {
        "nom_come" : $('#nomComer').val(),
        "nom_cli" : $('#nomClin').val(),
        "num_unDo" : $('#numDos').val(),
        "compues" : $('#compuesto').val(),
        "ubica" : $('#ubica').val(),
        "cod_prove" : $('#cod_prove').val(),
        "total_dosi" : $('#tol_dosis').val(),
        "prec_dosis" : $('#pre_dos').val(),
        "type": 1
    }
    $.ajax({
        type: "POST",
        url: "../php/farmaco.php",
        data: datosCreate,
        success: function (response) {
            window.location.reload();
        }
    });
});

let id_farma;

function datosFarma(nC,nCl,nUD,com,ubic,codP,totD,preD,id){
    $('#updateFarma').modal('toggle');
    $('#nomComerU').val(nC);
    $('#nomClinU').val(nCl);
    $('#numDosU').val(nUD);
    $('#compuestoU').val(com);
    $('#ubicaU').val(ubic);
    $('#cod_proveU').val(codP);
    $('#tol_dosisU').val(totD);
    $('#pre_dosU').val(preD);
    id_farma = id;
    
}

$('#updateF').click(function(){
    var datosCreate = {
        "nom_come" : $('#nomComerU').val(),
        "nom_cli" : $('#nomClinU').val(),
        "num_unDo" :  $('#numDosU').val(),
        "compues" : $('#compuestoU').val(),
        "ubica" :  $('#ubicaU').val(),
        "cod_prove" : $('#cod_proveU').val(),
        "total_dosi" :$('#tol_dosisU').val(),
        "prec_dosis" : $('#pre_dosU').val(),
        "numReg": id_farma,
        "type": 2
    } 
    console.log(datosCreate);
    $.ajax({
        type: "POST",
        url: "../php/farmaco.php",
        data: datosCreate,
        success: function (response) {
            window.location.reload();
        }
    }); 
});

function delFarma(nC,nCl,id){
    $('#delFarma').modal('toggle');
    id_farma = id;
    const contenido =  document.getElementById("farmaElimi");
    let texto = " <div>\
    <p class='text-center'> ¿Esta seguro de eliminar el Farmaco <strong>'"+  nC +"'</strong> ( "+ nCl +" )?</p>\
    <div class='text-center'> <small>Si elimina el medicamento no podra recuperarlo</small> </div>\
    <input type='hidden' id='num_reg' value='"+id_farma+"'>\
    </div>";
    contenido.innerHTML = texto;
}

$('#deleteF').click(function(){
    var datosCreate = {
        "numReg": $('#num_reg').val(),
        "type": 3
    } 
    console.log(datosCreate);
    $.ajax({
        type: "POST",
        url: "../php/farmaco.php",
        data: datosCreate,
        success: function (response) {
            location.reload();
        }
    });
});

$(document).ready( function () {
    $('#crudFarma').DataTable({
        "language": {
            "lengthMenu": "Mostar _MENU_ farmacos en la pantallas",
            "zeroRecords": "Nothing found - sorry",
            "info": "Esta en la page _PAGE_ de _PAGES_",
            "infoEmpty": "No hay informacion",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior",
            },
            "search": "Buscar"
        }
    });
    } );