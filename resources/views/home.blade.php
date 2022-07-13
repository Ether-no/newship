@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6 d-grid gap-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalships">
                SHIPS
            </button>
        </div>
        <div class="col-6 d-grid gap-2">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalclanes">
                GUILD
            </button>
        </div>
    </div>
    <hr>
    <div class="row">
        <table id="shiptable" data-page-length='25' class="row-border">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">ID</th>
              <th scope="col">GUILD</th>
              <th scope="col">STATUS</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ships as $item)
            @if ($item->status == 0)
              <tr style="background-color:#d58888 ">
            @else
              <tr style="background-color:#9ddd9b">
            @endif
             
                <td>{{$item->nameship}}</td>
                <td>{{$item->idship}}</td>
                <td>{{$item->nameguild}}</td>
                <td> 
                  @if ($item->status == 0)
                      Black list
                  @else
                      White list
                  @endif
                </td>
                <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalexpedient" onclick="openexpedient({{$item->id_ship}});">
                  <i class="bi bi-archive-fill"></i>
                    expedient
                   </button>
                   <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modaledit" onclick="openedit({{$item->id_ship}});">
                   <i class="bi bi-pen-fill"></i>
                    edit
                   </button>
                </td>
                
              </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalclanes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PANEL GUILD</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <form id="guildregister" action="{{ route('guild.register') }}" method="POST">
                  {{ csrf_field() }}
                    <div class="mb-3">
                        <input class="form-control form-control-lg" name="nameguild" type="text" placeholder="Name guild" aria-label=".form-control-lg example">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($guilds as $item)
                        <tr>
                          <td>{{$item->nameguild}}</td>
                          <td>NONE</td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modalships" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PANEL SHIP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  id="shipregister" action="{{ route('ship.register') }}" method="POST">
              {{ csrf_field() }}
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="nameship" type="text" placeholder="Name ship" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <input class="form-control form-control-lg" name="idship" type="text" placeholder="Id ship" aria-label=".form-control-lg example">
                </div>
                <div class="mb-3">
                    <select class="form-select" name="id_guild" aria-label="Default select example">
                      @foreach ($guilds as $item)
                        <option value="{{$item->id_guild}}">{{$item->nameguild}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="0">Black list</option>
                        <option value="1">White list</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="modalexpedient" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">PANEL EXPEDIENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form  id="expedientregister"  action="{{ route('expedient.register') }}"  method="POST">
            {{-- action="{{ route('ship.register') }}" --}}
            {{ csrf_field() }}
              <input type="text" id="expedientship" name="id_ship" style="display: none">
              <div class="mb-3">
                <label for="textexpedient" class="form-label">describe the reason</label>
                <textarea class="form-control" id="textexpedient" name="expedient" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <div class="row" id="expedienttable">
            
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modaledit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PANEL EDIT SHIP</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editshipform">
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
<script>
  function openexpedient(id) {
    $('#expedientship').val(id);
    //expedientship
    fetch('https://safeset.crewcare.online/expedientget/' + id,{
        method: 'get'
    }).then(function(response){
        return response.text();
    }).then(function(htmlContent){
        $("#expedienttable").html(htmlContent);
    }).catch(function(err){
        console.log(err);
    });
  }
  function openedit(id) {
    fetch('https://safeset.crewcare.online/openedit/' + id,{
        method: 'get'
    }).then(function(response){
        return response.text();
    }).then(function(htmlContent){
        $("#editshipform").html(htmlContent);
    }).catch(function(err){
        console.log(err);
    });
  }
  $(document).ready( function () {
        $('#shiptable').DataTable(
           
        );
    });

</script>
@endsection
