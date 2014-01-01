var mainCtrl = function($scope){
		$scope.isGone = 0;
	$scope.dismiss = function(){
			$scope.isGone = !$scope.isGone;
	}
};