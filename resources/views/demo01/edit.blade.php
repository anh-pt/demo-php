<h1>Trang sửa </h1>
@isset($err)

    @foreach($err as $e)
        <p style="color: red">{{ implode('<br>',$e) }}</p>
    @endforeach

@endisset
@isset($msg)
    <p style="color: green"> {{ $msg }}</p>
@endisset


<form action="" method="post">
    @csrf
    Name: <input type="text" value="{{$objDemo->name}}" name="txt_name"> <br>
    Des : <input type="text" value="{{$objDemo->dess}}" name="txt_dess"> <br>
    <button>Save Update</button>

</form>