$(document).ready(function(){
    var count = 1;
    $("#add_multiple_question").click(function () {
        var html = '<input type="text" class="form-control" name="option_title'+count+'" placeholder="Checkbox Box Title"><input type="hidden" value="'+count+'" name="loop"/><br>';
        $("#address").append(html);

        count++;
    });
});