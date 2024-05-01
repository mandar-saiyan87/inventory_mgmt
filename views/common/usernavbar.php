      <?php
      $logged_in = $_SESSION['user']['username'];
      ?>

      <div class="user_nav">
        <div class="usermenu">
          <img src="assets/images/hamburger.svg" alt="hmmenu" id="hbmenu">
          <p>Welcome <?= $logged_in ?></p>
        </div>
        <div class="dropdown-center">
          <img src="assets/images/User.svg" alt="user" class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          <ul class="dropdown-menu">
            <form action="/" method="POST">
              <li><button type="submit" class="dropdown-item" name="logout">Logout</button></li>
            </form>

          </ul>
        </div>

      </div>