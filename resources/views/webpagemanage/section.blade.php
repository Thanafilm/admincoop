@extends('master')
@section('title', 'จัดการ section')
@section('content')
    <div class="row mt-5">
        <div class="col-md-10 offset-md-1">
            <h3 class="text-center mb-4">Drag and Drop Datatables Using jQuery UI Sortable - Demo </h3>
            <table id="table" class="table table-bordered">
                <thead>
                    <tr>
                        <th width="30px">#</th>
                        <th>Title</th>

                    </tr>
                </thead>
                <tbody id="tablecontents">
                    @foreach ($posts as $post)
                        <tr class="row1" data-id="{{ $post->id }}">
                            <td class="pl-3"><i class="fa fa-sort"></i></td>
                            <td>{{ $post->title }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h5>Drag and Drop the table rows and <button class="btn btn-success btn-sm"
                    onclick="window.location.reload()">REFRESH</button> the page to check the Demo.</h5>
        </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#table").DataTable();
            $("#tablecontents").sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index, element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index + 1
                    });
                });

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ url('sectionupdate') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "success") {
                            console.log(response);
                        } else {
                            console.log(response);
                        }
                    }
                });
            }
        });
    </script>

@endsection
