// this function will be executed every time we change the text
// last edit 3-22-2023

function autocomplete_fungi_name()
{
    var min_length = 0; // min caracters to display the autocomplete
    var keyword = $('#MBList').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../ajax/mushroom/refresh_fungi_name.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#input_fungi_name').show();
                $('#input_fungi_name').html(data);
            }
        });

    } else {
        $('#input_fungi_name').hide();
    }
}

// set_item : this function will be executed when we select an item
function set_fungi_name(item) {
    // change input value

    $("#MBList").val( item );

    // hide proposition list
    $('#input_fungi_name').hide();
}

function autocomplete_color()
{
    var min_length = 1; // min caracters to display the autocomplete
    var keyword = $('#id').val();
    if (keyword.length >= min_length) {
        $.ajax({
            url: '../ajax/mushroom/refresh_color.php',
            type: 'POST',
            data: {keyword:keyword},
            success:function(data){
                $('#input_color').show();
                $('#input_color').html(data);
            }
        });

    } else {
        $('#input_fungi_name').hide();
    }
}

// set_item : this function will be executed when we select an item
function set_color(item) {
    // change input value

    $("#id").val( item );

    // hide proposition list
    $('#input_color_id').hide();
}



