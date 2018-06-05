            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editar Prateleira
                        </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">

                        <form role="form" action="EditaPrateleira" id="formEditaPrateleira">
                            <div class="form-group">
                                <label>X</label>
                                <input class="form-control obrigatorio" placeholder="Insira a quantidade de andares da prateleira" id="andar" type="number" min="1" value="[@andar]">
                            </div>
                            <div class="form-group">
                                <label>Y</label>
                                <input class="form-control obrigatorio" placeholder="Insira a quantidade de produtos por andar na prateleira" id="produtoAndar" type="number" min="1" value="[@produtoAndar]">
                            </div>
                            <button type="submit" class="btn btn-primary">Editar</button>
                            <button type="reset" class="btn btn-warning">Resetar</button>
                        </form>
                    </div>
                </div>
            </div>