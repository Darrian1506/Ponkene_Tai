

/*let inputRut = document.querySelector('#rut');
inputRut.addEventListener("blur",
    function (event) {
        event.target.value="19818556"
    
})*/
var options = [];
$insumos.forEach(insumo => {
    options+= "Hola"
    
});




var button = document.getElementById("addRow");
var formGroup = document.getElementById("formGroupInsumo");
button.onclick = function () {
    var input_group = '<div class="input-group">'+
                            '<select class="form-select" name="insumo[]">'
                                @foreach ($insumos as $insumo)
                                    <option value="{{$insumo->cod_insu}}">{{$insumo->nombre}}</option>
                                @endforeach
                            '</select>'+
                            '<a class="btn btn-danger">-</a>'+
                        '</div>';
    formGroup.innerHTML += input_group;
};