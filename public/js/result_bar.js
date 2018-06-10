
function LiveBarChart(param1){
     $.ajax({
        type:"GET",
        url:"/admin/chart_data",
        datuaType:"JSON",
        //data:"ques_id="+param1,
        success:function(response){
            //chart=null;
             console.log(response);
        },
        error:function(e){
            console.log(e);
        }
});
}


 







