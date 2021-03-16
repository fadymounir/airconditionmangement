@extends("layouts.app")
@section("title","Intallation")

@section("content")

    <form class="form" action="#" method="POST"
          enctype="multipart/form-data">
        <div class="container">

            @include('employe.AgentInfo')


            <div class="card">
                <div class="card-header" style="color:white; background-color:#97195a;">Create New Pipes Extension</div>
                <div class="card-body">
                    <input type="hidden" id="numberofRow" name="numberofRow" value="{{$order->PipesExtension->count()}}">
                    <div id="content">
                        @foreach($order->PipesExtension as $row)
                                @include('employe.PipesExtension.PipesElement',['id'=>$loop->index,'orderInfo'=>$row])
                        @endforeach
                    </div>
                </div>


                <div class="card-footer">
                    <p class="btn btn-primary btn-block" onclick="addNewElement();">ِAdd New Element <i
                            class="fas fa-plus"></i></p>
                </div>
            </div>


            <span class="btn btn-success btn-block mt-3" onclick="createNewPipes()">Create New Pipes Extension <i
                    class="fas fa-plus"></i></span>

        </div>

    </form>
@endsection


@push('custom-scripts')
    <script>
        function addNewElement() {
            let rowId = $('#numberofRow').val();
            $('#numberofRow').val(Number(rowId) + Number(1));
            let path = "{{route('employe.Pipes.getRow')}}";
            let formData = new FormData();
            formData.append('rowId', rowId);
            ajaxRequest(path, formData, function (response) {
                $('#content').append(response);
            });
        }

        function deleteElement(rowId) {
            $('#row_' + rowId).html('');
            calTotal();
        }

        function calTotal() {
            var inputs = $(".calTotal");
            let total = 0;
            for (var i = 0; i < inputs.length; i++)
                total = total + Number($(inputs[i]).val());
            $('#total_invoice').val(total);
        }


        function createNewPipes() {
            let form = $('.form');
            let path = "{{route('employe.Pipes.createNewPipes')}}";
            let data = new FormData(form[0]);

            ajaxRequest(path, data, function (response) {
                if (response.status == 200) {
                    swal("create New Pipes Extension!", response.messsage, "success");
                    $('#content').html('');
                    $('#name').val('');
                    $('#phone').val('');
                    $('#total_invoice').val('');
                    setTimeout(() => {
                        location.href="{{route('employe.home.index')}}";
                    }, 2000);

                } else if (response.status == 400) {
                    swal("opps!", 'Please Enter All inputs with Correct Answer', "warning");
                    $("input,select,textarea").removeClass("is-invalid");
                    for (let k in response.message)
                        $("input[name=" + k + "],select[name=" + k + "],textarea[name=" + k + "]").addClass("is-invalid");
                } else if (response.status == 401) {
                    swal("opps!", 'The Total Invoice Is 0 please Add element in detail', "warning");
                } else if (response.status == 402) {
                    swal("opps!", "you Don't have Permission to create this installtion Please connect with Mangers", "warning");
                }
            });

        }


    </script>
@endpush



