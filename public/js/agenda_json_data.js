
// all meeting data here
$.ajax({
    type:"GET",
    url:"agenda_data",
    dataType:"JSON",
    success:function(response){
        if(response.status  ==  "success"){
            var agenda_data = response.data;
            
                $(function () {
                    
                    var source  = [ ];
                    var mapping = { };

                    for(var i = 0; i < agenda_data.length; ++i) {
                        source.push(agenda_data[i].label);
                        mapping[agenda_data[i].label] = agenda_data[i].value;
                    }



                     // show data in agenda_for_text & tags_id2 hidden field
                    $("#agenda_for_text").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id2').val(mapping[ui.item.value]);
                        }
                    });



                     // show data in agenda_for_radio & tags_id4 hidden field
                    $("#agenda_for_radio").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id4').val(mapping[ui.item.value]);
                        }
                    });


                     // show data in agenda_for_multiple & tags_id4 hidden field
                    $("#agenda_for_multiple").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id6').val(mapping[ui.item.value]);
                        }
                    });



                });
        }
    },error: function (request, status, error) {
        console.log(error);
    }
});

