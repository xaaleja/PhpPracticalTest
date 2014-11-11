$(document).ready(function() {
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
                    var list = $("#showProducts").append('<ul id="product'+data.productId+'"></ul>').find('ul#product'+data.productId);
                    list.append('<li>'+data.productName+'</li>');
                    list.append('<li>'+data.productPrice+'</li>');
                    list.append('<li>'+data.productUpdatedAt +'</li>');
                    list.append('<li><a href="/app_dev.php/delete_product/'+data.productId+'">Delete</a></li>');
                    list.append('<li><a href="/app_dev.php/update_product/'+data.productId+'">Edit</a></li>');
                    list.append('<br>');
                }
                else{
                  alert('An unexpeded error occured');
                  console.log(data.responseCode);
               }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });
    $('#editForm').submit(function(e){
        e.preventDefault();
        var $url=$('#editForm').attr('action');
        var $formData = $('#editForm').serialize();
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
                    $("#editList").find('li#liName').html(data.productName);
                    $("#editList").find('li#liPrice').html(data.productPrice);
                    $("#editList").find('li#liDate').html(data.productUpdatedAt);

                }
                else{
                  alert('An unexpeded error occured');
                  console.log(data.responseCode);
               }
            },
            error: function(err) {
                console.log(err);
            }
        });
    });

    /*$('.deleteLink a').click(function(){
        var $url=$(this).attr('href');
        var idInput= $(this).find('input#idProduct');
        console.log(idInput);
        var $id = $(idInput).val();
        console.log($url);
        console.log($id);
        $.ajax({
            url: $url,
            data: $id,
            success: function(data)
            {
                if(data.responseCode==200)
                {
                    console.log('Borrado con éxito');
                }
                else
                {
                    console.log(data.responseCode);
                }
            },
            error: function(err)
            {
                console.log(err);
            }
        });
    });*/
    $('.delete-form').submit(function(){
        var $id = $(this).children().next().val();
        console.log('#deleteForm'+$id);
        var $formData = $('#deleteForm'+$id).serialize();
        var $url = $(this).attr('action');
        /*$.post($url,{
            id:$id,
            other:"attributes"
        },function(data){
            console.log(data.responseCode);
            $("#showProducts").find('ul#product'+$id).remove();
        });*/
        $.ajax({
            url: $url,
            data: $formData,
            method: 'post',
            dataType: 'json',
            cache: false,
            success: function(data)
            {
                if(data.responseCode==200)
                {
                    console.log('Borrado con éxito');
                    console.log(data.responseCode);
                    $("#showProducts").find('ul#product'+$id).remove();
                }
                else
                {
                    console.log(data.responseCode);
                }
            },
            error: function(err)
            {
                console.log(err);
            }
        });

    });
});
