<script>
    var chatindex = "<?php echo site_url();?>";
    base_url = "<?php echo base_url('preview');?>/";
</script>
    <link rel="shortcut icon" href="<?php echo base_url('preview'); ?>/img/favicon.ico" />
    <link rel="stylesheet" type="text" href="<?php echo base_url('preview'); ?>/css/main.css" />
    <script>
      var isproduction=false;
    </script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/angular/angular.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/angular-sanitize/angular-sanitize.min.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/ui-router/release/angular-ui-router.min.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/angular-bootstrap/ui-bootstrap.min.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/angular-bootstrap/ui-bootstrap-tpls.js"></script>
    <script src="<?php echo base_url('preview'); ?>/bower_components/lodash/lodash.js"></script>
    <script src="<?php echo base_url('preview'); ?>/js/app.js"></script>
    <script src="<?php echo base_url('preview'); ?>/js/controllers.js"></script>
    <script src="<?php echo base_url('preview'); ?>/js/navigation.js"></script>
    <script src="<?php echo base_url('preview'); ?>/js/templateservice.js"></script>
  <div ng-app="firstapp">

      <div class="repeated-item" ng-view></div>

  </div>
