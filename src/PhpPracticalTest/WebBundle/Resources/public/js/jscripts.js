$(document).ready(function() {
    console.log('el documento está preparado');
    $('#formTitle').on('click', function(){
        console.log($(this));
    });
    $('#newForm').submit(function(e){
        e.preventDefault();
        var $url=$('#newForm').attr('action');
        var $formData = $('#newForm').serialize();
        console.log($url);
        $.ajax({
            url: $url,
            data: $formData,
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data)
            {
                if(data.responseCode==200 )
                {
                    console.log('200');
                    //alert('Nuevo producto añadido');
                    //$('#output').html(data.responseCode);
                }
                else{
                  alert('An unexpeded error occured');
                  $('#output').html(data.responseCode);
               }
            },
            error: function() {
                console.log('error');
            }
        });

       });
});
