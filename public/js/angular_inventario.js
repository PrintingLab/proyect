Appadmin.controller('InventariControler_Angular',function($scope,$http){

  $scope.fetchUsers = function(){
    var searchText_len = $scope.searchText.trim().length;
    if(searchText_len > 2){
      var texto = $scope.searchText
      texto =texto.toLowerCase();
      $http({
        method: 'post',
        url: 'auto_consulta_product',
        data: {searchText:texto}
      }).then(function successCallback(response) {
        $scope.searchResult = response.data;
      });
    }else{
      $scope.searchResult = {};
    }
  }

  $scope.setValue = function(index,$event){
    $scope.searchText = $scope.searchResult[index].Producto_nombre;
    $scope.Medidas_unique =$scope.searchResult[index].Producto_unidades;
    $scope.id_producto=$scope.searchResult[index].Producto_ID;
    $scope.searchResult = {};
  }

  //variables table
  $scope.ArrayTableCargaInventario=[];
  $scope.AddTableCI= function(){
    $scope.ArrayTableCargaInventario.push({nombre:$scope.searchText,cantidad:$scope.cantidadInput,medida:$scope.Medidas_unique,id:$scope.id_producto})
  }

$scope.FormCargaInventario= function(){
  $scope.ArrayTableCargaInventario


}


})
