@extends("layouts.master")

@section("contenu")
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap User Management Data Table</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">


{{-- Style table --}}

<style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Varela Round', sans-serif;
        font-size: 13px;
    }
    .table-responsive {
        margin: 30px 0;
    }
    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
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





    {{-- EDiter un vol --}}

            
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un Vol programmé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form action="/Vol" id="editForm" method="POST">
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="" class="form-label">Code </label>
                            <input type="text" class="form-control" name="cod" id="cod">
                        </div>
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Destination </label>
                            <input type="text" class="form-control" name="dest" id="dest" >
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
                        <button type="submit" class="btn btn-primary">Programmer</button>
                    </div>
                </form>
        </div>
    </div>
  </div>

    {{-- End of Edition --}}


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
                                <label for="" class="form-label">Id du vol</label>
                                <input type="text" class="form-control" name="idvol" >
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Numero de pièce</label>
                                <input type="text" class="form-control" name="npiece" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Prénom du passager </label>
                                <input type="text" class="form-control" name="ppass" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Nom du passager </label>
                                <input type="text" class="form-control" name="npass" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Classe</label>
                                <select class="form-select form-select-sm" name="classe" aria-label=".form-select-sm example">
                                    <option selected>Selectionner une classe</option>
                                    <option value="1">Classe Affaire </option>
                                    <option value="2">Classe Business</option>
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


 
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>La liste des <b>Reservations</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="material-icons"></i> <span>Programmer un Vol</span></a>
                            						
                        </div>
                    </div>
                </div>
                <table class="table  table-hover table-bordered" id="datatable">  
                    <thead class="table-light">
                        <tr>
                            <th>ID </th>
                            <th>Code du vol</th>
                            <th>Destination</th>						
                            <th>Piece du passager</th>
                            <th>Prenom du passager</th>
                            <th>Nom du passager</th>
                            <th>Telephone</th>
                            <th>Classe</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                @foreach ($reser as $voldata)

                        <tr>
                            <th>{{ $voldata->id}}</td>
                            <td>{{ $voldata->vols_id}}</td>
                            <td>{{ $voldata->vols_id}}</td>
                            <td>{{ $voldata->piece}}</td>                        
                            <td>{{ $voldata->prenom_passager}}</td>                        
                            <td>{{ $voldata->nom_passager}}</td>
                            <td>{{ $voldata->telephone}}</td>
                            <td>{{ $voldata->classe}}</td>
                            <td>{{ $voldata->vols_id}}</td>
                            <td>
                              
                                <a href="" title="reserver" data-toggle="tooltip" data-bs-toggle="modal" data-bs-target="#reserModal"><i class="fa-solid fa-jet-fighter-up"></i></a>
                                <a href="#" title="editer" class="mod" ><i class="fa-solid  fa-pen-to-square"></i></a>
                                
    
                            </td>
                        </tr>
                @endforeach
                    
                    </tbody>


                </table>
                
            </div> 
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.js" integrity="sha512-HNbo1d4BaJjXh+/e6q4enTyezg5wiXvY3p/9Vzb20NIvkJghZxhzaXeffbdJuuZSxFhJP87ORPadwmU9aN3wSA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js" integrity="sha512-8cU710tp3iH9RniUh6fq5zJsGnjLzOWLWdZqBMLtqaoZUA6AWIE34lwMB3ipUNiTBP5jEZKY95SfbNnQ8cCKvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function() {

        var table = $('#datatable').DataTable();
        
        table.on('click','.mod', function() {
        
        
        $tr = $(this).closest('tr');
        if ($($tr).hasclass('child')){
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

        $('#editForm').attr('action', '/Vol/'+data[0]);
        $('#editModal').modal('show');
        });
    });
</script>


{{-- Table --}}
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
{{-- end --}}
@endsection