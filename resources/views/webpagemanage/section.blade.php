@extends('master')
@section('title', 'จัดการ section')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">

            <ul class="sort_menu list-group">
                @foreach ($data as $row)
                <li class="list-group-item" data-id="{{$row->id}}">
                    <span class="handle"></span> {{$row->title}}</li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
<style>
    .list-group-item {
        display: flex;
        align-items: center;
    }

    .highlight {
        background: #f7e7d3;
        min-height: 30px;
        list-style-type: none;
    }

    .handle {
        min-width: 18px;
        background: #607D8B;
        height: 15px;
        display: inline-block;
        cursor: move;
        margin-right: 10px;
    }
</style>


@endsection


<script type="text/javascript">

</script>
