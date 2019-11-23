$(document).ready(function(){
    $(window).scroll(function(){
        let position = $(window).scrollTop()
        let bottom = $(document).height() - $(window).height()
        if(position == bottom){
            let row = Number($('#row').val())
            let allcount = Number($('#all').val())
            let rowerpage = 3
            row = row + rowerpage
            if(row <= allcount){
                $('#row').val(row);
                $.ajax({
                    url: 'getEvent.php',
                    type: 'post',
                    data: {row:row},
                    success: function(response){
                        $(".middle-content").append(response)
                    }
                })
            }
        }
    })
})