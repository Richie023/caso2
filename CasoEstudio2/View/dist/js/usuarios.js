function ConsultarNombre()
{
    document.getElementById("btnProcesar").disabled = true;
    let cedulas =  document.getElementById("txtCedula").value;

    if(identificacion.length >= 9)
    {
        $.ajax({
            type : 'GET',
            url : 'https://apis.gometa.org/cedulas/' + identificacion,
            dataType : 'json',
            success: function(data){
                if(data.resultcount > 0)
                {
                    document.getElementById("btnProcesar").disabled = false;
                    document.getElementById("txtNombre").value = data.nombre;
                }
                else
                {
                    document.getElementById("txtNombre").value = "";
                }   
            }
        });  
    } 
    else
    {
        document.getElementById("txtNombre").value = "";
    }
}