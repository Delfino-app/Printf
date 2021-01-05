  <?php
    

    if($_SESSION["loginMaster"]==false){

     header("location:loginAdmin");
    } 
  ?>  
  <nav class="blue-grey darken-3">
    <div class="nav-wrapper container">
      <!--Logo Icon-->
      <?php include "Vista/Paginas/Admin/logoIconAdmin.php"; ?>

      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="modal-trigger" href="#chat">Mensagens<span class="badge new">0</span></a></li>
        <li>
          <a href="#" class="dropdown-button" data-activates="dropUsuario" id="User">
            <img  
              <?php
                dadosAdmin::imgAdmin();
              ?>
            >
            <?php
              dadosAdmin::primeiroNome();
            ?>
            <i class="Menu fa fa-angle-down"></i>
           </a>
        </li>
      </ul>
      <ul id="dropUsuario" class="Menu dropdown-content">
        <li>
          <a href="index.php?pg=admin&in=sair">Sair<i class="Menu fa fa-sign-out"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <?php 
  
  include "Vista/Paginas/Inside/1_veiws/Suporte/Suport_Chat.php"; 
