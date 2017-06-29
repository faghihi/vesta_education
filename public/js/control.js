/**
 * Created by hossein on 12/17/16.
 */

$("#subscribe").click(function(){
    var url = $(this).attr("data-link");
    console.log('clicked');

    //add it to your data
    var data = {
        _token:$(this).data('token'),
        Email:$('#submail').val()
    };
    // alert($('#submail').val());
    $.ajax({
        url: url,
        type:"POST",
        data: data,
        success:function(data){
            //alert(data.msg);
            if(data.msg==1){
                $('#errorform').show('fast')
            }
            if(data.msg==2){
                $('#errorform').show('fast')
            }
            if(data.msg==4){
                $('#errorform1').show('fast')
            }
            if(data.msg==3){
                $('#successform').show('fast')
            }

        },error:function(){
                // $('#subform').hide('slow');
                $('#errorform2').show('fast')
        }
    }); //end of ajax
});
