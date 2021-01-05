
<ul  class="blue-grey darken-3" style="box-shadow:0 0 10px rgba(175,175,175,.23);">
    <div id="dadosAmdminContainer">
        <p style="text-align: center;">
            <img id="userImgMenuMobile"  <?php dadosAdmin::imgAdmin();?> >
        </p>
        <p class="center" id="userAdminInfo">
            <?php

                dadosAdmin::nomeCompleto();
            ?>
        </p>
    </div>
    <hr>
    <!--<li class="sidLink">
    	<a href="index.php?pg=admin&in=dashboard" class="waves-effect LinkSid">
            <i class="fa fa-dashboard sidLinkIcon"></i>Dashboard
        </a>
    </li>-->
    <li class="sidLink">
    	<a href="index.php?pg=admin&in=alunos" class="waves-effect LinkSid">
            <i class="fa fa-users sidLinkIcon"></i>Alunos
        </a>
    </li>
    <li class="sidLink">
    	<a href="index.php?pg=admin&in=aulas" class="waves-effect LinkSid">
            <i class="fa fa-file sidLinkIcon"></i>Aulas
        </a>
    </li>
     <!--<li class="sidLink">
    	<a href="index.php?pg=admin&in=loja" class="waves-effect LinkSid">
            <i class="fa fa-shopping-cart sidLinkIcon"></i>Loja
        </a>
    </li>
    <li class="sidLink">
    	<a href="index.php?pg=admin&in=definicoes" class="waves-effect LinkSid">
            <i class="fa fa-cog sidLinkIcon"></i>Definições
        </a>
    </li>-->
</ul>