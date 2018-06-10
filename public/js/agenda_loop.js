var count = "1";

$("#add").click(function () {
    var html = '<div class="panel-body panel_hide'+count+'"><header class="panel-heading">Add Agenda | <button type="button" id="panel_hide'+count+'" onclick="hide_panel(this.id)"  style="border:none;float:right"><i class="fa fa-trash-o btn btn-danger"></i></button></header><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Agenda name</label><div class="col-lg-10"><input type="text" required class="form-control" id="inputPassword1" placeholder="Agenda name" name="agenda_name_'+count+'"></div></div><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Speaker</label><div class="col-lg-10"><input type="text" required class="form-control" id="inputPassword1" placeholder="Speaker" name="speaker_'+count+'"></div></div><div class="form-group"><label for="inputPassword1" class="col-lg-2 col-sm-2 control-label">Room No</label><div class="col-lg-10"><input required type="text" class="form-control" id="inputPassword1" placeholder="Room No" name="room_'+count+'""><input type="hidden" name="count" value="'+count+'"></div></div></div>';
    $("#address").append(html);

    count++;
});


function hide_panel(id){
    $("."+id).hide();
    $("."+id).hide();
}
