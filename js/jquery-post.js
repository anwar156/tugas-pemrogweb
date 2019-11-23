console.log("cek0")

$(document).ready(function(){
    $(window).scroll(function(){
        let position = $(window).scrollTop();
        let bottom = $(document).height() - $(window).height();

        console.log("cek1")

        if(position == bottom){
            let row = Number($('#row').val());
            let allcount = Number($('#all').val());
            let rowerpage = 3;
            row = row + rowerpage;

            console.log("debug")

            if(row <= allcount){
                console.log("debg 2")
                console.log(row)
                console.log(allcount)
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