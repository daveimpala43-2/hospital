<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Farmaco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="form-group">
            <label class="form-label" for="nomComer">Nombre Comercial</label>
            <input class="form-control" type="text" name="nomComer" id="nomComer" placeholder="Ingrese el nombre comercial">
        </div>

        <div class="form-group">
            <label class="form-label" for="nomClin">Nombre Clinico</label>
            <input class="form-control" type="text" name="nomClin" id="nomClin" placeholder="Ingrese el nombre clinico">
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="numDos">Numero de UnDosis</label>
                    <input class="form-control" type="text" name="numDos" id="numDos" placeholder="Ingrese la Undosis">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="compuesto">Compuesto</label>
                    <input class="form-control" type="text" name="compuesto" id="compuesto" placeholder="Ingrese el Compuesto">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                <label class="form-label" for="ubica">Ubicacion</label>
                <select name="ubica" id="ubica" class="form-select">
                    <option value="">Selecione Ubicacion</option>
                    <option value="F1">Farmacia Planta 1</option>
                    <option value="F2">Farmacia Planta 2</option>
                    <option value="F3">Farmacia Planta 3</option>
                </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="cod_prove">Codigo del proveedor</label>
                    <input class="form-control" type="text" name="cod_prove" id="cod_prove" placeholder="Ingrese el Codigo del proveedor">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="tol_dosis">Total Dosis</label>
                    <input class="form-control" type="text" name="tol_dosis" id="tol_dosis" placeholder="Ingrese la Dosis Total">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="pre_dos">Precio de la dosis</label>
                    <input class="form-control" type="text" name="pre_dos" id="pre_dos" placeholder="Ingrese la Dosis Total">
                </div>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="createFarma">Guardar Farmaco</button>
      </div>
    </div>
  </div>
</div>

<script src="../../js/farmaco.js"></script>