

@extends("layouts.master")

@section("contenu")



<h4>See you Soon Agency vous souhaite la Bienvenue</h4>
<div class="row">
    <div class="col-sm-6">
      <div class="card">
        <img src="{{ URL('img/air.jpeg') }}" height="300px" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">La meilleures des conditons</h5>
          <p class="card-text">Le monde est fait de cultures plurielles, mystérieuses, et parfois énigmatiques de notre point de vue. Du Pérou à la Norvège en passant par le Vietnam, vous découvrirez vite que les us et coutumes varient fortement d'un pays à l'autre. C'est là toute la richesse du voyage, ca fait du </p>    
        </div>
      </div>
    </div>

    <div class="col-sm-6">
      <div class="card">
        <img src="{{ URL('img/dubai.jpg') }}" class="card-img-top" alt="...">

        <div class="card-body">
          <h5 class="card-title">Nos clients sont prioritaires</h5>
          <p class="card-text">La relation client est aujourd’hui un des enjeux stratégiques majeurs pour les entreprises. Dans un contexte toujours plus compétitif, où l’exigence des clients est de plus en plus importante, il est nécessaire pour les entreprises d’établir des relations de confiance, à la fois durables et prospères.</p>
        </div>
      </div>
    </div>

  </div>    
</div>
@endsection

