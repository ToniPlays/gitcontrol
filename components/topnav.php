<?php
class TopNav {
  function __construct() {
    ?>
    <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow border-bottom-primary">

      <!-- Topbar Search -->
      <div class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-white border-0 small" placeholder="Search users..." onchange="GetUserRepositories(this.value)" onsubmit="GetUserRepositories(this.value)" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </div>


    </nav>
    <?php
  }
}
 ?>
