/**
 * Created by hossein on 12/17/16.
 */

$("#subscribe").click(function(){
    var url = $(this).attr("data-link");

    //add it to your data
    var data = {
        _token:$(this).data('token'),
        Email:$('#submail').val()
    };
    $.ajax({
        url: url,
        type:"POST",
        data: data,
        success:function(data){
            // alert(data.msg);
            if(data.msg==1){
                $('#subform').hide('slow');
                $('#errorform').show('fast')
            }
            if(data.msg==2){
                $('#subform').hide('slow');
                $('#errorform1').show('fast')
            }
            if(data.msg==3){
                $('#subform').hide('slow');
                $('#successform').show('fast')
            }

        },error:function(){
                $('#subform').hide('slow');
                $('#errorform2').show('fast')
        }
    }); //end of ajax
});
