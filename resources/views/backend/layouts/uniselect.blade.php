<div class="col-sm-12">
    <select name="{{$name}}" id="{{$name}}" class="form-control">
        @for($i=1; $i<=30; $i++)
            <option value="{{$i}}" {{--@foreach($orders as $j) @if($j == $i) disabled @endif @endforeach--}} >{{$i}}</option>
        @endfor
    </select>
</div>
