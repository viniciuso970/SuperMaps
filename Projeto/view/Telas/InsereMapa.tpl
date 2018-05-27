            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Adicionar Mapa
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="InsereMapa" id="formAddMapa">
                            <div class="form-group">
                                <label>Largura do Mapa</label>
                                <input class="form-control obrigatorio" placeholder="Insira a largura do mapa" name="largura" type="number" min="1">
                            </div>
                            <div class="form-group">
                                <label>Altura do Mapa</label>
                                <input class="form-control obrigatorio" placeholder="Insira a altura do mapa" name="altura" type="number" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset" class="btn btn-warning">Resetar</button>
                        </form>
                    </div>
                </div>
            </div>
