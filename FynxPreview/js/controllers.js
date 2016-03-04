angular.module('phonecatControllers', ['templateservicemod', 'navigationservice', 'ui.bootstrap', 'ngSanitize'])

.controller('HomeCtrl', function($scope, TemplateService, NavigationService, $timeout, $stateParams, $state) {
console.log($state);
  //Used to name the .html file
  $scope.currentpage = $state.current;
  $scope.custom = []
  $scope.doIt = function() {
    NavigationService.getOneCart($stateParams.id, $stateParams.user, function(data) {
      $scope.custom = JSON.parse(data.custom);

      // $scope.$on('$viewContentLoaded', function(event) {
      console.log("sdfasdfasdfa");
      _.each($scope.custom.custom, function(key, key1) {

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

      });
      $timeout(function() {
        _.each($scope.custom.custom, function(key, key1) {
          console.log(key);
          var pos;
          var newarc = key.arc;
          if (key.arc < 500)
            pos = 1;
          else {
            pos = -1;
            newarc = 1000 - key.arc;
          }

          if (key.arc) {
            switch (key1) {
              case 0:
                {
                  var $exp1 = $('#example1').hide();
                }
                break;
              case 1:
                {
                  var $exp1 = $('#example2').hide();
                }
                break;
              case 2:
                {
                  var $exp1 = $('#example3').hide();
                }
                break;
              case 3:
                {
                  var $exp1 = $('#example4').hide();
                }
                break;
              default:
            }
            $exp1.show().arctext({
              radius: Math.abs(newarc),
              dir: pos
            });
            arcText = $exp1;
            $exp1.arctext('set', {
              radius: Math.abs(newarc),
              dir: pos,
              animation: {
                speed: 300,
                easing: 'ease-out'
              }
            });
          }
        });
      }, 1000);

      // })
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
