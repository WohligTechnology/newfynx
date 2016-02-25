angular.module('phonecatControllers', ['templateservicemod', 'navigationservice', 'ui.bootstrap', 'ngSanitize'])

.controller('HomeCtrl', function($scope, TemplateService, NavigationService, $timeout,$stateParams) {

  //Used to name the .html file
  $scope.custom = {
    "frontSrc": "white-front3.jpg",
    "backSrc": "white-back3.jpg"
  };
  $scope.customjson = {
    "custom": [{
      "id": 1,
      "text": "wohlig",
      "state": false,
      "css": {
        "z-index": 1,
        "font-size": 41,
        "letter-spacing": 10,
        "-webkit-transform": "rotate(18deg) scale(1,0.63)",
        "-webkit-text-stroke-width": 1
      },
      "shadowDistance": 20,
      "shadowAngle": 1,
      "fontsize": 41,
      "spacing": 10,
      "rotation": 18,
      "stroke": 1,
      "strech": 63,
      "top": "36",
      "left": "21"
    }, {
      "id": 2,
      "text": "Rohan",
      "state": false,
      "css": {
        "z-index": 2,
        "text-shadow": "20px 0px 10px undefined",
        "font-size": 44,
        "letter-spacing": 0,
        "-webkit-transform": "rotate(20deg) scale(1,0.68)",
        "-webkit-text-stroke-width": 1,
        "color": "red",
        "font-family": "Fjalla One"
      },
      "shadowDistance": 20,
      "shadowAngle": 1,
      "fontsize": 44,
      "spacing": 0,
      "rotation": 20,
      "stroke": 1,
      "strech": 68,
      "font": "Fjalla One",
      "top": "202",
      "left": "31"
    }, {
      "id": 3,
      "text": "asdf",
      "state": false,
      "css": {
        "z-index": 1,
        "text-shadow": "20px 0px 10px undefined",
        "font-size": 74,
        "letter-spacing": 0,
        "-webkit-transform": "rotate(55deg) scale(1,0.4)",
        "-webkit-text-stroke-width": 1,
        "color": "DarkSlateGray "
      },
      "shadowDistance": 20,
      "shadowAngle": 1,
      "fontsize": 74,
      "spacing": 0,
      "rotation": 55,
      "stroke": 1,
      "strech": 40,
      "arc": 100
    }, {
      "id": 4,
      "text": "demo",
      "state": true,
      "css": {
        "z-index": 2,
        "text-shadow": "20px 0px 10px undefined",
        "font-size": 100,
        "letter-spacing": 0,
        "-webkit-transform": "rotate(0deg) scale(1,0.4)",
        "-webkit-text-stroke-width": 1,
        "color": "DarkSalmon ",
        "-webkit-text-stroke-color": "DarkSlateGray "
      },
      "shadowDistance": 20,
      "shadowAngle": 1,
      "fontsize": 100,
      "spacing": 0,
      "rotation": 0,
      "stroke": 1,
      "strech": 40,
      "top": "35",
      "left": "54"
    }, {
      "id": 5,
      "text": "",
      "state": false,
      "css": {
        "z-index": 3,
        "-webkit-transform": "rotate(1deg)",
        "height": "46px"
      },
      "rotation": 1,
      "top": "209",
      "left": "-4"
    }, {
      "id": 6,
      "text": "",
      "state": false,
      "css": {
        "z-index": 3,
        "-webkit-transform": "rotate(1deg)",
        "height": "100px"
      },
      "rotation": 1
    }],
    "type": "1",
    "color": "3",
    "size": "S",
    "price": "",
    "image1": {
      "image": "sorry30.png",
      "image1": ""
    },
    "image": {
      "image": "sorry30.png",
      "image1": ""
    },
    "distance": 1,
    "angle": 1,
    "id": "19",
    "quantity": 1,
    "designname": "fdgsd"
  };
  $scope.doIt = function() {
    NavigationService.getOneCart($stateParams.id,$stateParams.user, function(data){
      $scope.customjson.custom = JSON.parse(data.json);
      console.log($scope.customjson.custom.custom);
      _.each($scope.customjson.custom.custom, function(key, key1) {

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
