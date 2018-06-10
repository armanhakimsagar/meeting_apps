
// all meeting data here
$.ajax({
    type:"GET",
    url:"meeting_data",
    dataType:"JSON",
    success:function(response){
        if(response.status  ==  "success"){
            var meeting_data = response.data;
            
                $(function () {
                    
                    var source  = [ ];
                    var mapping = { };

                    for(var i = 0; i < meeting_data.length; ++i) {
                        source.push(meeting_data[i].label);
                        mapping[meeting_data[i].label] = meeting_data[i].value;
                    }

                    // show data in meeting_for_text & tags_id1 hidden field
                    $("#meeting_for_text").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id1').val(mapping[ui.item.value]);
                        }
                    });



                     // show data in meeting_for_radio & tags_id3 hidden field
                    $("#meeting_for_radio").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id3').val(mapping[ui.item.value]);
                        }
                    });



                     // show data in agenda_for_multiple & tags_id4 hidden field
                    $("#meeting_for_multiple").autocomplete({
                        minLength: 1,
                        source: source,
                        select: function(event, ui) {
                            $('.tags_id5').val(mapping[ui.item.value]);
                        }
                    });   


                });
        }
    },error: function (request, status, error) {
        console.log(error);
    }
});

