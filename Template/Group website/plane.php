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
    document.getElementById("seattext").innerHTML = "You chose seat " + seat;
}

var plane = {
              rows:21,
              columns:6,
            };

</script>
</head>
<body>
  <p>Drag your seat onto a row and column to select your prefered seat...</p>

  <img id="drag1" src="img/chair.svg" height="32px" draggable="true" ondragstart="drag(event)">
  <div style="display:flex">
  <script>
    for (var i = 0; i < plane.rows; i++) {
      document.write('<div><div align="center" style="background-color:#4863A0;color:white;border-bottom:1px solid black; margin-bottom:.25em">'+(i+1)+'</div>');
      for (var k = 0; k < plane.columns; k++) {
        document.write('<div id='+(i+1)+'-'+(k+1)+' class="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>');
        if (k===2) {
          document.write("<br/>");
        }
      }
      document.write('<div align="center" style="background-color:#4863A0;color:white;border-top:1px solid black; margin-top:.25em">'+(i+1)+'</div>');
      document.write('</div>');
    }
  </script>
  </div>
  <div id="seattext">

  </div>

</body>
</html>
