$( document ).ready(function() {

    $.ajaxSetup({
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    });
    $.fn.editable.defaults.mode = 'inline';
    $(document).on('mousemove', function() {
        $('.my_edit').editable();
                // ... and another other fields you need to apply this too.
    });
    
    $('body').on("click", 'button.bnt-vocabulary-del', function(){

        var id = $(this).attr("id");
        id = id.substr(15, id.lenght);

        if (confirm('Вы действительно ходите удалить?')) {
            $.get( "/remove_vocabulary/" + id, function(data){
                $('tr#vocabulary-' + id).remove();
            })
        } else {

        };
    });

});
