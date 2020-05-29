<h2>Bảng demo</h2>
@foreach($ds as $objRow)
ID:{{$objRow->id}} <br>
Name: {{$objRow->name}} <br>
DES:{{$objRow->dess}} <br>
@endforeach