@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-1">
          Team: [Team Name]
          <table class="table table-bordered table-hover" id="myTable">
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 1
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 2
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 3
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 4
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 5
              </th>
            </tr>
            <tr class="clickable-row">
              <th>
                <img src="https://www.serebii.net/pokedex/icon/quadruped.png">
                Pokemon 6
              </th>
            </tr>
          </table>
        </div>

        <div class="col-md-6 col-md-offset-1">
          Pokemon Info
          <div class="card">
            <div class="card-body">
              <img class="img-thumbnail" src="https://www.serebii.net/pokearth/sprites/green/128.png">
              <span style="vertical-align:top" class="pokemon-name">Basic Card</span>
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
      $(".pokemon-name").text(txt);
    });
});
</script>

@endsection
