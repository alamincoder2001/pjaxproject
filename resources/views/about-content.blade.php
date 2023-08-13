<div class="container">
    <div class="row">
        <div class="col-6 ps-0">
            @foreach($users->take(1000) as $item)
            <li style="display:inline-block;background: #ffc4c4;list-style: none;padding: 2px 5px;border-bottom: 1px solid gray;margin-bottom:3px;" onclick="ClickMe(event)">{{$item->name}}</li>
            @endforeach
        </div>
        <div class="col-6 pe-0">
            @foreach($users->skip(1000) as $item)
            <li>{{$item->name}}</li>
            @endforeach
        </div>
    </div>
</div>

<script>
    function ClickMe(event) {
        event.preventDefault();
        alert(event.target.innerText);
    }
</script>