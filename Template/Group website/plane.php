<?php
/******************************************************************************* 
Title:       Airplane Seat Selector Page
Author:      Royal Bissell
Date:        2015-11-18 
Description: This document contains the page to handle the Drag and Drop seats
             that allows passengers to choose their seats.
*******************************************************************************/

//Passed in the number of travllers
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

//Creates javascript variables to build the plane and set number of chairs.
var numTravellers = <?php echo $numTravellers ?>;

var plane = {
              rows:21,
              columns:6,
            };
var seatArr = new Array(numTravellers);
for (var i = 0; i < seatArr.length; i++) {
  seatArr[i] = "None";
}

//Handles the actual drap and drop actions//////////////////////////////////////
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  var data = ev.dataTransfer.getData("text");
  //Don't allow people to be stacked!
  if(ev.target.tagName==="DIV") {
    ev.preventDefault();
    ev.target.appendChild(document.getElementById(data));

    seatArr[data] = ev.target.id;
    document.getElementById("seatSel").innerHTML = "<h4>Seat Selections: "
                                                   + seatArr + "</h4>";
  }
}
////////////////////////////////////////////////////////////////////////////////
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
        <h2>Drag the chair image onto a box to select your preferred seat!</h2>
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

<!-- Everything inside this Javascript tag builds the html elements for the plane and chairs-->
<script type="text/javascript">
var html = "";

document.getElementById("planeHtml").innerHTML = buildPlane();

function buildPlane() {
  //This part builds the chairs
  html += '<div style="display:flex;min-height:50px">';
  for (var i = 0; i < numTravellers; i++) {
    html += '<div min-height:50px" ondrop="drop(event)" ondragover="allowDrop(event)">' +
                '<img id="'+i+'" src="img/chair.svg" height="32px" draggable="true" ondragstart="drag(event)">'+
            '</div>';
  }
  html += '</div>';

  //This part builds the plane
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

</script>


<div align="center">
  <div id="seatSel"><h4>Seat Selections:</h4></div>
  <!--Currently not hooked-up to anything, ideally will send off to the airline, or for internal use-->
  <button class="btn btn-primary" style="margin: 2em 0 2em" onclick="window.close()">Submit Selection</button>
</div>
</body>
</html>
