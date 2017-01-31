var app = angular.module('app', ['ngRoute']);


app.config(function($routeProvider){
  $routeProvider.
  when('/',{
    templateUrl:'home.html',
    controller: 'WineNameCtrl'
  }).when('/:wineName',{
    templateUrl:'allDataWine.html',
    controller:'readOneWineCtrl'
  }).
  otherwise({
    redirection: '/'
  })
});


app.controller('WineNameCtrl', [ "$scope", "$http", function(scope, http){
  http.get('wines.json').success(function(data){
    scope.wines = data;
  });
}]);
app.controller('readOneWineCtrl', ["$scope", "$http","$routeParams", function(scope, http, routeParams){
  http.get('wines.json').success(function(data){
    var newwine;
  for (var i = 0; i < data.length; i++) {
    if(data[i].wine_id == routeParams.wineName){
      newwine = data[i];
      break;
    }
  }
  console.log(newwine);
  scope.readedWines = newwine;

  });
}]);
