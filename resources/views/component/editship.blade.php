<form  id="shipedit" action="{{ route('ship.edit') }}" method="POST">
    {{ csrf_field() }}
    <input type="text" name="id_ship" value="{{$ship->id_ship}}" style="display:none;">
    <div class="mb-3">
        <input class="form-control form-control-lg" name="nameship" value={{$ship->nameship}} type="text" placeholder="Name ship" aria-label=".form-control-lg example">
    </div>
    <div class="mb-3">
        <input class="form-control form-control-lg" name="idship" value={{$ship->idship}} disabled  type="text" placeholder="Id ship" aria-label=".form-control-lg example">
    </div>
    <div class="mb-3">
        <select class="form-select" name="id_guild" aria-label="Default select example">

            @foreach ($guilds as $item)
                    <option {{ $item->id_guild == $ship->id_guild ? "selected" : "" }}
                    value="{{$item->id_guild}}">{{$item->nameguild}}</option>
                
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <select class="form-select" name="status" aria-label="Default select example">
            <option value="0" {{ 0 == $ship->status ? "selected" : "" }}>Black list</option>
            <option value="1" {{ 1 == $ship->status ? "selected" : "" }}>White list</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>