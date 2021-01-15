<!-- Modal -->
<div class="modal fade" id="updateFarma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Farmaco</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="form-group">
            <label class="form-label" for="nomComerU">Nombre Comercial</label>
            <input class="form-control" type="text" name="nomComerU" id="nomComerU" placeholder="Ingrese el nombre comercial">
        </div>

        <div class="form-group">
            <label class="form-label" for="nomClinU">Nombre Clinico</label>
            <input class="form-control" type="text" name="nomClinU" id="nomClinU" placeholder="Ingrese el nombre clinico">
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="numDosU">Numero de UnDosis</label>
                    <input class="form-control" type="text" name="numDosU" id="numDosU" placeholder="Ingrese la Undosis">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="compuestoU">Compuesto</label>
                    <input class="form-control" type="text" name="compuestoU" id="compuestoU" placeholder="Ingrese el Compuesto">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                <label class="form-label" for="ubicaU">Ubicacion</label>
                <select name="ubicaU" id="ubicaU" class="form-select">
                    <option value="">Selecione Ubicacion</option>
                    <option value="F1">Farmacia Planta 1</option>
                    <option value="F2">Farmacia Planta 2</option>
                    <option value="F3">Farmacia Planta 3</option>
                </select>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="cod_proveU">Codigo del proveedor</label>
                    <input class="form-control" type="text" name="cod_proveU" id="cod_proveU" placeholder="Ingrese el Codigo del proveedor">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="tol_dosisU">Total Dosis</label>
                    <input class="form-control" type="text" name="tol_dosisU" id="tol_dosisU" placeholder="Ingrese la Dosis Total">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label class="form-label" for="pre_dosU">Precio de la dosis</label>
                    <input class="form-control" type="text" name="pre_dosU" id="pre_dosU" placeholder="Ingrese la Dosis Total">
                </div>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="updateF">Guardar Farmaco</button>
      </div>
    </div>
  </div>
</div>