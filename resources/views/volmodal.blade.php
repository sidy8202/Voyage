@extends("layouts.master")

@section("contenu")
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


<title>Bootstrap User Management Data Table</title>
{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round"> --}}

{{-- <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> --}}
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

{{-- Style table --}}

<style>
    /* body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    } */
    .table-responsive {
        margin: 30px 0;
    }
   
    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }
    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }
    .table-title .btn:hover, .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }
    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }
    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }
    table.table tr th:first-child {
        width: 60px;
    }
    table.table tr th:last-child {
        width: 100px;
    }
   
    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }
    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }
    table.table td a:hover {
        color: #2196F3;
    }
    table.table td a.settings {
        color: #2196F3;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
    
 
    .text-success {
        color: #10c469;
    }
    .text-info {
        color: #62c9e8;
    }
    .text-warning {
        color: #FFC107;
    }
    .text-danger {
        color: #ff5b5b;
    }
   
   
    
    </style>
 

{{-- End table --}}



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Programmer un Vol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="{{ action('VolController@store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Code </label>
                            <input type="text" class="form-control" name="cod" >
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Destination </label>
                            <input type="text" class="form-control" name="dest" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Date de depart</label>
                            <input type="date" class="form-control" name="dates" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Heure de depart</label>
                            <input type="time" class="form-control" name="heures" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre De place A </label>
                            <input type="number" class="form-control" name="classa" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Prix De place A </label>
                            <input type="number" class="form-control" name="pclassa" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre De place B </label>
                            <input type="number" class="form-control" name="classb" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Prix De place B </label>
                            <input type="number" class="form-control" name="pclassb" >
                        </div>
                    
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Programmer</button>
                    </div>
                </form>
        </div>
    </div>
  </div>
    {{-- End Add Modal --}}


    {{-- EDiter un vol --}}

            
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un Vol programmé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="/vol" id="editForm" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        <input type="" value="" id="id_vols" name="id"/> 

                        <div class="mb-3">
                            <label for="" class="form-label">Code </label>
                            <input type="text" class="form-control" name="cod" id="cod">
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Destination </label>
                            <input type="text" class="form-control" name="dest" id="dest">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Date de depart</label>
                            <input type="date" class="form-control" name="dates" id="dates">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Heure de depart</label>
                            <input type="time" class="form-control" name="heures" id="heures" >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre De place A </label>
                            <input type="number" class="form-control" name="classa" id="classa">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Prix De place A </label>
                            <input type="number" class="form-control" name="pclassa" id="pclassa"  >
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Nombre De place B </label>
                            <input type="number" class="form-control" name="classb" id="classb">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Prix De place B </label>
                            <input type="number" class="form-control" name="pclassb" id="pclassb" >
                        </div>
                    
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
        </div>
    </div>
  </div>

  
    {{-- Start of Show Modal --}}
                  
<div class="modal fade" id="showModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Les details du Vol</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="" id="showForm" method="POST">
                    {{-- {{ csrf_field() }} --}}
                    {{ method_field('PUT') }}
                    <div class="modal-body">
                        {{-- <input type="" value="" id="id_vols" name="id"/>  --}}
                        
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                       
                        <div class="modal-body">
                            <input type="" value="" id="id_vols" name="id"/> 
    
                            <div class="mb-3">
                                <label for="" class="form-label">Code </label>
                                <input type="text" class="form-control" name="cod" id="cod">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Destination </label>
                                <input type="text" class="form-control" name="dest" id="dest">
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Date de depart</label>
                                <input type="date" class="form-control" name="dates" id="dates">
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Heure de depart</label>
                                <input type="time" class="form-control" name="heures" id="heures" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre De place A </label>
                                <input type="number" class="form-control" name="classa" id="classa">
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Prix De place A </label>
                                <input type="number" class="form-control" name="pclassa" id="pclassa"  >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre De place B </label>
                                <input type="number" class="form-control" name="classb" id="classb">
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Prix De place B </label>
                                <input type="number" class="form-control" name="pclassb" id="pclassb" >
                            </div>
                        
                        </div>
                    
                    </div>
                    
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div> --}}
                </form>
        </div>
    </div>
  </div>
    {{-- End of show Modal --}}
    

    {{-- Delete Modal --}}

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmer la suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="/vol" id="deleteForm" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="modal-body">

                            <div class="mb-3">
                                <h6>Voulez-vous vraiment supprimer cette ligne?</h6>
                            </div>

                             <input type="hidden" name="_method" value="DELETE">
                        
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Non</button>
                            <button type="submit" class="btn btn-danger">Oui</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
    

    {{-- End of delete  Modal --}}



    {{-- Modal Reservation --}}

    <div class="modal fade" id="reserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reserver un Vol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{ action('ReservationController@store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            

                            <div class="mb-3">
                                <label for="" class="form-label">Numero de pièce</label>
                                <input type="text" class="form-control" name="piece" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Prénom du passager </label>
                                <input type="text" class="form-control" name="prenom_passager" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Nom du passager </label>
                                <input type="text" class="form-control" name="nom_passager" >
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Telephone </label>
                                <input type="text" class="form-control" name="telephone" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Classe</label>
                                <select class="form-select form-select-sm" name="classe" aria-label=".form-select-sm example">
                                    <option selected>Selectionner une classe</option>
                                    <option value="1">Classe Affaire </option>
                                    <option value="2">Classe Business</option>
                                  </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Vol</label>
                                <select class="form-select form-select-sm" name="vols_id" aria-label=".form-select-sm example">
                                    @foreach ($bouger as  $come)
                                    <option value="{{$come->id}}">{{ $come->code }}</option>  
                                    @endforeach
                                    
                                  </select>
                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Reserver</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
    

    {{-- End of reservation --}}

  {{-- style --}}


  
    </head>
    


  {{-- End style table --}}

  @if(count($errors) > 0)
  <div class=" alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>    
          @endforeach
      </ul>
  </div>
  @endif
  @if (session('success'))
      <div class="alert alert-success">
          <p>{{ session('success') }}</p>
      </div> 
  @endif

 
    {{-- <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>La liste des vols <b>Programés</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons"></i> <span>Programmer un Vol</span></a>
                            						
                        </div>
                    </div>
                </div>
                <table id="datatable" class="table  table-hover table-bordered" >  
                    <thead class="table-light">
                        <tr>
                            <th>Code</th>
                            <th>Destination</th>						
                            <th>Date de depart</th>
                            <th>Heure de depart</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bouger as $voldata)

                        <tr>
                            <th>{{ $voldata->code }}</td>
                            <td>{{ $voldata->destination }}</td>
                            <td>{{ $voldata->date_depart }}</td>                        
                            <td>{{ $voldata->heure_depart }}</td>
                            <td>
                                <a href=""  title="Details" data-toggle="tooltip"> <i class="fa-solid fa-eye"></i></a>
                                <a href="" title="reserver" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#reserModal"><i class="fa-solid fa-jet-fighter-up"></i></a>
                                 <a href="#" class="edit btn btn-primary btn-sm"  >Edit</a> 
                                
                          {{-- <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a> --}}
                                {{-- <a href="#" class="supprimer" title="supprimer" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a> --}}
                            {{-- </td> --}}
                        {{-- </tr> --}}
                        {{-- @endforeach --}}
                    {{-- </tbody> --}}


                {{-- </table> --}}
                
            {{-- </div> 
        </div> --}}
    {{-- </div> --}} 
 <div class="container mt-3">
    <div class="card">
        <div class="card-header">
          <div class="container">

            <div class="row">
                <div class="col-md-10">
                    <h2>La liste des vols <b>Programés</b></h2>
                </div>
                <div class="col">

                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons"></i> <span>Programmer</span></a>
                                            
                </div>
            </div>

          </div>
        </div>
        <div class="card-body">
            
            
          
          <table id="datatable" class="table table-hover table-bordered table-responsive-lg table-sm">
            <thead>
              <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Destination</th>						
                <th>Date de depart</th>
                <th>Heure de depart</th>
                <th class="th_1">Place A </th>
                <th class="th_1">Prix A </th>
                <th class="th_1">Place B </th>
                <th class="th_1">Prix B </th>


                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($bouger as $voldata)

                <tr>
                    <th>{{ $voldata->id}}</td>
                    <td>{{ $voldata->code }}</td>
                    <td>{{ $voldata->destination }}</td>
                    <td>{{ $voldata->date_depart }}</td>                        
                    <td>{{ $voldata->heure_depart }}</td>
                    <td class="th_1">{{ $voldata->nb_class_a }}</td>
                    <td class="th_1">{{ $voldata->prix_a }}</td>
                    <td class="th_1">{{ $voldata->nb_class_b }}</td>
                    <td class="th_1">{{ $voldata->prix_b }}</td>
                    
                    <td style="width: 200px;">
                        <a href="#"  value="" class="view" title="Details" data-toggle="tooltip"> <i class="fa-solid fa-eye"></i></a>
                        <a href="#"  title="reserver" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#reserModal"><i class="fa-solid fa-jet-fighter-up"></i></a>
                        <a href="#" class="edit btn btn-primary btn-sm"  >Edit</a> 
                        <a href="#" class="delete btn btn-danger btn-sm"  >Supp</a> 
                        
                  {{-- <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </div>
    {{-- <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script> --}}
    {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    
    {{-- Table --}}
    <script>
    //     $(document).ready(function(){
    //        $(document).on('click','.show', function(){
    //            var id = $(this).val()
    //            alert(id);
    //        });
    //    });
   
   </script>   
<script>
$(document).ready( function () {
    $('.th_1').hide();
} );
</script>

<script>
    $(document).ready( function () {
        $('#datatable').DataTable();
    } );
    </script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
{{-- end --}}


@endsection

@section('scripts')

{{-- Try --}}



{{-- End --}}
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>


<script type="text/javascript">

// var id_vols = $(this).val();
// alert(id) #editModal;

$(document).ready(function() {

var table = $('#datatable').DataTable();

table.on('click','.edit', function() {


    $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    console.log(data);

    $('#cod').val(data[1]);
    $('#dest').val(data[2]);
    $('#dates').val(data[3]);
    $('#heures').val(data[4]);
    $('#classa').val(data[5]);
    $('#pclassa').val(data[6]);
    $('#classb').val(data[7]);
    $('#pclassb').val(data[8]);

    $('#editForm').attr('action', '/vol/'+data[0]);
    $('#editModal').modal('show');
});


// Start Delete//

//   Show details//



table.on('click','.view', function() {


    $tr = $(this).closest('tr');
    if ($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
    }
    var data = table.row($tr).data();
    console.log(data);

    $('#cod').val(data[1]);
    $('#dest').val(data[2]);
    $('#dates').val(data[3]);
    $('#heures').val(data[4]);
    $('#classa').val(data[5]);
    $('#pclassa').val(data[6]);
    $('#classb').val(data[7]);
    $('#pclassb').val(data[8]);

    $('#showForm').attr('action', '/vol/'+data[0]);
    $('#showModal').modal('show');
});

// End of show
    table.on('click','.delete', function() {
        $tr = $(this).closest('tr');
        if ($($tr).hasClass('child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);

        
        // $('#id').val(data[0]);



        $('#deleteForm').attr('action', '/vol/'+data[0]);
        $('#deleteModal').modal('show');
    });
  //End Delete//  
   

});



</script>



@endsection