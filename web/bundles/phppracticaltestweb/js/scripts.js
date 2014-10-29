function submitClick(){
    $.post('{{path('update_product')}}',
                {id: 'id'},
            function(response){
                    if(response.code == 100 && response.success){
                                $(".editForm").reset();
                                console.log('test');

                    }

    }, "json");
}
function submitProduct(){
    $.post('{{path('homepage')}}',
            function(response){
                    if(response.code == 100 && response.success){
                                $(".editForm").reset();
                                console.log('test');

                    }

    }, "json");
}

$(document).ready(function() {
    $(".submitEdit").on('click', function(){
        submitClick();
    });
    $(".submitNewProduct").on('click', function(){
        console.log('test');
        submitProduct();
    });
});