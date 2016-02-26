angular.module('phonecatControllers', ['templateservicemod', 'navigationservice', 'ui.bootstrap', 'ngSanitize'])

.controller('HomeCtrl', function($scope, TemplateService, NavigationService, $timeout,$stateParams) {

  //Used to name the .html file
  $scope.custom = []
  $scope.doIt = function() {
    NavigationService.getOneCart($stateParams.id,$stateParams.user, function(data){
      $scope.custom = JSON.parse(data.json);
      console.log($scope.custom.custom);
      _.each($scope.custom.custom, function(key, key1) {

        $scope.$on('$viewContentLoaded', function(event) {
          key.containercss = {};
          if (key.top !== undefined || key.top !== null) {
            key.containercss.top = key.top + "px";
          }
          if (key.left !== undefined || key.left !== null) {
            key.containercss.left = key.left + "px";
          }
          if (key.height !== undefined || key.height !== null) {
            key.css.height = key.height + "px";
            key.containercss.height = key.height + "px";
          }
          if (key.width !== undefined || key.width !== null) {
            key.css.width = key.width + "px";
            key.containercss.width = key.width + "px";
          }
          $timeout(function() {


            if (key.arc) {
              switch (key1) {
                case 0:
                  {
                    var $exp1 = $('#example1');
                  }
                  break;
                case 1:
                  {
                    var $exp1 = $('#example2');
                  }
                  break;
                case 2:
                  {
                    var $exp1 = $('#example3');
                  }
                  break;
                case 3:
                  {
                    var $exp1 = $('#example4');
                  }
                  break;
                default:
              }
              console.log(key.arc);
              console.log(key1);
              $exp1.show().arctext({
                radius: Math.abs(key.arc),
                dir: 1
              });
              arcText = $exp1;
              $exp1.arctext('set', {
                radius: Math.abs(key.arc),
                dir: 1,
                animation: {
                  speed: 300,
                  easing: 'ease-out'
                }
              });
            }


          }, 1000);
        });

      })
    });

  };
  $scope.doIt();

  $scope.template = TemplateService.changecontent("home");
  $scope.menutitle = NavigationService.makeactive("Home");
  TemplateService.title = $scope.menutitle;
  $scope.navigation = NavigationService.getnav();

})

.controller('headerctrl', function($scope, TemplateService) {
  $scope.template = TemplateService;
  $scope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams) {
    $(window).scrollTop(0);
  });
})

;
