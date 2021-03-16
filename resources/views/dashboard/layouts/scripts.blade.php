<script>
    $('#selectAll').on('click', function () {
        var checkBoxes = $("input[name=action]");
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
    });


    function ajaxRequest(path, formData, callback = null,type='POST') {

        formData.append('_token', $('input[name=_token]').val());

        $.ajax({
            url: path,
            type: type,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                loading();
            },
            success: function (response) {
                loading();
                if (callback != null) callback(response);


            },
            error: function (response) {
                console.log(response)
                loading();
                alert('error');

            }
        });
    }


    function loading() {
        $(".loading-container").toggleClass("d-none d-flix");
    }

    function toTimestamp(strDate){
        var datum = Date.parse(strDate);
        return datum/1000;
    }


</script>
