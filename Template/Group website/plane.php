<?php
$numTravellers = $_GET["travellers"]
?>

<!DOCTYPE HTML>
<html>
<head>
<style>
.div1 {width:32px;height:32px;margin:0 10px 0;border:1px dotted #aaaaaa;}
/*#drag1 {padding:-10px;}*/
</style>
<script>

var numTravellers = <?php echo $numTravellers ?>;

var plane = {
              rows:21,
              columns:6,
            };

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
    var seat = ev.target.id;
    document.getElementById("seatBtn").innerHTML = "Select Seat " + seat;
}

</script>

<title>Travel Experts</title>

<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

<!-- Plugin CSS -->
<link rel="stylesheet" href="css/animate.min.css" type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="css/creative.css" type="text/css">
<link rel="stylesheet" href="css/customStyle.css" type="text/css">

</head>
<body id="page-top">

  <section class="row">
    <div class="row" style="text-align:center">

      <span class="col-xs-12 bg-primary" style="min-width:1200px">
        <h2>Drag the chair image onto a row and column to select your prefered seat!</h2>
      </span>

    </div>

    <div class="row" style="margin-top:1em">
      <span class="col-xs-1"></span>
      <span class="col-xs-10">
        <div id="planeHtml" style="min-width:1200px">

        </div>
      </span>
      <span class="col-xs-1"></span>
    </div>
  </section>

<script type="text/javascript">
var html = "";

function bPlane() {
  for (var i = 0; i < numTravellers; i++) {
    html += '<div style="min-height:50px" ondrop="drop(event)" ondragover="allowDrop(event)">' +
                '<img id="drag'+(i+1)+'" src="img/chair.svg" height="32px" draggable="true" ondragstart="drag(event)">'+
            '</div>';
  }

  for (var i = 0; i < plane.rows; i++) {
    html += '<span style="float:left">';
    html += '<div align="center" style="background-color:#f05f40;color:white;border-bottom:1px solid black; margin-bottom:.5em">'+
                (i+1)+
            '</div>';
    for (var k = 0; k < plane.columns; k++) {
      html += '<div id='+(i+1)+'-'+(k+1)+' class="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>'
      if (k===2) {
        html += '<br/>';
      }
    }

    html += '<div align="center" style="background-color:#f05f40;color:white;border-top:1px solid black; margin-top:.5em">'+
                (i+1)+
            '</div>';
    html += '</span>';
  }

  return html;
}

// html += '</div>';

document.getElementById("planeHtml").innerHTML = bPlane();

</script>
</body>
</html>
