@extends('layouts.app')

@section('content')

<div class="container">

<input class="form-control input-lg" type="text" id="pokemon-search" onkeyup="search()" placeholder="Search for pokemon.." title="">
<br>

<table id="pokemon-table" class="table table-striped table-sm">

  <tr>
    <th></th>
    <th style="cursor:pointer" onclick="sortTableInts(1)">No.</th>
    <th style="cursor:pointer" onclick="sortTable(2)">Name</th>
    <th style="cursor:pointer" onclick="sortTable(3)">Type</th>
    <th style="cursor:pointer" onclick="sortTableInts(4)">HP</th>
    <th style="cursor:pointer" onclick="sortTableInts(5)">Attack</th>
    <th style="cursor:pointer" onclick="sortTableInts(6)">Defense</th>
    <th style="cursor:pointer" onclick="sortTableInts(7)">Sp. Attack</th>
    <th style="cursor:pointer" onclick="sortTableInts(8)">Sp. Defense</th>
    <th style="cursor:pointer" onclick="sortTableInts(9)">Speed</th>
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
    <td>{{$p['spdefense']}}</td>
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
var steel= '#B7B7CE';

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

function sortTableInts(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("pokemon-table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (parseInt(x.innerHTML) > parseInt(y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (parseInt(x.innerHTML) < parseInt(y.innerHTML)) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("pokemon-table");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>

@endsection
