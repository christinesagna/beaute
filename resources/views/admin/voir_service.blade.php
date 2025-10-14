<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
    .table_deg
    {
        border: 2px solid white;
        margin: auto;
        width: 100%;
        text-align: center;
        margin-top: 40px;
    }
    .th_deg
    {
       background-color: skyblue; 
       padding: 15px;
    }
    tr
    {
      border: 3px solid white;
    }
    td
    {
      padding: 10px;
    }

    </style>
  </head>
  <body>
   @include('admin.header')
   @include('admin.sidebar')
     
            
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
           <table class="table_deg">
            <tr>
                <th class="th_deg">nom_service</th>
                <th class="th_deg">description</th>
                <th class="th_deg">prix</th>
                <th class="th_deg">wifi</th>
                <th class="th_deg">type_service</th>
                <th class="th_deg">image</th>
                <th class="th_deg">Supprimer</th>
                <th class="th_deg">Mise à jour</th>
            </tr>

            @foreach ( $data as $data)
            <tr>
                <td>{{$data->nom_service}}</td>
                <td>{!! Str::limit($data->description,150) !!}</td>
                <td>{{$data->prix}}Franc</td>
                <td>{{$data->wifi}}</td>
                <td>{{$data->type_service}}</td>
                <td>
                  <image  width="100" src="salon/{{$data->image}}">
                </td>
                <td>
                  <a  onclick="return confirm('etes vous sure de vouloir suprimer');"class="btn btn-danger" href="{{url('service_supprimer',$data->id)}}">supprimer</a>
                </td>
                 <td>
                  <a  class="btn btn-warning" href="{{url('service_mjour',$data->id)}}">Mise à jour</a>
                </td>
            </tr>
            @endforeach
           </table>
            </div>
        </div>
      </div>

        @include('admin.footer')
  </body>
</html>