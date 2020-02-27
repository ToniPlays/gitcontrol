<?php
class TopNav {
  //Create topnav
  function __construct() {
    ?>
    <nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow border-bottom-primary">
      <!-- Topbar Search -->
      <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search"
      onsubmit="GetUserRepositories()" action="javascript:void(0);">
        <div class="input-group">
          <input id="user" type="text" class="form-control bg-white border-0 small" placeholder="Search users..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="submit">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <?php
  }
}
 ?>
