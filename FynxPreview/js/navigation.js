// var adminURL = "";
// if(isproduction)
// {
//   adminURL =  "http://www.wohlig.co.in/demo/index.php";
// }
// else {
//   adminURL = "http://localhost/demo/index.php";
// }
var mainurl = "http://admin.myfynx.com/";

var websiteurl = "http://www.myfynx.com/";

var mainurlpaymentgateway = "http://admin.myfynx.com/";

var adminurl = mainurl + "index.php/json/";

var navigationservice = angular.module('navigationservice', [])

.factory('NavigationService', function($http) {
  var navigation = [{
    name: "Home",
    classis: "active",
    anchor: "home",
    subnav: [{
      name: "Subnav1",
      classis: "active",
      link: "#/home"
    }]
  }];

  return {
    getnav: function() {
      return navigation;
    },
    makeactive: function(menuname) {
      for (var i = 0; i < navigation.length; i++) {
        if (navigation[i].name == menuname) {
          navigation[i].classis = "active";
        } else {
          navigation[i].classis = "";
        }
      }
      return menuname;
    },
    getOneCart: function (id,user,callback) {
			return $http.get(adminurl + 'getOneCart?id='+id+'&user='+user, {}, {
				withCredentials: true
			}).success(callback);
		},

  };
});
