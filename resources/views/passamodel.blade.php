<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>passager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
     {{-- Start  Add MOdal --}}

     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un passager</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <form action="{{ action('PassagerController@store') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="" class="form-label">No de Piece </label>
                                <input type="text" class="form-control" name="npiece" id="npiece" >
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Prenom </label>
                                <input type="text" class="form-control" name="fname" >
                            </div>
    
                            <div class="mb-3">
                                <label for="" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="lname" >
                            </div>
    
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Telephone</label>
                                <input type="text" class="form-control" name="nums">
                            </div>
    
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Genre</label>
                                    <div class="form-check">
                                        <input class="form-check-input" id ="genderF" type="radio" name="gender" value="F" checked>
                                        <label class="form-check-label" for="genderF">
                                        Féminin
                                        </label>
                                    </div>
    
                                    <div class="form-check">
                                        <input class="form-check-input" id ="genderM" type="radio" value="M" name="gender"  >
                                        <label class="form-check-label" for="genderM">
                                        Masculin
                                        </label>
                                    </div>
                            </div>
                        
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </div>
                    </form>
            </div>
        </div>
      </div>
        {{-- End Add Modal --}}

        {{-- Modidify Modal --}}

            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un passager</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <form action="/passager" method="POST" id="editForm">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <div class="modal-body">

                                    <div class="mb-3">
                                        <label for="" class="form-label">No de Piece </label>
                                        <input type="text" class="form-control" name="npiece" id="npiece" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="" class="form-label">Prenom </label>
                                        <input type="text" class="form-control" name="fname" id="fname" >
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="" class="form-label">Nom</label>
                                        <input type="text" class="form-control" name="lname" id="lname">
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Telephone</label>
                                        <input type="text" class="form-control" name="nums" id="nums">
                                    </div>
            
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Genre</label>
                                            <div class="form-check">
                                                <input class="form-check-input" id ="genderF" type="radio" name="gender" value="F" checked>
                                                <label class="form-check-label" for="genderF">
                                                Féminin
                                                </label>
                                            </div>
            
                                            <div class="form-check">
                                                <input class="form-check-input" id ="genderM" type="radio" value="M" name="gender"  >
                                                <label class="form-check-label" for="genderM">
                                                Masculin
                                                </label>
                                            </div>
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
    
        {{-- End of Modify --}}

    <div class="container">
        <h1>La liste des Passagers</h1>
            @if(count($errors) > 0)
            <div class=" alert alert-danger">
                <ul>
                    @foreach ($errore->all() as $error)
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
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Passager
          </button>

          <table class="table table-bordered table-hover mt-2">
            <thead class="table-light">
              <tr> 
                <th scope="col">No de Piece</th>
                <th scope="col">Prenom</th>
                <th scope="col">Nom</th>
                <th scope="col">Genre</th>
                <th scope="col">Telephone</th>
                <th scope="col" colspan=2>Actions</th>
              </tr>
            </thead>
            <tfoot class="table-light">
                <tr>     
                  <th scope="col">Prenom</th>
                  <th scope="col">Nom</th>
                  <th scope="col">Genre</th>
                  <th scope="col">Telephone</th>
                  <th scope="col" colspan=2>Actions</th>
                </tr>
              </tfoot>
            <tbody>
                @foreach ($passa as $passadata)
              <tr>
                <th scope="row">{{ $passadata->no_piece }}</td>
                <td>{{ $passadata->prenom }}</td>
                <td>{{ $passadata->nom }}</td>
                <td>{{ $passadata->genre }}</td>
                <td>{{ $passadata->telephone }}</td>
                <td>
                    <a href="#" class="btn btn-success">Modifier</a>
                </td>
                <td>
                    <a href="#" class="btn btn-danger">Supprimer</a>

                </td>

              </tr>
              @endforeach
            </tbody>
          </table>

    </div>
   
  
  
  
  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="">


    </script>

</body>
</html>