<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">USER</th>
        <th scope="col">DESCRIPTION</th>
        <th scope="col">DATE</th>

      </tr>
    </thead>
    <tbody>
      @foreach ($expedient as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->description}}</td>
          <td>{{$item->created_at}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>