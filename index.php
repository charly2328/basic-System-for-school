<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>

  <?php
  include('config.php');
  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);

  ?>
  <div class="mt-5"></div>
  <div id="calendar"></div>
  <?php
  ?>

  <script src="js/jquery-3.0.0.min.js"> </script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script src='locales/es.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#calendar").fullCalendar({
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaDay"
        },

        locale: 'es',
        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Nuevo Evento
        
        events: [
          <?php
          while ($dataEvento = mysqli_fetch_array($resulEventos)) {
          ?> {
              _id: '<?php echo $dataEvento['id']; ?>',
              title: '<?php echo $dataEvento['evento']; ?>',
              start: '<?php echo $dataEvento['fecha_inicio']; ?>',
              end: '<?php echo $dataEvento['fecha_fin']; ?>',
              color: '<?php echo $dataEvento['color_evento']; ?>'
            },
          <?php } ?>
        ],
      });
      //Oculta mensajes de Notificacion
      setTimeout(function() {
        $(".alert").slideUp(300);
      }, 3000);
    });
  </script>

</body>

</html>