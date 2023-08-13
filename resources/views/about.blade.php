@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-3">
        <div class="col-md-6 offset-md-3 mb-2">
            <form onsubmit="SaveData(event)">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" />
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control shadow-none" autocomplete="off" />
                </div>
                <div class="form-group text-center mt-2">
                    <button type="submit" class="btn btn-success btn-sm px-4">Update</button>
                </div>
            </form>
        </div>
        <div class="col-6 ps-0">
            @foreach($users->take(1000) as $item)
            <li data-id="{{$item->id}}" style="display:inline-block;background: #ffc4c4;list-style: none;padding: 2px 5px;border-bottom: 1px solid gray;margin-bottom:3px;" onclick="ClickMe(event)">{{$item->name}}</li>
            @endforeach
        </div>
        <div class="col-6 pe-0">
            @foreach($users->skip(1000) as $item)
            <li style="display:inline-block;background: #ffc4c4;list-style: none;padding: 2px 5px;border-bottom: 1px solid gray;margin-bottom:3px;" onclick="ClickMe(event)">{{$item->name}}</li>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('webjs')
<script>
    function ClickMe(event) {
        event.preventDefault();
        $("#name").val(event.target.innerText)
        $("#id").val(event.target.attributes[0].value)
    }

    function SaveData(event) {
        event.preventDefault();

        let formdata = new FormData(event.target)
        $.ajax({
            url: "/update-user",
            method: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: res => {
                if (res.status) {
                    alert(res.msg);
                    location.href = '/about';
                }
            }
        })
    }
</script>
@endpush