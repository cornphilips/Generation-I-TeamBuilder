@extends('layouts.app')

@section('content')

<div class="container">

<input class="form-control input-lg" type="text" id="pokemon-search" onkeyup="search()" placeholder="Search for pokemon.." title="">
<br>

<table id="pokemon-table" class="table table-striped table-sm">

  <tr>
    <th></th>
    <th>No.</th>
    <th>Name</th>
    <th>Type</th>
    <th>HP</th>
    <th>Attack</th>
    <th>Defense</th>
    <th>Special</th>
    <th>Speed</th>
  </tr>

  @foreach($pokemon as $p)
  <tr class="pokemon-tr">
    <td><img class="pokemon-icon" src=""></td>
    <td class="pokemon-number">{{$p['no']}}</td>
    <td>{{$p['name']}}</td>
    <td>
      <span style="padding:2px; background-color:white" class="border border-dark pokemon-type1">{{$p['type']}}</span>
      <span style="padding:2px; background-color:white" class="border border-dark pokemon-type2">{{$p['type2']}}</span>
    </td>
    <td>{{$p['hp']}}</td>
    <td>{{$p['attack']}}</td>
    <td>{{$p['defense']}}</td>
    <td>{{$p['spattack']}}</td>
    <td>{{$p['speed']}}</td>
@endforeach
</div>

<script>
var normal = '#d8d7c9';
var fire = '#FF4136';
var water = '#0074D9';
var electric = '#FFDC00';
var grass = '#2ECC40';
var ice = '#7FDBFF';
var fighting = '#ef5da4';
var poison = '#B10DC9';
var ground = '#c4925a';
var flying = '#98dce2';
var psychic = '#F012BE';
var bug = '#c3ef99';
var rock = '#e2b17a';
var ghost = '#c060db';
var dragon = '#9d2ef2';
var dark = '#705848';

jQuery(document).ready(function($) {

  $(".pokemon-tr").each(function() {
    $this = $(this);
    var number = $this.children(".pokemon-number").text();
    var img = "https://www.serebii.net/pokedex-xy/icon/" + number +".png";
    var imgURL = img.replace(/\s/g, '');
    $(".pokemon-icon", this).attr("src", imgURL);
  });
  $(".pokemon-type1").each(function() {
    $this = $(this);
    $this.css("background-color", eval($this.text()));
  });
  $(".pokemon-type2").each(function() {
    $this = $(this);
    if ($this.text() == "(None)") {
      $this.hide();
    } else {
      $this.css("background-color", eval($this.text()));
    }
});

});

</script>

<script>
function search() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("pokemon-search");
  filter = input.value.toUpperCase();
  table = document.getElementById("pokemon-table");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

@endsection
