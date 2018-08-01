<div class="tab-pane active no-padding" id="quickview-chat">
  <div class="view-port clearfix" id="chat">
    <div class="view bg-white">
      <!-- BEGIN View Header !-->
      <div class="navbar navbar-default">
        <div class="navbar-inner">
          <!-- BEGIN Header Controler !-->
          <!-- <a href="javascript:;" class="inline action p-l-10 link text-master" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
            <i class="pg-plus"></i>
          </a> -->
          <!-- END Header Controler !-->
          <div class="view-heading">
            Chat List
            <div class="fs-11">Show All</div>
          </div>
          <!-- BEGIN Header Controler !-->
          <!-- <a href="#" class="inline action p-r-10 pull-right link text-master">
            <i class="pg-more"></i>
          </a> -->
          <!-- END Header Controler !-->
        </div>
      </div>
      <!-- END View Header !-->
      <div data-init-list-view="ioslist" class="list-view boreded no-top-border">
        <div class="list-view-group-container">
          <div class="list-view-group-header text-uppercase">List User</div>
          <ul>
            <?php 
              $group = "";
              if(count($users) > 0):
              foreach ($users as $user) {  if($user->id != $cur_user->id ){ 
                // if($group != $user->firstname[0]){
                //   $group = $user->firstname[0];
                //   echo '<div class="list-view-group-container"><div class="list-view-group-header text-uppercase">'.$group.'</div><ul>';
                // }

                // if($group != $user->firstname[0]){
                //   echo '</ul></div></div>';
                // }
            ?>
              <!-- BEGIN Chat User List Item  !-->
              <li class="chat-user-list clearfix">
                <a data-view-animation="push-parrallax" data-view-port="#chat" data-navigate="view" class="" href="#">
                  <input type="hidden" value="<?php echo $user->id; ?>" name="user_id" />
                  <span class="thumbnail-wrapper d32 circular bg-success">
                    <?php  $avatar = $user->avatar != '' ? $user->avatar : 'no-image.jpg' ; ?>
                    <img width="34" height="34" data-src-retina="<?php echo base_url('assets/img/profiles/' . $avatar); ?>" data-src="<?php echo base_url('assets/img/profiles/' . $avatar); ?>" alt="" src="<?php echo base_url('assets/img/profiles/' . $avatar); ?>" class="col-top">
                  </span>
                  <p class="p-l-10 ">
                    <span class="text-master"><?php echo ucwords($user->firstname.' '.$user->lastname); ?></span>
                    <span class="badge badge-success" rel="<?php echo $user->id; ?>"><?php echo $user->unread; ?></span>
                    <?php $status = $user->online == 1 ? 'Online' : 'Offline'; ?> 
                    <span class="block text-master hint-text fs-12"><?php echo $status; ?></span>
                  </p>
                </a>
              </li>
              <!-- END Chat User List Item  !-->
            <?php  
              }} 
              endif;
            ?>
          </ul>
        </div>
      </div>
    </div>
    <!-- BEGIN Conversation View  !-->
    <div class="view chat-view bg-white clearfix">
      <!-- BEGIN Header  !-->
      <div class="navbar navbar-default">
        <div class="navbar-inner">
          <a href="javascript:;" class="link text-master inline action p-l-10 p-r-10" data-navigate="view" data-view-port="#chat" data-view-animation="push-parrallax">
            <i class="pg-arrow_left"></i>
          </a>
          <div class="view-heading">
            <span id="user_selected">John Smith</span>
            <div class="fs-11 hint-text" id="user_status">Online</div>
          </div>
          <div id="chat-more">
          </div>
        </div>
      </div>
      <!-- END Header  !-->
      <!-- BEGIN Conversation  !-->
      <div class="chat-inner" id="my-conversation">
      </div>
      <!-- BEGIN Conversation  !-->
      <!-- BEGIN Chat Input  !-->
      <div class="b-t b-grey bg-white clearfix p-l-10 p-r-10">
        <div class="row">
          <div class="col-1 p-t-15">
            <a href="#" class="link text-master"><i class="fa fa-plus-circle"></i></a>
          </div>
          <div class="col-10 no-padding">
            <input type="text" class="form-control chat-input" data-chat-input="" data-chat-conversation="#my-conversation" placeholder="Say something">
          </div>
        </div>
      </div>
      <!-- END Chat Input  !-->
    </div>
    <!-- END Conversation View  !-->
  </div>
</div>