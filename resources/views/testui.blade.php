@extends('layouts.app')

@section('content')

<!--
NEW STUFF
-->

<?php
 $userid = Auth::user()->id;
 ?>
 <div class='container'>
  <select class="form-control m-bot15 team-chooser" name="team_id">
    <option class="dropdown"> Choose Team </option>
    @foreach($teams as $id)
      @if($id['user_id'] === $userid)
        <option class="dropdown" value="{{$id['id']}}"> {{$id['title']}} </option>
      @endif
    @endforeach
  </select>
</div>

<span style="display:none" class="currentTeamID">{{$team['id']}}</span>

<script>
jQuery(document).ready(function($) {
    $(".team-chooser").change(function(e) {
      //location.reload();
      var id = $(this).val();
      //alert(id);
      var currentTeam = $(".currentTeamID").text();
      //alert(currentTeam);
      var newUrl = location.href.replace("/ui/"+currentTeam, "/ui/"+id);
      window.location = newUrl;
    });
});
</script>

<br /><br /><br /><br />

<!--
NEW STUFF
-->


<?php

$p1 = strtolower($team['pokemon1']);
$p2 = strtolower($team['pokemon2']);
$p3 = strtolower($team['pokemon3']);
$p4 = strtolower($team['pokemon4']);
$p5 = strtolower($team['pokemon5']);
$p6 = strtolower($team['pokemon6']);

$poke1 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p1' LIMIT 1", [1]);
$poke2 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p2' LIMIT 1", [1]);
$poke3 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p3' LIMIT 1", [1]);
$poke4 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p4' LIMIT 1", [1]);
$poke5 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p5' LIMIT 1", [1]);
$poke6 = DB::select("SELECT * FROM `pokemon` AS p WHERE p.name = '$p6' LIMIT 1", [1]);

$allPokemon = DB::select("SELECT name FROM `pokemon`");


#echo '<pre>';
#print_r($allPokemon);
#echo '</pre>'
?>



<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
          <b>Team: {{$team->title}}</b>


          <table class="table table-bordered table-hover" id="myTable">
            <tr class="clickable-row" >
              <th name="poke1">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon1}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th name="poke2">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon2}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th name="poke3">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon3}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th name="poke4">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon4}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th name="poke5">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon5}}
              </th>
            </tr>
            <tr class="clickable-row">
              <th name="poke6">
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                {{$team->pokemon6}}

              </th>
            </tr>
          </table>
          <form method="post" action="{{url('team')}}"> {{ csrf_field() }}
            <button class="btn btn-primary">create team</button>

            <input required value="" name="title">
            <input type="hidden" value="" name="pokemon1">
            <input type="hidden" value="" name="pokemon2">
            <input type="hidden" value="" name="pokemon3">
            <input type="hidden" value="" name="pokemon4">
            <input type="hidden" value="" name="pokemon5">
            <input type="hidden" value="" name="pokemon6">
          </form>
          <br>
          <form action="{{action('TEAMController@destroy', $team['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete Team</button>
          </form>
        </div>


        <!--
          POKEMON INFO BOX
        -->

        <div class="col-md-6 col-md-offset-1">
          <b>Pokemon Info</b>
          <div class="card">
            <div class="card-body">
              <span class="pokemon-info">
              <img style="float:left; margin:0px 10px 0px 0px" class="img-thumbnail pokemon-image" src="">
              <span style="vertical-align:top" class="pokemon-name"></span>
              <br>
              <span style="padding:2px; background-color:" class="border border-dark pokemon-type1">Type1</span>
              <span style="padding:2px; background-color:" class="border border-dark pokemon-type2">Type2</span>

              <form method='post' action="{{ action('TEAMController@addPokemon', $team) }}"> {{ csrf_field() }}
              <input type='hidden' class="pokemon-index-d" value="" name="pokemonIndex">
              <input type='hidden' value="delete" name="action">
              <input type='hidden' value="" name="pokemon">
              <button type="submit" style="float:right" class="btn btn-danger btn-sm">delete</button>
              </form>

              <br><br>



              <div style="margin:10px 0 0 0" class="card">
                <div class="card-body">
                  <table class="table table-sm table-bordered table-striped">
                    <tr>
                      <th>HP</th>
                      <th class="hp">75</th>
                    </tr>
                    <tr>
                      <th>Attack</th>
                      <th class="attack">100</th>
                    </tr>
                    <tr>
                      <th>Defense</th>
                      <th class="defense">95</th>
                    </tr>
                    <tr>
                      <th>Sp. Attack</th>
                      <th class="spattack">70</th>
                    </tr>
                    <tr>
                      <th>Sp. Defense</th>
                      <th class="spdefense">70</th>
                    </tr>
                    <tr>
                      <th>Speed</th>
                      <th class="speed">110</th>
                    </tr>
                  </table>
                </span>
                </div>
              </div>
            </div>


            <div class="pokemon-search-box">
              <div class="col-12">
                <input width=100px class="form-control input-sm pokemon-input" type="text" id="pokemon-search" onkeyup="search()" placeholder="Search for pokemon.." title="">
              </div>
              <br>
              <table id="pokemon-table" class="table table-sm pokemon-table">
                <tr>
                  <th>name</th>
                  <th>type</th>
                  <th>hp</th>
                  <th>atk</th>
                  <th>def</th>
                  <th>spa</th>
                  <th>spd</th>
                  <th>spd</th>
                  <th></th>
                </tr>
                @foreach($pokemon as $p)
                <tr class="pokemon-tr">
                  <td>{{$p['name']}}</td>
                  <td>
                    <span class="pokemon-type1-a" style="padding:2px; background-color:white" class="border border-dark">{{$p['type']}}</span>
                    <span class="pokemon-type2-a" style="padding:2px; background-color:white" class="border border-dark">{{$p['type2']}}</span>
                  </td>
                  <td>{{$p['hp']}}</td>
                  <td>{{$p['attack']}}</td>
                  <td>{{$p['defense']}}</td>
                  <td>{{$p['spattack']}}</td>
                  <td>{{$p['spdefense']}}</td>
                  <td>{{$p['speed']}}</td>
                  <td>
                    <form method='post' action="{{ action('TEAMController@addPokemon', $team) }}"> {{ csrf_field() }}
                    <input type='hidden' value="{{ $p['name'] }}" name="pokemon">
                    <input type='hidden' class="pokemon-index" value="" name="pokemonIndex">
                    <input type='hidden' value="add" name="action">
                    <button type="submit" class="btn btn-primary btn-sm">add</button>
                  </form>
                  </td>

              @endforeach
            </table>

            </div>


          </div>

        </div>


    </div>
</div>



<script>



jQuery(document).ready(function($) {
  $(".pokemon-table").hide();
  $(".pokemon-info").hide();
  $(".pokemon-input").hide();
    $(".clickable-row").click(function(e) {
      pokeName = $(e.target).attr("name");
      //alert(pokeName);


      //checks if pokemon exists
      var txt = $(e.target).text();
      if (txt != "") {
        $(".pokemon-info").show();
        $(".pokemon-search-box").hide();

        var name = $(e.target).attr('name');
        var img = "https://img.pokemondb.net/sprites/emerald/normal/" + txt.toLowerCase() + ".png";
        var imgURL = img.replace(/\s/g, '');

        //gets database table from clicked pokemon


        var array = {

          poke1 : <?php echo json_encode($poke1); ?>,
          poke2 : <?php echo json_encode($poke2); ?>,
          poke3 : <?php echo json_encode($poke3); ?>,
          poke4 : <?php echo json_encode($poke4); ?>,
          poke5 : <?php echo json_encode($poke5); ?>,
          poke6 : <?php echo json_encode($poke6); ?>

        }


        //console.log(array[name][0]['attack']);


        var normal = '#A8A77A';
        var fire = '#EE8130';
        var water = '#6390F0';
        var electric = '#F7D02C';
        var grass = '#7AC74C';
        var ice = '#96D9D6';
        var fighting = '#C22E28';
        var poison = '#A33EA1';
        var ground = '#E2BF65';
        var flying = '#A98FF3';
        var psychic = '#F95587';
        var bug = '#A6B91A';
        var rock = '#B6A136';
        var ghost = '#735797';
        var dragon = '#6F35FC';
        var dark = '#705848';
        var steel= '#B7B7CE';



        //changes values based on selected pokemon
        $(".pokemon-name").text(txt);
        $(".pokemon-image").attr("src",decodeURI(imgURL));
        $(".hp").text(array[name][0]['hp']);
        $(".attack").text(array[name][0]['attack']);
        $(".defense").text(array[name][0]['defense']);
        $(".spattack").text(array[name][0]['spattack']);
        $(".spdefense").text(array[name][0]['spdefense']);
        $(".speed").text(array[name][0]['speed']);
        $(".pokemon-type1").text(firstLetterToUpper(array[name][0]['type']));
        $(".pokemon-type1").css("background-color", eval(array[name][0]['type']));
        //sets type boxes with formats for color and single types
        if (array[name][0]['type2'] == "(None)") {
          $(".pokemon-type2").hide();
        } else {
          $(".pokemon-type2").show();
          $(".pokemon-type2").css("background-color", eval(array[name][0]['type2']));
          $(".pokemon-type2").text(firstLetterToUpper(array[name][0]['type2']));
        }
      }

      else {
        $(".pokemon-info").hide();
        $(".pokemon-input").show();

        $(".pokemon-search-box").show();
        $(".pokemon-index").attr("value", pokeName);
        $(".pokemon-index-d").attr("value", pokeName);
/*
        var allPokemon = <?php echo json_encode($allPokemon); ?>;
        var all = [];
        for (i = 0; i < 386; i++) {
          all.push(allPokemon[i]['name']);
        }
        //console.log(all);
*/


      }


    });
});


function search() {

  var normal = '#A8A77A';
  var fire = '#EE8130';
  var water = '#6390F0';
  var electric = '#F7D02C';
  var grass = '#7AC74C';
  var ice = '#96D9D6';
  var fighting = '#C22E28';
  var poison = '#A33EA1';
  var ground = '#E2BF65';
  var flying = '#A98FF3';
  var psychic = '#F95587';
  var bug = '#A6B91A';
  var rock = '#B6A136';
  var ghost = '#735797';
  var dragon = '#6F35FC';
  var dark = '#705848';
  var steel= '#B7B7CE';

  $(".pokemon-type1-a").each(function() {
    $this = $(this);
    $this.css("background-color", eval($this.text()));
  });
  $(".pokemon-type2-a").each(function() {
    $this = $(this);
    if ($this.text() == "(None)") {
      $this.hide();
    } else {
      $this.css("background-color", eval($this.text()));
    }
});


  var input, filter, table, tr, td, i;
  input = document.getElementById("pokemon-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("pokemon-table");
  tr = table.getElementsByTagName("tr");

    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        if ( $(".pokemon-input").val().length >= 2) {



          $(".pokemon-table").show();
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        } else {
          $(".pokemon-table").hide();

        }

    }
  }
}



</script>
@endsection
