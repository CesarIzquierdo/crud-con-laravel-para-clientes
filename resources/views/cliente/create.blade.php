
  
  <!-- Modal -->
  <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="" class="form-label">NOMBRE</label>
                <input
                    type="text"
                    class="form-control" name="nombre" id="" aria-describedby="helpId" placeholder=""/>
            </div>       

            <div class="mb-3">
                <label for="" class="form-label">TELEFONO</label>
                <input
                    type="text"
                    class="form-control" name="telefono" id="" aria-describedby="helpId" placeholder=""/>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">CORREO</label>
                <input
                    type="temail"
                    class="form-control" name="correo" id="" aria-describedby="helpId" placeholder=""/>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="mb-3">
                  <label for="" class="form-label">IMAGEN</label>
                  <input
                      type="file"
                      class="form-control" name="file" id="" aria-describedby="helpId" placeholder="" accept="image/*"/>
                      <br>
                      @error('file')
                          <Strong><span class="text-danger">{{$message}}</span></Strong>
                      @enderror
                      
                </div>     
              </div>
            </div>                            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">guardar</button>
        </div>
        </form>
    </div>
    </div>
  </div>