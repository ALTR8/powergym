<style>
    .loginpress-hidden{

      overflow: hidden;
    }
    .loginpress-popup-overlay .loginpress-internal-message{
      margin: 3px 0 3px 22px;
      display: none;
    }
    .loginpress-reason-input{
      margin: 3px 0 3px 22px;
      display: none;
    }
    .loginpress-reason-input input[type="text"]{

      width: 100%;
      display: block;
    }
  .loginpress-popup-overlay{

    background: rgba(0,0,0, .8);
    position: fixed;
    top:0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1000;
    overflow: auto;
    visibility: hidden;
    opacity: 0;
    transition: opacity 0.3s ease-in-out:
  }
  .loginpress-popup-overlay.loginpress-active{
    opacity: 1;
    visibility: visible;
  }
  .loginpress-serveypanel{
    width: 600px;
    background: #fff;
    margin: 65px auto 0;
  }
  .loginpress-popup-header{
    background: #f1f1f1;
    padding: 20px;
    border-bottom: 1px solid #ccc;
  }
  .loginpress-popup-header h2{
    margin: 0;
  }
  .loginpress-popup-body{
      padding: 10px 20px;
  }
  .loginpress-popup-footer{
    background: #f9f3f3;
    padding: 10px 20px;
    border-top: 1px solid #ccc;
  }
  .loginpress-popup-footer:after{

    content:"";
    display: table;
    clear: both;
  }
  .action-btns{
    float: right;
  }
  .loginpress-anonymous{

    display: none;
  }
  .attention, .error-message {
    color: red;
    font-weight: 600;
    display: none;
  }
  .loginpress-spinner{
    display: none;
  }
  .loginpress-spinner img{
    margin-top: 3px;
  }

</style>
<div class="loginpress-popup-overlay">
  <div class="loginpress-serveypanel">
    <form action="#" method="post" id="loginpress-deactivate-form">
    <div class="loginpress-popup-header">
      <h2><?php _e( 'Quick feedback', 'loginpress' ); ?></h2>
    </div>
    <div class="loginpress-popup-body">
      <h3><?php _e( 'If you have a moment, please let us know why you are deactivating:', 'loginpress' ); ?></h3>
      <ul id="loginpress-reason-list">
        <li class="loginpress-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="1">
            </span>
            <span><?php _e( 'I only needed the plugin for a short period', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
        </li>
        <li class="loginpress-reason has-input" data-input-type="textfield">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="2">
            </span>
            <span><?php _e( 'I found a better plugin', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
          <div class="loginpress-reason-input"><span class="message error-message "><?php _e( 'Kindly tell us the Plugin name.', 'loginpress' ); ?></span><input type="text" name="better_plugin" placeholder="What's the plugin's name?"></div>
        </li>
        <li class="loginpress-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="3">
            </span>
            <span><?php _e( 'The plugin broke my site', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
        </li>
        <li class="loginpress-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="4">
            </span>
            <span><?php _e( 'The plugin suddenly stopped working', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
        </li>
        <li class="loginpress-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="5">
            </span>
            <span><?php _e( 'I no longer need the plugin', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
        </li>
        <li class="loginpress-reason" data-input-type="" data-input-placeholder="">
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="6">
            </span>
            <span><?php _e( "It's a temporary deactivation. I'm just debugging an issue.", 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
        </li>
        <li class="loginpress-reason has-input" data-input-type="textfield" >
          <label>
            <span>
              <input type="radio" name="loginpress-selected-reason" value="7">
            </span>
            <span><?php _e( 'Other', 'loginpress' ); ?></span>
          </label>
          <div class="loginpress-internal-message"></div>
          <div class="loginpress-reason-input"><span class="message error-message "><?php _e( 'Kindly tell us the reason so we can improve.', 'loginpress' ); ?></span><input type="text" name="other_reason" placeholder="Kindly tell us the reason so we can improve."></div>
        </li>
      </ul>
    </div>
    <div class="loginpress-popup-footer">
      <label class="loginpress-anonymous"><input type="checkbox" /><?php _e( 'Anonymous feedback', 'loginpress' ); ?></label>
        <input type="button" class="button button-secondary button-skip loginpress-popup-skip-feedback" value="<?php _e( 'Skip & Deactivate', 'loginpress'); ?>" >
      <div class="action-btns">
        <span class="loginpress-spinner"><img src="<?php echo admin_url( '/images/spinner.gif' ); ?>" alt=""></span>
        <input type="submit" class="button button-secondary button-deactivate loginpress-popup-allow-deactivate" value="<?php _e( 'Submit & Deactivate', 'loginpress'); ?>" disabled="disabled">
        <a href="#" class="button button-primary loginpress-popup-button-close"><?php _e( 'Cancel', 'loginpress' ); ?></a>

      </div>
    </div>
  </form>
    </div>
  </div>


  <script>
    (function( $ ) {

      $(function() {

        var pluginSlug = 'loginpress';
        // Code to fire when the DOM is ready.

        $(document).on('click', 'tr[data-slug="' + pluginSlug + '"] .deactivate', function(e){
          e.preventDefault();
          $('.loginpress-popup-overlay').addClass('loginpress-active');
          $('body').addClass('loginpress-hidden');
        });
        $(document).on('click', '.loginpress-popup-button-close', function () {
          close_popup();
        });
        $(document).on('click', ".loginpress-serveypanel,tr[data-slug='" + pluginSlug + "'] .deactivate",function(e){
            e.stopPropagation();
        });

        $(document).click(function(){
          close_popup();
        });
        $('.loginpress-reason label').on('click', function(){
          if($(this).find('input[type="radio"]').is(':checked')){
            //$('.loginpress-anonymous').show();
            $(this).next().next('.loginpress-reason-input').show().end().end().parent().siblings().find('.loginpress-reason-input').hide();
          }
        });
        $('input[type="radio"][name="loginpress-selected-reason"]').on('click', function(event) {
          $(".loginpress-popup-allow-deactivate").removeAttr('disabled');
        });
        $(document).on('submit', '#loginpress-deactivate-form', function(event) {
          event.preventDefault();

          var _reason =  $('input[type="radio"][name="loginpress-selected-reason"]:checked').val();
          var _reason_details = '';
          if ( _reason == 2 ) {
            _reason_details = $("input[type='text'][name='better_plugin']").val();
          } else if ( _reason == 7 ) {
            _reason_details = $("input[type='text'][name='other_reason']").val();
          }

          if ( ( _reason == 7 || _reason == 2 ) && _reason_details == '' ) {
            $('.message.error-message').show();
            return ;
          }
          $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
              action        : 'loginpress_deactivate',
              reason        : _reason,
              reason_detail : _reason_details,
            },
            beforeSend: function(){
              $(".loginpress-spinner").show();
              $(".loginpress-popup-allow-deactivate").attr("disabled", "disabled");
            }
          })
          .done(function() {
            $(".loginpress-spinner").hide();
            $(".loginpress-popup-allow-deactivate").removeAttr("disabled");
            window.location.href =  $("tr[data-slug='"+ pluginSlug +"'] .deactivate a").attr('href');
          });

        });

        $('.loginpress-popup-skip-feedback').on('click', function(e){
          // e.preventDefault();
          window.location.href =  $("tr[data-slug='"+ pluginSlug +"'] .deactivate a").attr('href');
        })

        function close_popup() {
          $('.loginpress-popup-overlay').removeClass('loginpress-active');
          $('#loginpress-deactivate-form').trigger("reset");
          $(".loginpress-popup-allow-deactivate").attr('disabled', 'disabled');
          $(".loginpress-reason-input").hide();
          $('body').removeClass('loginpress-hidden');
          $('.message.error-message').hide();
        }
        });

        })( jQuery ); // This invokes the function above and allows us to use '$' in place of 'jQuery' in our code.
  </script>
