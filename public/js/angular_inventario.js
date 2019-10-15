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
    //  console.log($scope.ArrayTableCargaInventario);
  }

  $scope.deletP= function(id,Index){
    for (var i = 0; i < $scope.ArrayTableCargaInventario.length; i++) {
      console.log(i);
      if ($scope.ArrayTableCargaInventario[i].id == id) {
        $scope.ArrayTableCargaInventario.splice(i,1)
      }
    }
    //console.log($scope.ArrayTableCargaInventario);
  }

  $scope.FormCargaInventario= function(){
    if ($scope.ArrayTableCargaInventario.length==0) {
      alert("Debe Agregar productos")
    }else {
      if ($scope.tienda==null || $scope.movimiento==null ) {
        alert("Debe seleccionar una Tienda y un Movimiento");
      }else{
        $.ajax({
          url:'CargaInventario',
          type:'post',
          data: {productos:$scope.ArrayTableCargaInventario,IdTienda:$scope.tienda,IdMovimiento:$scope.movimiento},
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success:function(data){
            console.log(data);
            $scope.ArrayTableCargaInventario=[];
            $scope.$apply();
            console.log($scope.ArrayTableCargaInventario);
            alert("El movimiento ha sido realizado")
          },
          error:function(){
          }
        })
      }
    }
  }


})
