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

#echo '<pre>';
#print_r($poke1);
#echo '</pre>';


?>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
          Team: {{$team->title}}


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
        </div>

        <div class="col-md-6 col-md-offset-1">
          Pokemon Info
          <div class="card">
            <div class="card-body">
              <img style="float:left; margin:0px 10px 0px 0px" class="img-thumbnail pokemon-image" src="https://img.pokemondb.net/sprites/red-blue/normal/bulbasaur-color.png">
              <span style="vertical-align:top" class="pokemon-name">{{$team->pokemon1}}</span>
              <br>
              <span style="padding:2px; background-color:fds" class="border border-dark pokemon-type1">Type1</span>
              <span style="padding:2px; background-color:RED" class="border border-dark pokemon-type2">Type2</span>
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
                      <th>Special</th>
                      <th class="special">70</th>
                    </tr>
                    <tr>
                      <th>Speed</th>
                      <th class="speed">110</th>
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
      //gets text and name from clicked pokemon and fetches image
      var txt = $(e.target).text();
      var name = $(e.target).attr('name');
      var img = "https://img.pokemondb.net/sprites/red-blue/normal/" + txt.toLowerCase() + "-color.png";
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


      //changes values based on selected pokemon
      $(".pokemon-name").text(txt);
      $(".pokemon-image").attr("src",decodeURI(imgURL));
      $(".hp").text(array[name][0]['hp']);
      $(".attack").text(array[name][0]['attack']);
      $(".defense").text(array[name][0]['defense']);
      $(".special").text(array[name][0]['spattack']);
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

    });
});
</script>

@endsection
