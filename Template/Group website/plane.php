<!DOCTYPE HTML>
<html>
<head>
<style>
.div1 {width:32px;height:32px;margin:0 10px 0;border:1px dotted #aaaaaa;}
/*#drag1 {padding:-10px;}*/
</style>
<script>
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

var plane = {
              rows:21,
              columns:6,
            };

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

  <section id="seatPicker" class="col-lg-8 col-lg-offset-2 text-center" align="center">
    <div class="container bg-primary">
        <div class="row">
            <div>
                <h2>Drag your seat onto a row and column to select your prefered seat!</h2>
            </div>
        </div>
    </div>

  <!--This div allows the chair to be moved back to its original location-->
  <div style="min-height:50px" ondrop="drop(event)" ondragover="allowDrop(event)">
    <img id="drag1" src="img/chair.svg" height="32px" draggable="true" ondragstart="drag(event)">
  </div>
  <div style="display:flex">
  <script>
    for (var i = 0; i < plane.rows; i++) {
      document.write('<div><div align="center" style="background-color:#f05f40;color:white;border-bottom:1px solid black; margin-bottom:.5em">'+(i+1)+'</div>');
      for (var k = 0; k < plane.columns; k++) {
        document.write('<div id='+(i+1)+'-'+(k+1)+' class="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>');
        if (k===2) {
          document.write("<br/>");
        }
      }
      document.write('<div align="center" style="background-color:#f05f40;color:white;border-top:1px solid black; margin-top:.5em">'+(i+1)+'</div>');
      document.write('</div>');
    }
  </script>
  </div>

  <form class="form-horizontal" style="margin-top:2em" action="index.php" method="post">
    <fieldset>
      <input type="hidden"  value=""/>
      <button id="seatBtn" name="sear" class="btn btn-primary" style="margin-left:4em">Select Seat</button>
    </fieldset>
  </form>

  </section>
</body>
</html>
