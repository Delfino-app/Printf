



  <!-- Modal Structure -->
  <div id="chat" class="modal" style="width:40%;bottom:0;background-color:white">
    <div class="modal-content">
      	<a id="btnFechar" title="Fechar" class="modal-action modal-close right" style="color:#333">
        	<i class="fa fa-close"></i>
      	</a>
      	<h3 class="title">Chat</h3>
      	<div class="divider"></div>
        <div class="row" style="padding:5px 0px;">
          <div class="col l4" id="displayUserFriendsChat">
            <p class="smallTitle">Amigos</p>
            <ul style="padding-top:20px;">
              <li class="ShortListFriendsChatContainer">
                <a class="ShortListFriendsChat" href="#">
                  <p class="ShortInfoContainer">
                    <img class="frindShortListImg" src="Vista/Imagens/users/user2.png">
                    <span class="frindShotName">Melquisedeque</span><br>
                    <span class="shortSms">short smxsxxsss..</span>
                  </p>
                </a>
              </li>
              <li class="ShortListFriendsChatContainer">
                <a class="ShortListFriendsChat" href="#">
                  <p class="ShortInfoContainer">
                    <img class="frindShortListImg" src="Vista/Imagens/users/user3.png">
                    <span class="frindShotName">Neugreth</span><br>
                    <span class="shortSms">short smxsxxsss..</span>
                  </p>
                </a>
              </li>
              <li class="ShortListFriendsChatContainer">
                <a class="ShortListFriendsChat" href="#">
                  <p class="ShortInfoContainer">
                    <img class="frindShortListImg" src="Vista/Imagens/users/user4.png">
                    <span class="frindShotName">Eduardo</span><br>
                    <span class="shortSms">short smxsxxsss..</span>
                  </p>
                </a>
              </li>
              <li class="ShortListFriendsChatContainer">
                <a class="ShortListFriendsChat" href="#">
                  <p class="ShortInfoContainer">
                    <img class="frindShortListImg" src="Vista/Imagens/users/user2.png">
                    <span class="frindShotName">Alfredo</span><br>
                    <span class="shortSms">short smxsxxsss..</span>
                  </p>
                </a>
              </li>
            </ul>
          </div>
     	    <div class="col s12 l8" id="displaySmsChatUser">
            <p class="smallTitle">Conversa</p>
     	    	<?php
                $idUser = $_SESSION["id"];
     	    		 chatmensagens::exibirSmsUserChat($idUser);
     	    	?>
     	    </div>
        </div>
    </div>
  </div>
          