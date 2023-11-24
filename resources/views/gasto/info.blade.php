<!-- Modal ACTUALIZAR-->
<div class="modal fade" id="edit{{ $gasto->id_gst }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.update',$gasto->id_gst) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tipo_gasto" class="form-label">Tipo</label>
                        <select class="form-select" id="codigo_gst" name="codigo_gst" aria-describedby="helpId" value="{{ $gasto->codigo_gst}}">
                            <option value="SER">Servicios Publicos</option>
                            <option value="TRA">Transporte</option>
                            <option value="VIV">Vivienda</option>
                            <option value="ALI">Alimentacion</option>
                            <option value="EDU">Educacion</option>
                            <option value="DTL">Diversion y tiempo libre</option>
                            <option value="RPR">Representacion</option>
                            <!-- Agrega más opciones según sea necesario -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Fecha</label>
                        <input type="date" name="fecha_gst" id="fecha_gst" class="form-control" placeholder="AAAA-MM-DD" aria-describedby="helpId" value="{{ $gasto->fecha_gst}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Valor bruto</label>
                        <input type="number" name="valorTotalSinIva_gst" id="valorTotalSinIva_gst" class="form-control" placeholder="Valor sin iva" aria-describedby="helpId"  value="{{ $gasto->valorTotalSinIva_gst}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">%Iva</label>
                        <input type="number" name="ivaTotal_gst" id="ivaTotal_gst" class="form-control" placeholder="% Iva" aria-describedby="helpId" value="{{ $gasto->ivaTotal_gst}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Lugar</label>
                        <input type="text" name="lugar_gst" id="lugar_gst" class="form-control" placeholder="Lugar de Gasto" aria-describedby="helpId"  value="{{ $gasto->lugar_gst}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion_gst" id="descripcion_gst" class="form-control" placeholder="Descripion de Gasto" aria-describedby="helpId"   value="{{ $gasto->descripcion_gst}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div><!--FIN modal-content-->
    </div><!-- FIN modal-dialog-->
</div><!-- FIN modal fade -->


<!-- Modal ELIMINAR-->
<div class="modal fade" id="delete{{ $gasto->id_gst }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Gastos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('home.destroy',$gasto->id_gst) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Esta seguro que desea eliminar el gasto :<br> <strong>  {{ $gasto->id_gst}}  {{ $gasto->codigo_gst}}   {{ $gasto->descripcion_gst}}   </strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div><!--FIN modal-content-->
    </div><!-- FIN modal-dialog-->
</div><!-- FIN modal fade -->
