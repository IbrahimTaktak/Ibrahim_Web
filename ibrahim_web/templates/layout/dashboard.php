<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake.css', 'style', 'https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css']) ?>
    <?= $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css') ?>
    <?= $this->Html->css('dashboard') ?>
    <?= $this->Html->script('https://code.jquery.com/jquery-3.5.1.slim.min.js') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js') ?>
    <?= $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js') ?>  
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class="bx bxl-c-plus-plus icon"></i>
      <div class="logo_name">Ibrahim</div>
      <i class="bx bx-menu" id="btn"></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class="bx bx-search"></i>
        <input type="text" placeholder="Search..." />
        <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="<?= $this->Url->build(['controller' => 'Dashboard', 'action' => 'index']) ?>">
          <i class="bx bx-grid-alt"></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <li>
        <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">
        <i class='bx bxs-notepad' ></i>
          <span class="links_name">Projects</span>
        </a>
        <ul class="sub-menu">
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>">
              <span class="links_name" style="margin-left: 10px;">List Projects</span>
            </a>
          </li>
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']) ?>">
              <span class="links_name" style="margin-left: 10px;">Add Project</span>
            </a>
          </li>
        </ul>
        <span class="tooltip">Projects</span>
      </li>
      <li>
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
          <i class="bx bx-user"></i>
          <span class="links_name">Users</span>
        </a>
        <ul class="sub-menu">
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']) ?>">
              <span class="links_name" style="margin-left: 10px;">List Users</span>
            </a>
          </li>
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>">
              <span class="links_name" style="margin-left: 10px;">Add User</span>
            </a>
          </li>
        </ul>
        <span class="tooltip">User</span>
      </li>
      <li>
        <a href="<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'index']) ?>">
        <i class='bx bx-task'></i>
          <span class="links_name">Tasks</span>
        </a>
        <ul class="sub-menu">
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'index']) ?>">
              <span class="links_name" style="margin-left: 10px;">List Tasks</span>
            </a>
          </li>
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Tasks', 'action' => 'add']) ?>">
              <span class="links_name" style="margin-left: 10px;">Add Task</span>
            </a>
          </li>
        </ul>
        <span class="tooltip">Tasks</span>
      </li>
      <li>
        <a href="<?= $this->Url->build(['controller' => 'Progress', 'action' => 'index']) ?>">
          <i class="bx bx-pie-chart-alt-2"></i>
          <span class="links_name">Progress</span>
        </a>
        <ul class="sub-menu">
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Progress', 'action' => 'index']) ?>">
              <span class="links_name" style="margin-left: 10px;">View Progress</span>
            </a>
          </li>
          <li class="submenu-item">
            <a href="<?= $this->Url->build(['controller' => 'Progress', 'action' => 'add']) ?>">
              <span class="links_name" style="margin-left: 10px;">Add Progress</span>
            </a>
          </li>
        </ul>
        <span class="tooltip">Progress</span>
      </li>
      <li class="profile">
        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>">
          <div class="profile-details">
            <i class="bx bx-user"></i>
            <div class="name_job">
              <div class="name"><?= $currentUser['UserName'] ?></div>
              
              <div class="job">
                <?php
                switch ($currentUser['UserRole']) {
                  case 1:
                    echo 'Admin';
                    break;
                  case 2:
                    echo 'Manager';
                    break;
                  case 3:
                    echo 'Employer';
                    break;
                  default:
                    echo 'User';
                    break;
                }
                ?>
              </div>
            </div>
          </div>
          <i class="bx bx-log-out" id="log_out"></i>
        </a>
      </li>
    </ul>
  </div>

  <section class="home-section">
    
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
  </section>
  <script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");
    let searchBtn = document.querySelector(".bx-search");

    closeBtn.addEventListener("click", () => {
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    searchBtn.addEventListener("click", () => {
      // Sidebar open when you click on the search icon
      sidebar.classList.toggle("open");
      menuBtnChange(); //calling the function(optional)
    });

    // following are the code to change sidebar button(optional)
    function menuBtnChange() {
      if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the icons class
      } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the icons class
      }
    }
  </script>
</body>
</html>
