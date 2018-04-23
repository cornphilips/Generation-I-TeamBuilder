@extends('layouts.app')

@section('content')

<?php
  $json = file_get_contents('https://pokeapi.co/api/v1/pokemon/mew/');
  $obj = json_decode($json);
  $speed = $obj->stats[0]->base_stat;

?>


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
          Team: {{$team->name}}
          Speed: {{$speed}}
          <table class="table table-bordered table-hover" id="myTable">
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon1}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon2}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon3}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon4}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon5}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon6}}
              </th>
            </tr>
          </table>
        </div>

        <div class="col-md-6 col-md-offset-1">
          Pokemon Info
          <div class="card">
            <div class="card-body">
              <img class="img-thumbnail pokemon-image" src="https://img.pokemondb.net/sprites/red-blue/normal/bulbasaur-color.png">
              <span style="vertical-align:top" class="pokemon-name">{{$team->pokemon1}}</span>
              <span>fjduisanfuidsla</span>

              <div style="margin:10px 0 0 0" class="card">
                <div class="card-body">
                  <table class="table table-sm table-bordered table-striped">
                    <tr>
                      <th>HP</th>
                      <th>75</th>
                    </tr>
                    <tr>
                      <th>Attack</th>
                      <th>100</th>
                    </tr>
                    <tr>
                      <th>Defense</th>
                      <th>95</th>
                    </tr>
                    <tr>
                      <th>Special</th>
                      <th>70</th>
                    </tr>
                    <tr>
                      <th>Speed</th>
                      <th>110</th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>


    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $(".clickable-row").click(function(e) {
      var txt = $(e.target).text();
      var img = "https://img.pokemondb.net/sprites/red-blue/normal/" + txt.toLowerCase() + "-color.png";
      var imgURL = img.replace(/\s/g, '');
      $(".pokemon-name").text(txt);
      //var img = "https://img.pokemondb.net/sprites/red-blue/normal/" + txt + "-color.png";

      $(".pokemon-image").attr("src",decodeURI(imgURL));

    });
});
</script>

@endsection
