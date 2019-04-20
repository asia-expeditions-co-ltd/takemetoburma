// var baseUrl = location.protocol+'//'+location.host;
var app = angular.module("tourApp", []);
	app.controller("TourController",  function( $scope ){
		var tours = [
			{ name: "Web Development", type: "IT"},
			{ name: "Web Prgrammer",  type: "IT"}
		];
		$scope.tours = tours;		
});