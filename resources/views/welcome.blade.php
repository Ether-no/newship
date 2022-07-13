
 @extends('layouts.app')

 @section('content')
 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
 <div class="container">
     <hr>
      <!--<div class="row">
         <table id="shiptable">
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
                    <tr>
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
                    <td>NONE</td>
                    </tr>
                @endforeach
           </tbody>
         </table>
     </div>-->
 </div>
 <!-- Modal -->
 
 <script>
   $(document).ready( function () {
     $('#shiptable').DataTable();
   } );
 </script>
 @endsection
 


           