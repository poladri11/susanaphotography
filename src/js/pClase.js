if(window.location.pathname.includes("/clases/add")) {
    $('#tipo').change(function(){
        const tipo = $('#tipo').val();
        if(tipo == 1) {
            $("#fechasFieldset").css("display", "none");
            $("#fechasFieldset div div input");
        } else {
            $("#fechasFieldset").css("display", "flex");
        }
    });
}