<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
      <nav class='animated bounceInDown'>
        <ul>
          <li><a href='#profile'>Profile</a></li>
          <li><a href='#message'>Messages</a></li>
          <li class='sub-menu'><a href='#settings'>Settings<div class='fa fa-caret-down right'></div></a>
            <ul>
              <li><a href='#settings'>Account</a></li>
              <li><a href='#settings'>Profile</a></li>
              <li><a href='#settings'>Secruity &amp; Privacy</a></li>
              <li><a href='#settings'>Password</a></li>
              <li><a href='#settings'>Notification</a></li>
            </ul>
          </li>
          <li class='sub-menu'><a href='#message'>Help<div class='fa fa-caret-down right'></div></a>
            <ul>
              <li><a href='#settings'>FAQ's</a></li>
              <li><a href='#settings'>Submit a Ticket</a></li>
              <li><a href='#settings'>Network Status</a></li>
            </ul>
          </li>
          <li><a href='#message'>Logout</a></li>
        </ul>
      </nav>
      <script>
        $('.sub-menu ul').hide();
      $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("100");
        $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
      });
      </script>
  
</body>
</html>